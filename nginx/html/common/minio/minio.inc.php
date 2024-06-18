<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/common/minio/credentials.php';

$s3 = new Aws\S3\S3Client([
  'version' => $version,
  'region'  => $region, 
  'endpoint' => $endpoint,
  'use_path_style_endpoint' => true,
  'credentials' => [
    'key'    => $key,
    'secret' => $secret
  ],
]);
