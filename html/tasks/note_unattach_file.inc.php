<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$note_id =$_GET['note_id'];
$file_id =$_GET['file_id'];

header("location: /tasks/note_view.php?id=$note_id&status=success-file-unattached");
exit;
