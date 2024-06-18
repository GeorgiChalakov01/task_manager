<?php
if(!isset($_POST["submit"])) {
	header('location: /index.php');
	exit;
}

require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';


$file_id=$_POST['id'];
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


if(check_privileges($con, $_SESSION['user-details']['id'], $file_id, 'FILE', 'EDIT'))
$minio_key = (string)get_file_info($con, $file_id, $_SESSION['user-details']['id'])['minio_key'];
delete_minio_object($s3, $files_bucket, $minio_key);
upload_file_minio($s3, $_FILES['file'], $files_bucket, (string)$minio_key);
if(edit_file($con, $file_id, $name, $extension, $title, $description, $minio_key, $_SESSION['user-details']['id'])) {
	unappend_categories($con, $file_id, 'FILE', $_SESSION['user-details']['id']);
	foreach($categories as $category_id)
		append_category($con, $category_id, $file_id, 'FILE', $_SESSION['user-details']['id']);
	header("location: /tasks/files.php?status=success-file-edited");
	exit;
}
else {
	header("location: category_edit.php?error=error-file-not-edited");
	exit;
}
