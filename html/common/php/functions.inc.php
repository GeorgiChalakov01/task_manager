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

function create_note($con, $title, $description, $user_id) {
	$query="
	CALL P_CREATE_NOTE(?,?,?,@NOTE_ID);
	";

	$params=array($title, $description, $user_id);
	$types="ssi";
	$out_params=["@NOTE_ID"];
	$result=execute_query($con, $query, $params, $types, $out_params);

	$category_id=$result['@NOTE_ID'];

	return $category_id;
}

function create_project($con, $title, $description, $deadline, $user_id) {
	$deadline = !empty($deadline) ? date('Y-m-d H:i:s', strtotime($deadline)) : NULL;

	$query = "CALL P_CREATE_PROJECT(?,?,?,?,@PROJECT_ID);";

	$params = array($title, $description, $deadline, $user_id);
	$types = "sssi";
	$out_params = ["@PROJECT_ID"];
	$result = execute_query($con, $query, $params, $types, $out_params);

	$project_id = $result['@PROJECT_ID'];

	return $project_id;
}

function create_task($con, $project_id, $blocker, $title, $description, $duration, $deadline, $user_id) {
	$deadline = !empty($deadline) ? date('Y-m-d H:i:s', strtotime($deadline)) : NULL;

	$query = "CALL P_CREATE_TASK(?,?,?,?,?,?,?,@TASK_ID);";

	$params = array($project_id, $blocker, $title, $description, $duration, $deadline, $user_id);
	$types = "iissisi";
	$out_params = ["@TASK_ID"];
	$result = execute_query($con, $query, $params, $types, $out_params);

	$task_id = $result['@TASK_ID'];

	return $task_id;
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

function edit_file($con, $file_id, $original_name, $server_name, $extension, $title, $description, $user_id) {
	$query="
	CALL P_EDIT_FILE(?,?,?,?,?,?,?);
	";

	$params=array($file_id, $original_name, $server_name, $extension, $title, $description, $user_id);
	$types="isssssi";
	$result=execute_query($con, $query, $params, $types);

	return true;
}

function edit_note($con, $note_id, $title, $description, $user_id) {
	$query="
	CALL P_EDIT_NOTE(?,?,?,?);
	";

	$params=array($note_id, $title, $description, $user_id);
	$types="issi";
	$result=execute_query($con, $query, $params, $types);

	return true;
}

function edit_project($con, $project_id, $title, $description, $deadline, $user_id) {
	$query="
	CALL P_EDIT_PROJECT(?,?,?,?,?);
	";

	$params=array($project_id, $title, $description, $deadline, $user_id);
	$types="isssi";
	$result=execute_query($con, $query, $params, $types);

	return true;
}

function edit_task($con, $task_id, $blocker, $title, $description, $duration, $deadline, $user_id) {
	$query="
	CALL P_EDIT_TASK(?,?,?,?,?,?,?);
	";

	$params=array($task_id, $blocker, $title, $description, $duration, $deadline, $user_id);
	$types="iissssi";
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

function delete_file($con, $file_id, $user_id) {
	$query="
	CALL P_DELETE_FILE(?,?);
	";

	$params=array($file_id, $user_id);
	$types="ii";
	$result=execute_query($con, $query, $params, $types);

	return true;
}

function delete_note($con, $note_id, $user_id) {
	$query="
	CALL P_DELETE_NOTE(?,?);
	";

	$params=array($note_id, $user_id);
	$types="ii";
	$result=execute_query($con, $query, $params, $types);

	return true;
}

function delete_task($con, $task_id, $project_id, $user_id) {
	$query="
	CALL P_DELETE_TASK(?,?,?);
	";

	$params=array($task_id, $project_id, $user_id);
	$types="iii";
	$result=execute_query($con, $query, $params, $types);

	return true;
}

function delete_project($con, $project_id, $user_id) {
	$query="
	CALL P_DELETE_PROJECT(?,?);
	";

	$params=array($project_id, $user_id);
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
		F.UPLOADED_ON AS uploaded_on,
		CASE 
		WHEN INSTR(GROUP_CONCAT(DISTINCT CS.BACKGROUND_COLOR ORDER BY CS.BACKGROUND_COLOR SEPARATOR ', '), ',') > 0 
		THEN CONCAT('background: linear-gradient(to right, ', GROUP_CONCAT(DISTINCT CS.BACKGROUND_COLOR ORDER BY CS.BACKGROUND_COLOR SEPARATOR ', '), ');')
		ELSE CONCAT('background-color: ', GROUP_CONCAT(DISTINCT CS.BACKGROUND_COLOR ORDER BY CS.BACKGROUND_COLOR SEPARATOR ', '), ';')
		END AS background_color,
		MAX(CS.TEXT_COLOR) AS text_color
	FROM 
		FILES F 
		INNER JOIN FILE_PRIVILEGES FP ON F.ID = FP.FILE_ID
		INNER JOIN FILES_HAVE_CATEGORIES FC ON FC.FILE_ID = F.ID
		INNER JOIN CATEGORIES C ON C.ID = FC.CATEGORY_ID
		INNER JOIN COLOR_SCHEMES CS ON CS.ID = C.COLOR_SCHEME_ID
	WHERE
		FP.USER_ID = ? AND
		FP.PRIVILEGE = 'VIEW'
	GROUP BY
		F.ID, F.ORIGINAL_NAME, F.SERVER_NAME, F.EXTENSION, F.TITLE, F.DESCRIPTION, F.UPLOADED_ON
	ORDER BY
		F.UPLOADED_ON DESC;
	";

	$params=array($user_id);
	$types="i";
	$result=execute_query($con, $query, $params, $types);

	return $result;
}

function get_notes($con, $user_id) {
	$query="
		SELECT 
			N.ID AS id,
			N.TITLE AS title,
			N.DESCRIPTION AS description,
			N.CREATED_ON AS created_on,
			CASE 
			WHEN INSTR(GROUP_CONCAT(DISTINCT CS.BACKGROUND_COLOR ORDER BY CS.BACKGROUND_COLOR SEPARATOR ', '), ',') > 0 
			THEN CONCAT('background: linear-gradient(to right, ', GROUP_CONCAT(DISTINCT CS.BACKGROUND_COLOR ORDER BY CS.BACKGROUND_COLOR SEPARATOR ', '), ');')
			ELSE CONCAT('background-color: ', GROUP_CONCAT(DISTINCT CS.BACKGROUND_COLOR ORDER BY CS.BACKGROUND_COLOR SEPARATOR ', '), ';')
			END AS background_color,
			MAX(CS.TEXT_COLOR) AS text_color
		FROM 
			NOTES N 
			INNER JOIN NOTE_PRIVILEGES NP ON N.ID = NP.NOTE_ID
			INNER JOIN NOTES_HAVE_CATEGORIES NC ON NC.NOTE_ID = N.ID
			INNER JOIN CATEGORIES C ON C.ID = NC.CATEGORY_ID
			INNER JOIN COLOR_SCHEMES CS ON CS.ID = C.COLOR_SCHEME_ID
		WHERE
			NP.USER_ID = ? AND
			NP.PRIVILEGE = 'VIEW'
		GROUP BY
			N.ID, N.TITLE, N.DESCRIPTION, N.CREATED_ON
		ORDER BY
			N.CREATED_ON DESC;

	";

	$params=array($user_id);
	$types="i";
	$result=execute_query($con, $query, $params, $types);

	return $result;
}

function get_projects($con, $user_id) {
	$query = "
	SELECT 
		P.ID AS id,
		P.TITLE AS title,
		P.DESCRIPTION AS description,
		P.CREATED_ON AS created_on,
		P.ENDED_ON AS ended_on,
		P.DEADLINE AS deadline
	FROM 
		PROJECTS P INNER JOIN PROJECT_PRIVILEGES PP ON P.ID = PP.PROJECT_ID
	WHERE
		PP.USER_ID = ? AND
		PP.PRIVILEGE = 'VIEW'
	ORDER BY
		P.ID;
	";

	$params = array($user_id);
	$types = "i";
	$result = execute_query($con, $query, $params, $types);

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
		F.UPLOADED_ON;
	";

	$params=array($user_id, $category_id);
	$types="ii";
	$result=execute_query($con, $query, $params, $types);

	return $result;
}

function get_notes_from_category($con, $user_id, $category_id) {
	$query="
	SELECT 
		N.ID AS id,
		N.TITLE AS title,
		N.DESCRIPTION AS description,
		N.CREATED_ON AS created_on
	FROM 
		NOTES N 
		INNER JOIN NOTE_PRIVILEGES NP ON N.ID = NP.NOTE_ID
		INNER JOIN NOTES_HAVE_CATEGORIES NC ON N.ID = NC.NOTE_ID
	WHERE
		NP.USER_ID = ? AND
		NP.PRIVILEGE = 'VIEW' AND
		NC.CATEGORY_ID = ?
	ORDER BY
		N.CREATED_ON;
	";

	$params=array($user_id, $category_id);
	$types="ii";
	$result=execute_query($con, $query, $params, $types);

	return $result;
}

function get_projects_from_category($con, $user_id, $category_id) {
	$query="
	SELECT 
		P.ID AS id,
		P.TITLE AS title,
		P.DESCRIPTION AS description,
		P.CREATED_ON AS created_on,
		P.ENDED_ON AS ended_on,
		P.DEADLINE AS deadline
	FROM 
		PROJECTS P
		INNER JOIN PROJECT_PRIVILEGES PP ON P.ID = PP.PROJECT_ID
		INNER JOIN PROJECTS_HAVE_CATEGORIES PC ON P.ID = PC.PROJECT_ID
	WHERE
		PP.USER_ID = ? AND
		PP.PRIVILEGE = 'VIEW' AND
		PC.CATEGORY_ID = ?
	ORDER BY
		P.ID;
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
		FP.PRIVILEGE = 'EDIT'
	ORDER BY
		F.ID;
	";

	$params=array($file_id, $user_id);
	$types="ii";
	$result=execute_query($con, $query, $params, $types);

	return $result[0];
}

function get_note_info($con, $note_id, $user_id) {
	$query="
	SELECT 
		N.ID AS id,
		N.TITLE AS title,
		N.DESCRIPTION AS description,
		N.CREATED_ON AS created_on
	FROM 
		NOTES N INNER JOIN NOTE_PRIVILEGES NP ON N.ID = NP.NOTE_ID
	WHERE
		NP.NOTE_ID = ? AND
		NP.USER_ID = ? AND
		NP.PRIVILEGE = 'VIEW'
	ORDER BY
		N.ID;
	";

	$params=array($note_id, $user_id);
	$types="ii";
	$result=execute_query($con, $query, $params, $types);

	return $result[0];
}

function get_project_info($con, $project_id, $user_id) {
	$query = "
	SELECT 
		P.ID AS id,
		P.TITLE AS title,
		P.DESCRIPTION AS description,
		P.CREATED_ON AS created_on,
		P.DEADLINE AS deadline,
		P.ENDED_ON AS ended_on
	FROM 
		PROJECTS P INNER JOIN PROJECT_PRIVILEGES PP ON P.ID = PP.PROJECT_ID
	WHERE
		PP.PROJECT_ID = ? AND
		PP.USER_ID = ? AND
		PP.PRIVILEGE = 'VIEW'
	ORDER BY
		P.ID;
	";

	$params = array($project_id, $user_id);
	$types = "ii";
	$result = execute_query($con, $query, $params, $types);

	return $result[0];
}

function get_task_info($con, $task_id, $user_id) {
	$query = "
	SELECT 
		T.ID AS id,
		T.PROJECT_ID AS project_id,
		T.PLACE AS place,
		T.BLOCKER AS blocker,
		T.TITLE AS title,
		T.DESCRIPTION AS description,
		T.CREATED_ON AS created_on,
		T.COMPLETED_ON AS completed_on,
		T.DURATION AS duration,
		T.DEADLINE AS deadline
	FROM 
		TASKS T INNER JOIN TASK_PRIVILEGES TP ON T.ID = TP.TASK_ID
	WHERE
		TP.TASK_ID = ? AND
		TP.USER_ID = ? AND
		TP.PRIVILEGE = 'VIEW'
	ORDER BY
		T.ID;
	";

	$params = array($task_id, $user_id);
	$types = "ii";
	$result = execute_query($con, $query, $params, $types);

	return $result[0];
}

function get_file_categories($con, $file_id, $user_id) {
	$query="
	SELECT 
		C.ID AS id
	FROM 
		CATEGORIES C INNER JOIN FILES_HAVE_CATEGORIES FC ON C.ID = FC.CATEGORY_ID
	WHERE
		C.OWNER_ID = ? AND
		FC.FILE_ID = ?
	ORDER BY
		C.ID;
	";

	$params=array($user_id, $file_id);
	$types="ii";
	$categories=execute_query($con, $query, $params, $types);

	$ids = array();
	foreach($categories as $category)
		$ids[] = $category['id'];

	return $ids;
}

function get_note_categories($con, $note_id, $user_id) {
	$query="
	SELECT 
		C.ID AS id
	FROM 
		CATEGORIES C INNER JOIN NOTES_HAVE_CATEGORIES NC ON C.ID = NC.CATEGORY_ID
	WHERE
		C.OWNER_ID = ? AND
		NC.NOTE_ID = ?
	ORDER BY
		C.ID;
	";

	$params=array($user_id, $note_id);
	$types="ii";
	$categories=execute_query($con, $query, $params, $types);

	$ids = array();
	foreach($categories as $category)
		$ids[] = $category['id'];

	return $ids;
}

function get_project_categories($con, $project_id, $user_id) {
	$query="
	SELECT 
		C.ID AS id
	FROM 
		CATEGORIES C INNER JOIN PROJECTS_HAVE_CATEGORIES PC ON C.ID = PC.CATEGORY_ID
	WHERE
		C.OWNER_ID = ? AND
		PC.PROJECT_ID = ?
	ORDER BY
		C.ID;
	";

	$params=array($user_id, $project_id);
	$types="ii";
	$categories=execute_query($con, $query, $params, $types);

	$ids = array();
	foreach($categories as $category)
		$ids[] = $category['id'];

	return $ids;
}

function unappend_categories($con, $object_id, $object_type, $user_id) {
	$query="
	DELETE 
		OC
	FROM " .
		$object_type . "S_HAVE_CATEGORIES OC
		INNER JOIN CATEGORIES C ON C.ID = OC.CATEGORY_ID
	WHERE 
		C.OWNER_ID = ? AND 
		OC." . $object_type . "_ID = ?;
	";

	$params=array($user_id, $object_id);
	$types="ii";
	$categories=execute_query($con, $query, $params, $types);

	$ids = array();
	foreach($categories as $category)
		$ids[] = $category['id'];

	return $ids;
}

function unattach_files_from_note($con, $note_id, $user_id) {
	$query="
	CALL P_UNATTACH_FILES_FROM_NOTE(?,?);
	";

	$params=array($note_id, $user_id);
	$types="ii";
	execute_query($con, $query, $params, $types);
}

function unattach_notes_from_project($con, $project_id, $user_id) {
	$query = "
	CALL P_UNATTACH_NOTES_FROM_PROJECT(?,?);
	";

	$params = array($project_id, $user_id);
	$types = "ii";
	execute_query($con, $query, $params, $types);
}

function unattach_notes_from_task($con, $task_id, $user_id) {
	$query = "
	CALL P_UNATTACH_NOTES_FROM_TASK(?,?);
	";

	$params = array($task_id, $user_id);
	$types = "ii";
	execute_query($con, $query, $params, $types);
}

function unattach_note_from_project($con, $note, $project_id, $user_id) {
	$query = "
	CALL P_UNATTACH_NOTE_FROM_PROJECT(?,?,?);
	";

	$params = array($note, $project_id, $user_id);
	$types = "iii";
	execute_query($con, $query, $params, $types);
}

function unattach_note_from_task($con, $note, $task_id, $user_id) {
	$query = "
	CALL P_UNATTACH_NOTE_FROM_TASK(?,?,?);
	";

	$params = array($note, $task_id, $user_id);
	$types = "iii";
	execute_query($con, $query, $params, $types);
}

function unattach_file_from_note($con, $file_id, $note_id, $user_id) {
	$query="
	CALL P_UNATTACH_FILE_FROM_NOTE(?,?,?);
	";

	$params=array($file_id, $note_id, $user_id);
	$types="iii";
	execute_query($con, $query, $params, $types);
}

function attach_file_to_note($con, $file_id, $note_id, $user_id) {
	$query="
	CALL P_ATTACH_FILE_TO_NOTE(?,?,?);
	";

	$params=array($file_id, $note_id, $user_id);
	$types="iii";
	execute_query($con, $query, $params, $types);
}

function attach_note_to_project($con, $note_id, $project_id, $user_id) {
	$query="
	CALL P_ATTACH_NOTE_TO_PROJECT(?,?,?);
	";

	$params=array($note_id, $project_id, $user_id);
	$types="iii";
	execute_query($con, $query, $params, $types);
}

function attach_note_to_task($con, $note_id, $task_id, $user_id) {
	$query="
	CALL P_ATTACH_NOTE_TO_TASK(?,?,?);
	";

	$params=array($note_id, $task_id, $user_id);
	$types="iii";
	execute_query($con, $query, $params, $types);
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

function get_attached_files_to_note($con, $note_id, $user_id) {
	$query="
	SELECT 
		F.ID AS id,
		F.ORIGINAL_NAME AS original_name,
		F.SERVER_NAME AS server_name,
		F.EXTENSION AS extension,
		F.TITLE AS title,
		F.DESCRIPTION AS description,
		F.UPLOADED_ON AS uploaded_on,
		CASE 
		WHEN INSTR(GROUP_CONCAT(DISTINCT CS.BACKGROUND_COLOR ORDER BY CS.BACKGROUND_COLOR SEPARATOR ', '), ',') > 0 
		THEN CONCAT('background: linear-gradient(to right, ', GROUP_CONCAT(DISTINCT CS.BACKGROUND_COLOR ORDER BY CS.BACKGROUND_COLOR SEPARATOR ', '), ');')
		ELSE CONCAT('background-color: ', GROUP_CONCAT(DISTINCT CS.BACKGROUND_COLOR ORDER BY CS.BACKGROUND_COLOR SEPARATOR ', '), ';')
		END AS background_color,
		MAX(CS.TEXT_COLOR) AS text_color
	FROM 
		NOTES_ATTACH_FILES NF
		INNER JOIN FILES F ON F.ID = NF.FILE_ID
		INNER JOIN FILE_PRIVILEGES FP ON F.ID = FP.FILE_ID
		INNER JOIN FILES_HAVE_CATEGORIES FC ON FC.FILE_ID = F.ID
		INNER JOIN CATEGORIES C ON C.ID = FC.CATEGORY_ID
		INNER JOIN COLOR_SCHEMES CS ON CS.ID = C.COLOR_SCHEME_ID
	WHERE
		FP.USER_ID = ? AND
		NF.NOTE_ID = ? AND
		FP.PRIVILEGE = 'VIEW'
	GROUP BY
		F.ID, F.ORIGINAL_NAME, F.SERVER_NAME, F.EXTENSION, F.TITLE, F.DESCRIPTION, F.UPLOADED_ON
	ORDER BY
		F.ID;
	";

	$params=array($user_id, $note_id);
	$types="ii";
	$result=execute_query($con, $query, $params, $types);

	return $result;
}

function get_attached_notes_to_project($con, $project_id, $user_id) {
	$query = "
	SELECT 
		N.ID AS id,
		N.TITLE AS title,
		N.DESCRIPTION AS description,
		N.CREATED_ON AS created_on,
		CASE 
		WHEN INSTR(GROUP_CONCAT(DISTINCT CS.BACKGROUND_COLOR ORDER BY CS.BACKGROUND_COLOR SEPARATOR ', '), ',') > 0 
		THEN CONCAT('background: linear-gradient(to right, ', GROUP_CONCAT(DISTINCT CS.BACKGROUND_COLOR ORDER BY CS.BACKGROUND_COLOR SEPARATOR ', '), ');')
		ELSE CONCAT('background-color: ', GROUP_CONCAT(DISTINCT CS.BACKGROUND_COLOR ORDER BY CS.BACKGROUND_COLOR SEPARATOR ', '), ';')
		END AS background_color,
		MAX(CS.TEXT_COLOR) AS text_color
	FROM 
		PROJECTS_ATTACH_NOTES PN
		INNER JOIN NOTES N ON N.ID = PN.NOTE_ID
		INNER JOIN NOTE_PRIVILEGES NP ON N.ID = NP.NOTE_ID
		LEFT JOIN NOTES_HAVE_CATEGORIES NC ON NC.NOTE_ID = N.ID
		LEFT JOIN CATEGORIES C ON C.ID = NC.CATEGORY_ID
		LEFT JOIN COLOR_SCHEMES CS ON CS.ID = C.COLOR_SCHEME_ID
	WHERE
		NP.USER_ID = ? AND
		PN.PROJECT_ID = ? AND
		NP.PRIVILEGE = 'VIEW'
	GROUP BY
		N.ID, N.TITLE, N.DESCRIPTION, N.CREATED_ON
	ORDER BY
		N.ID;
	";

	$params = array($user_id, $project_id);
	$types = "ii";
	$result = execute_query($con, $query, $params, $types);

	return $result;
}

function get_attached_notes_to_task($con, $task_id, $user_id) {
	$query = "
	SELECT 
			N.ID AS id,
			N.TITLE AS title,
			N.DESCRIPTION AS description,
			N.CREATED_ON AS created_on,
			CASE 
			WHEN INSTR(GROUP_CONCAT(DISTINCT CS.BACKGROUND_COLOR ORDER BY CS.BACKGROUND_COLOR SEPARATOR ', '), ',') > 0 
			THEN CONCAT('background: linear-gradient(to right, ', GROUP_CONCAT(DISTINCT CS.BACKGROUND_COLOR ORDER BY CS.BACKGROUND_COLOR SEPARATOR ', '), ');')
			ELSE CONCAT('background-color: ', GROUP_CONCAT(DISTINCT CS.BACKGROUND_COLOR ORDER BY CS.BACKGROUND_COLOR SEPARATOR ', '), ';')
			END AS background_color,
			MAX(CS.TEXT_COLOR) AS text_color
	FROM 
			TASKS_ATTACH_NOTES TN
			INNER JOIN NOTES N ON N.ID = TN.NOTE_ID
			INNER JOIN NOTE_PRIVILEGES NP ON N.ID = NP.NOTE_ID
			LEFT JOIN NOTES_HAVE_CATEGORIES NC ON NC.NOTE_ID = N.ID
			LEFT JOIN CATEGORIES C ON C.ID = NC.CATEGORY_ID
			LEFT JOIN COLOR_SCHEMES CS ON CS.ID = C.COLOR_SCHEME_ID
	WHERE
			NP.USER_ID = ? AND
			TN.TASK_ID = ? AND
			NP.PRIVILEGE = 'VIEW'
	GROUP BY
			N.ID, N.TITLE, N.DESCRIPTION, N.CREATED_ON
	ORDER BY
			N.ID;
	";

	$params = array($user_id, $task_id);
	$types = "ii";
	$result = execute_query($con, $query, $params, $types);

	return $result;
}

function get_project_tasks($con, $project_id, $user_id) {
	$query = "
	SELECT 
		T.ID AS id,
		T.PROJECT_ID AS project_id,
		T.PLACE AS place,
		T.BLOCKER AS blocker,
		T.TITLE AS title,
		T.DESCRIPTION AS description,
		T.CREATED_ON AS created_on,
		T.COMPLETED_ON AS completed_on,
		T.DURATION AS duration,
		T.DEADLINE AS deadline
	FROM 
		TASKS T
		INNER JOIN TASK_PRIVILEGES TP ON TP.TASK_ID = T.ID
	WHERE
		TP.USER_ID = ? AND
		T.PROJECT_ID = ? AND
		TP.PRIVILEGE = 'VIEW'
	ORDER BY
		T.PLACE DESC;
	";

	$params = array($user_id, $project_id);
	$types = "ii";
	$result = execute_query($con, $query, $params, $types);

	return $result;
}

