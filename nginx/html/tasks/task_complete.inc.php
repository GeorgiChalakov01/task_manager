<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$id =$_GET['id'];

complete_task($con, $id, $_SESSION['user-details']['id']);
header("location: /tasks/task_view.php?id=$id&status=success-task-completed");
exit;
