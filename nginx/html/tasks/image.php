<?php

$version = 'latest';
$region = 'us-east-1';
$endpoint = 'http://172.17.0.4:9000';
$key = 'dpv0VJHaSMwaMtwpMliQ';
$secret = 'MGVQ5vuV9C11Re1zd2jQCOwNN16lOnjuOKL358MG';
$files_bucket = 'files';

require_once '../common/composer/vendor/autoload.php';

use Aws\S3\S3Client;

$s3 = new S3Client([
    'version' => $version,
    'region'  => $region,
    'endpoint' => $endpoint,
    'use_path_style_endpoint' => true,
    'credentials' => [
        'key'    => $key,
        'secret' => $secret
    ],
]);

function get_object_minio($s3, $files_bucket, $file_key) {
    $object = $s3->getObject([
        'Bucket' => $files_bucket,
        'Key'    => $file_key
    ]);

    $body = $object->get('Body');
    $contentType = $object->get('ContentType');

    header("Content-Type: $contentType");
    echo $body;
    exit;
}

if (isset($_GET['file_key'])) {
    get_object_minio($s3, $files_bucket, $_GET['file_key']);
}
?>
