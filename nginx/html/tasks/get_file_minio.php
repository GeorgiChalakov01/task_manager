<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

use Aws\S3\S3Client;


echo get_file_minio($con, $_SESSION['user-details']['id'], $_GET['file_id'], $s3, $files_bucket);
exit;
