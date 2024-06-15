<?php
require_once "db.conf.php";

$con = mysqli_connect($db_ip, $db_user, $db_password, $db_database, $db_port);

if (mysqli_connect_errno()) {
	echo "Failed to connect to MariaDB: " . mysqli_connect_error();
	exit();
}
