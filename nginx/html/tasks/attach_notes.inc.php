<?php
if(!isset($_POST["submit"])) {
	header('location: /index.php');
	exit;
}

require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$id=$_GET['id'];
$notes=array();

foreach($_POST as $key => $value) {
	if(strpos($key, 'checkbox_note_') === 0) {
		$notes[] = substr($key, 14); 
	}
}

unattach_notes_from_project($con, $id, $_SESSION['user-details']['id']);
foreach($notes as $note_id)
	attach_note_to_project($con, $note_id, $id, $_SESSION['user-details']['id']);

header("location: /tasks/project_view.php?id=$id&status=success-notes-attached");
exit;
