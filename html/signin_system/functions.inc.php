<?php
function execute_query($con, $query, $params, $types) {
	$stmt = mysqli_stmt_init($con);

	if(!mysqli_stmt_prepare($stmt, $query)) {
		$error_message = urlencode("No connection with the DataBase! Statement not prepared.");
		header("location: home.php?error=$error_message");
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
