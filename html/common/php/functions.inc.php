<?php
function execute_query($con, $query, $params, $types, $out_params = null) {
	$stmt = mysqli_stmt_init($con);

	if(!mysqli_stmt_prepare($stmt, $query)) {
		header("location: home.php?error=error-no-db-connection");
		exit();
	}

	if(!empty($params) && !empty($types))
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
			if ($result) {
			    while($row = mysqli_fetch_assoc($result)){
				$data[] = $row;
			    }
			}
		}
		mysqli_stmt_close($stmt);
		return $data;
	}
	else {
		header("location: home.php?error=" . mysqli_stmt_error($stmt));
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

function get_categories($con, $user_id) {
	$query="
	SELECT 
		C.ID AS id,
		C.NAME AS name,
		CS.TEXT_COLOR AS text_color,
		CS.BACKGROUND_COLOR AS background_color
	FROM 
		CATEGORIES C INNER JOIN COLOR_SCHEMES CS ON C.COLOR_SCHEME_ID = CS.ID
	WHERE
		C.OWNER_ID = ?
	ORDER BY
		C.ID;
	";

	$params=array($user_id);
	$types="i";
	$result=execute_query($con, $query, $params, $types);

	return $result;
}

function create_category($con, $owner_id, $name, $color_scheme_id) {
	$query="
	CALL P_CREATE_CATEGORY(?,?,?,@CATEGORY_ID);
	";

	$params=array($owner_id, $name, $color_scheme_id);
	$types="isi";
	$out_params=["@CATEGORY_ID"];
	$result=execute_query($con, $query, $params, $types, $out_params);

	$category_id=$result['@CATEGORY_ID'];

	return $category_id;
}

function edit_category($con, $category_id, $owner_id, $name, $color_scheme_id) {
	$query="
	CALL P_EDIT_CATEGORY(?,?,?,?);
	";

	$params=array($category_id, $owner_id, $name, $color_scheme_id);
	$types="iisi";
	$result=execute_query($con, $query, $params, $types);

	return true;
}

function delete_category($con, $category_id, $user_id) {
	$query="
	CALL P_DELETE_CATEGORY(?,?);
	";

	$params=array($category_id, $user_id);
	$types="ii";
	$result=execute_query($con, $query, $params, $types);

	return true;
}

function append_category($con, $category_id, $object_id, $object_type, $user_id) {
	$query="
	CALL P_APPEND_CATEGORY(?,?,?,?);
	";

	$params=array($category_id, $object_id, $object_type, $user_id);
	$types="iisi";
	$result=execute_query($con, $query, $params, $types);

	return true;
}

function upload_file ($con, $original_name, $server_name, $extension, $title, $description, $user_id) {
	$query="
	CALL P_UPLOAD_FILE(?,?,?,?,?,?,@FILE_ID);
	";

	$params=array($original_name, $server_name, $extension, $title, $description, $user_id);
	$types="sssssi";
	$out_params=["@FILE_ID"];
	$result=execute_query($con, $query, $params, $types, $out_params);

	$file_id=$result['@FILE_ID'];

	return $file_id;
}

function get_default_category_id($con, $user_id) {
	$query="
	SELECT 
		MIN(ID) AS id
	FROM 
		CATEGORIES
	WHERE
		OWNER_ID = ?;
	";

	$params=array($user_id);
	$types="i";
	$result=execute_query($con, $query, $params, $types)[0]['id'];

	return $result;
}

function get_category_info($con, $category_id, $user_id) {
	$query="
	SELECT 
		C.ID AS id,
		C.NAME AS name,
		CS.ID AS color_scheme_id,
		CS.TEXT_COLOR AS text_color,
		CS.BACKGROUND_COLOR AS background_color
	FROM 
		CATEGORIES C INNER JOIN COLOR_SCHEMES CS ON C.COLOR_SCHEME_ID = CS.ID
	WHERE
		C.ID = ? AND
		C.OWNER_ID = ?;
	";

	$params=array($category_id, $user_id);
	$types="ii";
	$result=execute_query($con, $query, $params, $types)[0];

	return $result;
}

function get_color_schemes($con) {
	$query="
	SELECT 
		ID AS id,
		NAME AS name,
		TEXT_COLOR AS text_color,
		BACKGROUND_COLOR AS background_color
	FROM 
		COLOR_SCHEMES
	ORDER BY
		ID;
	";

	$params=array();
	$types="";
	$result=execute_query($con, $query, $params, $types);

	return $result;
}

function get_files($con, $user_id) {
	$query="
	SELECT 
		F.ID AS id,
		F.ORIGINAL_NAME AS original_name,
		F.SERVER_NAME AS server_name,
		F.EXTENSION AS extension,
		F.TITLE AS title,
		F.DESCRIPTION AS description,
		F.UPLOADED_ON AS uploaded_on
	FROM 
		FILES F INNER JOIN FILE_PRIVILEGES FP ON F.ID = FP.FILE_ID
	WHERE
		FP.USER_ID = ? AND
		FP.PRIVILEGE = 'VIEW'
	ORDER BY
		F.ID;
	";

	$params=array($user_id);
	$types="i";
	$result=execute_query($con, $query, $params, $types);

	return $result;
}

function get_files_from_category($con, $user_id, $category_id) {
	$query="
	SELECT 
		F.ID AS id,
		F.ORIGINAL_NAME AS original_name,
		F.SERVER_NAME AS server_name,
		F.EXTENSION AS extension,
		F.TITLE AS title,
		F.DESCRIPTION AS description,
		F.UPLOADED_ON AS uploaded_on
	FROM 
		FILES F 
		INNER JOIN FILE_PRIVILEGES FP ON F.ID = FP.FILE_ID
		INNER JOIN FILES_HAVE_CATEGORIES FC ON F.ID = FC.FILE_ID
	WHERE
		FP.USER_ID = ? AND
		FP.PRIVILEGE = 'VIEW' AND
		FC.CATEGORY_ID = ?
	ORDER BY
		F.ID;
	";

	$params=array($user_id, $category_id);
	$types="ii";
	$result=execute_query($con, $query, $params, $types);

	return $result;
}

function get_file_info($con, $file_id, $user_id) {
	$query="
	SELECT 
		F.ID AS id,
		F.ORIGINAL_NAME AS original_name,
		F.SERVER_NAME AS server_name,
		F.EXTENSION AS extension,
		F.TITLE AS title,
		F.DESCRIPTION AS description,
		F.UPLOADED_ON AS uploaded_on
	FROM 
		FILES F INNER JOIN FILE_PRIVILEGES FP ON F.ID = FP.FILE_ID
	WHERE
		FP.FILE_ID = ? AND
		FP.USER_ID = ? AND
		FP.PRIVILEGE = 'VIEW'
	ORDER BY
		F.ID;
	";

	$params=array($file_id, $user_id);
	$types="ii";
	$result=execute_query($con, $query, $params, $types);

	return $result[0];
}

function save_file($file, $destination_directory) {
	// File information
	$file_info = pathinfo($file['name']);
	$file_name = $file_info['filename'];
	$file_extension = $file_info['extension'];

	// Get the target destination for the file.
	$file_destination;
	$file_tmp_name = $file['tmp_name'];
	$next_file_number='';
	if($file_name) {
		$files_in_directory = glob($destination_directory . '*.*');
		$file_numbers = array_map(
				function($file) {
				return intval(pathinfo($file, PATHINFO_FILENAME));
				},
				$files_in_directory
				);
		$next_file_number = empty($file_numbers) ? 1 : max($file_numbers) + 1;

		$file_destination = $destination_directory . $next_file_number . '.' . $file_extension;
	}

	// Move the uploaded file to the target destination.
	if(move_uploaded_file($file_tmp_name, $file_destination)) {
		return $next_file_number;
	} else {
		return false;
	}
}

