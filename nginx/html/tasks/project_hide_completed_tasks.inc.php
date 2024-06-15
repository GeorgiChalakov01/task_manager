<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$id =$_GET['id'];
$current_status = $_GET['current_status'];
$changed_status_text = $_GET['current_status']?'-not':'';

if(flip_hide_completed_tasks_of_project($con, $id, $_SESSION['user-details']['id'])) {
	header("location: /tasks/project_view.php?id=$id&status=success-project-completed-tasks$changed_status_text-hidden");
	exit;
}
else {
	header("location: /tasks/project_view.php?id=$id&status=error-project-completed-tasks-hide-failed");
	exit;
}
