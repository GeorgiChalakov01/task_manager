<?php
function execute_query($con, $query, $params, $types, $out_params = null) {
    $stmt = mysqli_stmt_init($con);

    if(!mysqli_stmt_prepare($stmt, $query)) {
        header("location: signin.php?language_code=en&error=error-no-db-connection");
        exit();
    }

    mysqli_stmt_bind_param($stmt, $types, ...$params);

    if(mysqli_stmt_execute($stmt)){
        if ($out_params) {
            $data = array();
            foreach ($out_params as $param) {
                $result = mysqli_query($con, "SELECT " . $param);
                $data[$param] = mysqli_fetch_assoc($result)[$param];
            }
        } else {
            $result = mysqli_stmt_get_result($stmt);
            $data = array();
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
        }
        mysqli_stmt_close($stmt);
        return $data;
    }
    else {
        header("location: signin.php?language_code=en&error=" . mysqli_stmt_error($stmt));
        exit();
    }
}


function get_phrases($con, $language_code) {
	$query="
	SELECT 
		P.`KEY` as `KEY`,
		P.VALUE AS VALUE
	FROM 
		PHRASES P 
		INNER JOIN LANGUAGES L ON P.LANGUAGE_ID = L.ID
	WHERE 
		L.CODE = ?";

	$params=array($language_code);
	$types="s";
	$result=execute_query($con, $query, $params, $types);

	$phrases = array();
    foreach ($result as $row) {
        $phrases[$row['KEY']] = $row['VALUE'];
    }

    return $phrases;
}

function get_languages($con) {
	$query="
	SELECT 
		NAME AS name,
		CODE AS code
	FROM 
		LANGUAGES;
	";

	$params=array();
	$types="";
	$result=execute_query($con, $query, $params, $types);

    return $result;
}

function username_exists($con, $username) {
	$query="
	SELECT 
		CASE WHEN COUNT(*) > 0 THEN 1 ELSE 0 END AS `exists`
	FROM 
		USERS
	WHERE
		USERNAME = ?;
	";

	$params=array($username);
	$types="s";
	$result=execute_query($con, $query, $params, $types);
	
    return $result[0]['exists'];
}

function email_exists($con, $email) {
	$query="
	SELECT 
		CASE WHEN COUNT(*) > 0 THEN 1 ELSE 0 END AS `exists`
	FROM 
		USERS
	WHERE
		EMAIL = ?;
	";

	$params=array($email);
	$types="s";
	$result=execute_query($con, $query, $params, $types);

    return $result;
}

function signup_user($con, $first_name, $last_name, $username, $email, $password, $profile_picture_path) {
	$query="
	CALL P_CREATE_USER(?,?,?,?,?,?,@USER_ID);
	";

	$params=array($first_name, $last_name, $username, $email, $password, $profile_picture_path);
	$types="ssssss";
	$out_params=["@USER_ID"];
	$result=execute_query($con, $query, $params, $types, $out_params);

	$user_id=$result['@USER_ID'];

	return $user_id;
}

function signin_user($con, $email, $password) {
	$query="
	SELECT 
		ID,
		PASSWORD_HASH
	FROM 
		USERS
	WHERE
		EMAIL = ?;
	";

	$params=array($email);
	$types="s";
	$user_details=execute_query($con, $query, $params, $types)[0];

	$user_id=$user_details['ID'];
	$password_hash=$user_details['PASSWORD_HASH'];

	if(password_verify($password, $password_hash) === false)
		return false;
    else 
		return $user_id;
}

function get_user_details($con, $user_id) {
	$query="
	SELECT 
		ID AS id,
		FIRST_NAME AS first_name,
		LAST_NAME AS last_name,
		USERNAME AS username,
		EMAIL AS email,
		PROFILE_PICTURE_PATH AS profile_picture_path
	FROM 
		USERS
	WHERE
		ID = ?;
	";

	$params=array($user_id);
	$types="s";
	$result=execute_query($con, $query, $params, $types);

	$user_details=$result[0];

    return $user_details;
}
