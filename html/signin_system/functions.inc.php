<?php
function execute_query($con, $query, $params, $types) {
	$stmt = mysqli_stmt_init($con);

	if(!mysqli_stmt_prepare($stmt, $query)) {
		header("location: signin.php?language_code=en&error=error-no-db-connection");
		exit();
	}

	mysqli_stmt_bind_param($stmt, $types, ...$params);

	if(mysqli_stmt_execute($stmt)){
		$result = mysqli_stmt_get_result($stmt);
		mysqli_stmt_close($stmt);

		$data = array();
		while($row = mysqli_fetch_assoc($result)){
			$data[] = $row;
		}
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
	$user_details=execute_query($con, $query, $params, $types);

	$user_id=$user_details['ID'];
	$password_hash=$user_details['PASSWORD_HASH'];

	if(password_verify($password, $password_hash) === false) {
		return false;
    }
    else {
        session_start();
        $_SESSION['id'] = $user_id;
        $_SESSION['signedin'] = true;
		return true;
    }
}
