<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$task_id = $_GET['task_id'];
$project_id = $_GET['project_id'];
$new_place = $_POST['new_place'];

move_task($con, $project_id, $task_id, $new_place, $_SESSION['user-details']['id']);
header("location: /tasks/project_view.php?id=$project_id&status=success-task-moved");
exit;
