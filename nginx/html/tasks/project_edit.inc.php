<?php
if(!isset($_POST["submit"])) {
	header('location: /index.php');
	exit;
}

require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

// Retrieve form data
$project_id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$deadline = $_POST['deadline']?$_POST['deadline']:NULL;

$categories = array();
foreach($_POST as $key => $value) {
	if(strpos($key, 'category_') === 0) {
		$categories[] = substr($key, 9);
	}
}

$notes=array();
foreach($_POST as $key => $value) {
	if(strpos($key, 'note_') === 0) {
		$notes[] = substr($key, 5); 
	}
}

//Save the input data in the session
$_SESSION['create-project-form'] = array(
	'title' => $title,
	'description' => $description,
	'deadline' => $deadline,
	'categories' => $categories
);

if(edit_project($con, $project_id, $title, $description, $deadline, $_SESSION['user-details']['id'])) {
	unappend_categories($con, $project_id, 'PROJECT', $_SESSION['user-details']['id']);
	foreach($categories as $category_id) {
		append_category($con, $category_id, $project_id, 'PROJECT', $_SESSION['user-details']['id']);
	}

	unattach_notes_from_project($con, $project_id, $_SESSION['user-details']['id']);
	foreach($notes as $note_id)
		    attach_note_to_project($con, $note_id, $project_id, $_SESSION['user-details']['id']);

	header("location: /tasks/projects.php?status=success-project-created");
	exit;
}
else {
	header("location: project_edit.php?error=error-project-not-created");
	exit;
}
