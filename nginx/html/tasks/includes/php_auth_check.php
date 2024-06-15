<?php
if(!isset($_SESSION['user-details'])) {
	header("location: /index.php");
	exit;
}
