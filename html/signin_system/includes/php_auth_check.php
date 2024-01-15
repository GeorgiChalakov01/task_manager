<?php
if(isset($_SESSION['user-details'])) {
	header("location: /tasks/home.php");
	exit;
}
