<?php
require 'includes/php_start.php';
require 'includes/php_auth_check.php';

$email=$_POST['email'];
$password=$_POST['password'];

signin_user($con, $email, $password)? header("location: home.php") : header("location: signin.php?error=error-signin-wrong-credentials");
