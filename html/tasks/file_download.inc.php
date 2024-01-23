<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$file_id=$_GET['id'];
$user_id=$_SESSION['user-details']['id'];

$file_info=get_file_info($con, $file_id, $user_id);
$file=$_SERVER['DOCUMENT_ROOT'] . '/common/uploaded_files/' . $file_info['server_name'] . '.' . $file_info['extension'];

if (!file_exists($file)) {
	die("File not found");
}

header("Content-Description: File Transfer");
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename={$file_info['server_name']}.{$file_info['extension']}");
header("Content-Transfer-Encoding: binary");
header("Expires: 0");
header("Cache-Control: must-revalidate");
header("Pragma: public");
header("Content-Length: " . filesize($file));
ob_clean();
flush();
readfile($file);
exit;
