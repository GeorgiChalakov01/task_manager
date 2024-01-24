<?php
if(!isset($_POST["submit"])) {
	header('location: /index.php');
	exit;
}

require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$title=$_POST['title'];
$description=$_POST['description'];

$categories=array();
foreach($_POST as $key => $value) {
	if(strpos($key, 'category_') === 0) {
		$categories[] = substr($key, 9);
	}
}


//Save the inputed data in the session
$_SESSION['edit-file-form'] = array(
	'title' => $title,
	'description' => $description,
	'categories' => $categories
);

$server_name = save_file($_FILES['file'], __DIR__ . '/../common/uploaded_files/');
if ($server_name === false) {
	header('location: file_edit.php?error=error-file-upload');
	exit;
}

$original_name = pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME);
$extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

if($file_id=upload_file($con, $original_name, $server_name, $extension, $title, $description, $_SESSION['user-details']['id'])) {
	foreach($categories as $category_id)
		append_category($con, $category_id, $file_id, 'FILE', $_SESSION['user-details']['id']);
	header("location: /tasks/files.php?status=success-file-uploaded");
	exit;
}
else {
	header("location: file_edit.php?error=error-file-not-created");
	exit;
}
