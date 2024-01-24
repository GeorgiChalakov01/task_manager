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


if($note_id=create_note($con, $title, $description, $_SESSION['user-details']['id'])) {
	foreach($categories as $category_id)
		append_category($con, $category_id, $note_id, 'NOTE', $_SESSION['user-details']['id']);
	header("location: /tasks/notes.php?status=success-note-created");
	exit;
}
else {
	header("location: file_edit.php?error=error-file-not-created");
	exit;
}
