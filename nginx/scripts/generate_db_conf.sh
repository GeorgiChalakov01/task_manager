#!/bin/sh

echo "<?php
\$db_ip='task_manager_mariadb';
\$db_user='${MYSQL_USER}';
\$db_password='${MYSQL_PASSWORD}';
\$db_database='${MYSQL_DATABASE}';
\$db_port=3306;
" > /var/www/html/common/db/db.conf.php

