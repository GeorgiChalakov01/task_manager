<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$project_id =$_GET['project_id'];
$task_id =$_GET['task_id'];
$note_id =$_GET['note_id'];

unattach_note_from_task($con, $note_id, $task_id, $_SESSION['user-details']['id']);

header("location: /tasks/project_view.php?id=$project_id&status=success-note-unattached");
exit;
