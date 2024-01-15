<?php
if(!isset($_POST["submit"])) {
	header('location: /index.php');
	exit;
}

require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$email=$_POST['email'];
$password=$_POST['password'];

//Save the inputed data in the session
$_SESSION['signin-form'] = array(
	'email' => $email
);


if($user_id=signin_user($con, $email, $password)) {
	$user_details = get_user_details($con, $user_id);
	$_SESSION['user-details'] = array(
		'id' => $user_details['id'],
		'first_name' => $user_details['first_name'],
		'last_name' => $user_details['last_name'],
		'username' => $user_details['username'],
		'email' => $user_details['email'],
		'profile_picture_path' => $user_details['profile_picture_path'],
	);
	header("location: /tasks/home.php");
	exit;
}
else {
	header("location: signin.php?error=error-signin-wrong-credentials");
	exit;
}
