<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$id =$_GET['id'];
$project_id =$_GET['project_id'];

if(delete_task($con, $id, $project_id, $_SESSION['user-details']['id'])) {
	header("location: /tasks/project_view.php?id=$project_id&status=success-note-deleted");
	exit;
}
else {
	header("location: note_edit.php?error=error-note-not-deleted");
	exit;
}
