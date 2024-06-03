<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$project_id = $_GET['project_id'];
$task_id = $_GET['task_id'];

$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];


schedule_task($con, $task_id, $start_time, $end_time, $_SESSION['user-details']['id']);
header("location: /tasks/home.php?project_id=$project_id&status=success-task-scheduled");
exit;
