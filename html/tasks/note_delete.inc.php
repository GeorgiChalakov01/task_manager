<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$id =$_GET['id'];

if(delete_note($con, $id, $_SESSION['user-details']['id'])) {
	header("location: /tasks/notes.php?status=success-note-deleted");
	exit;
}
else {
	header("location: note_edit.php?error=error-note-not-deleted");
	exit;
}
