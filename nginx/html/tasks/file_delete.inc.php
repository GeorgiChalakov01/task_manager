<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$id =$_GET['id'];

if(delete_file_minio($con, $_SESSION['user-details']['id'], $id, $s3, $files_bucket)) {
	header("location: /tasks/files.php?status=success-file-deleted");
	exit;
}
else {
	header("location: file_edit.php?error=error-file-not-deleted");
	exit;
}
