<?php
if(!isset($_POST["submit"])) {
	header('location: /index.php');
	exit;
}

require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';


$note_id=$_POST['id'];
$title=$_POST['title'];
$description=$_POST['description'];

$categories=array();
foreach($_POST as $key => $value) {
	if(strpos($key, 'category_') === 0) {
		$categories[] = substr($key, 9);
	}
}

$files=array();
foreach($_POST as $key => $value) {
	if(strpos($key, 'file_') === 0) {
		$files[] = substr($key, 5);
	}
}


//Save the inputed data in the session
$_SESSION['edit-note-form'] = array(
	'title' => $title,
	'description' => $description,
	'categories' => $categories
);


if(edit_note($con, $note_id, $title, $description, $_SESSION['user-details']['id'])) {
	unappend_categories($con, $note_id, 'NOTE', $_SESSION['user-details']['id']);
	foreach($categories as $category_id)
		append_category($con, $category_id, $note_id, 'NOTE', $_SESSION['user-details']['id']);

	unattach_files_from_note($con, $note_id, $_SESSION['user-details']['id']);
	foreach($files as $file_id)
		attach_file_to_note($con, $file_id, $note_id, $_SESSION['user-details']['id']);

	header("location: /tasks/notes.php?status=success-note-edited");
	exit;
}
else {
	header("location: note_edit.php?error=error-note-not-edited");
	exit;
}
