#!/bin/sh

echo "
<?php
\$version = 'latest';
\$region = 'us-east-1';
\$endpoint = 'http://${MINIO_IP}:9000';
\$key = '${MINIO_ROOT_USER}'; 
\$secret = '${MINIO_ROOT_PASSWORD}';
\$files_bucket = 'files';
" > /var/www/html/common/minio/credentials.php

