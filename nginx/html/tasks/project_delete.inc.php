<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$id =$_GET['id'];

if(delete_project($con, $id, $_SESSION['user-details']['id'])) {
	header("location: /tasks/projects.php?status=success-project-deleted");
	exit;
}
else {
	header("location: project_edit.php?error=error-project-not-deleted");
	exit;
}
