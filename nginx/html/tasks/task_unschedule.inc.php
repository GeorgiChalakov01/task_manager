<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$id = $_GET['id'];


unschedule_task($con, $id, $_SESSION['user-details']['id']);
header("location: /tasks/home.php?project_id=$project_id&status=success-task-scheduled");
exit;
