<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$project_id =$_GET['project_id'];
$note_id =$_GET['note_id'];

unattach_note_from_project($con, $note_id, $project_id, $_SESSION['user-details']['id']);

header("location: /tasks/project_view.php?id=$project_id&status=success-note-unattached");
exit;
