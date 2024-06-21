<?php

require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

use Aws\S3\S3Client;

$file = get_file_info($con, $_GET['file_id'], $_SESSION['user-details']['id']);
$file_contents = get_file_minio($con, $_SESSION['user-details']['id'], $_GET['file_id'], $s3, $files_bucket);

$extension = $file['extension'];
$filename = $file['name'] . '.' . $extension;

switch ($extension) {
	case 'png':
		$contentType = 'image/png';
		break;
	case 'jpg':
	case 'jpeg':
		$contentType = 'image/jpeg';
		break;
	case 'gif':
		$contentType = 'image/gif';
		break;
	case 'bmp':
		$contentType = 'image/bmp';
		break;
	case 'tiff':
		$contentType = 'image/tiff';
		break;
	case 'pdf':
		$contentType = 'application/pdf';
		break;
	case 'doc':
	case 'docx':
		$contentType = 'application/msword';
		break;
	case 'xls':
	case 'xlsx':
		$contentType = 'application/vnd.ms-excel';
		break;
	case 'ppt':
	case 'pptx':
		$contentType = 'application/vnd.ms-powerpoint';
		break;
	case 'zip':
		$contentType = 'application/zip';
		break;
	case 'rar':
		$contentType = 'application/x-rar-compressed';
		break;
	case 'txt':
		$contentType = 'text/plain';
		break;
	default:
		$contentType = 'application/octet-stream';
		break;
}

header('Content-Transfer-Encoding: binary');
header('Content-Type: ' . $contentType);
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Content-Length: ' . strlen($file_contents));

ob_clean();
flush();
echo $file_contents;
exit;
