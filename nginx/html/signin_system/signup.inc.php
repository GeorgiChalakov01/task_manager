<?php
if(!isset($_POST["submit"])) {
	header('location: /index.php');
	exit;
}

require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$password_repeat=$_POST['password_repeat'];
$profile_picture_path;
$timezone=$_POST['timezone'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

//Save the inputed data in the session
$_SESSION['signup-form'] = array(
	'first_name' => $first_name,
	'last_name' => $last_name,
	'username' => $username,
	'email' => $email
);


//Validate the input data
if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
	header('location: signup.php?error=error-forbiden-symbols-username');
	exit;
}
if(username_exists($con, $username) === true) {
	header('location: signup.php?error=error-username-taken');
	exit;
}
if(email_exists($con, $username) === true) {
	header('location: signup.php?error=error-email-taken');
	exit;
}
if(
	!preg_match('@[a-z]@', $password) ||
	!preg_match('@[A-Z]@', $password) ||
	!preg_match('@[0-9]@', $password) ||
	!preg_match('@[^\w]@', $password) ||
	strlen($password) < 8
) {
	header('location: signup.php?error=error-weak-password');
	exit;
}
if($password != $password_repeat) {
	header('location: signup.php?error=error-passwords-dont-match');
	exit;
}

/*
//Profile picture information
$profile_picture_path = save_file($_FILES['file'], __DIR__ . '/../common/uploaded_files/');
if ($_FILE['file'] and $profile_picture_path === false) {
	header('location: signup.php?error=error-file-upload');
	exit;
}
*/

if($user_id=signup_user($con, $first_name, $last_name, $username, $email, $hashed_password, $profile_picture_path, $timezone, $_SESSION['language_code'])) {
	$category_id = create_category($con, $user_id, 'default-category', '1');
	$project_id = create_project($con, 'default-project-title', 'default-project-description', NULL, $user_id);
	append_category($con, $category_id, $project_id, 'PROJECT', $user_id);

	header("location: signin.php?status=success-account-created");
	exit;
}
else {
	header("location: signup.php?error=error-signin-wrong-credentials");
	exit;
}
