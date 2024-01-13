<?php

session_start();

if(isset($_SESSION["signedin"]) && $_SESSION["signedin"] === true) {
	header("location: tasks/home.php?language_code=en");
	exit;
}
else {
	header("location: signin_system/signin.php?language_code=en");
	exit;
}
