<?php

session_start();

if(isset($_SESSION["signedin"]) && $_SESSION["signedin"] === true) {
	$_SESSION['language_code'] = 'en'; // Later on i should add get_default_language() here.
	header("location: tasks/home.php");
	exit;
}
else {
	$_SESSION['language_code'] = 'en';
	header("location: signin_system/signin.php");
	exit;
}
