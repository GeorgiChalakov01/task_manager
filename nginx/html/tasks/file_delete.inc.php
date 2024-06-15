<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$id =$_GET['id'];

if(delete_file($con, $id,  $_SESSION['user-details']['id'])) {
	header("location: /tasks/files.php?status=success-file-deleted");
	exit;
}
else {
	header("location: file_edit.php?error=error-file-not-deleted");
	exit;
}
