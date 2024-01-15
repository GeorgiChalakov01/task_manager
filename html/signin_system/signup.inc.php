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

//Profile picture information
$file = $_FILES['file'];
$file_info = pathinfo($_FILES['file']['name']);
$file_name = $file_info['filename'];
$file_extension = $file_info['extension'];

//Get the target destination for the profile picture.
$file_destination;
$file_tmp_name = $_FILES['file']['tmp_name'];
if($file_name) {
    $files_in_directory = glob('../common/uploaded_files/*.*');
    $file_numbers = array_map(
        function($file) {
            return intval(pathinfo($file, PATHINFO_FILENAME));
        },
        $files_in_directory
    );
    $next_file_number = empty($file_numbers) ? 1 : max($file_numbers) + 1;

    $file_destination = '../common/uploaded_files/' . $next_file_number . '.' . $file_extension;
    $profile_picture_path = '/common/uploaded_files/' . $next_file_number . '.' . $file_extension;
}

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


if(signup_user($con, $first_name, $last_name, $username, $email, $hashed_password, $profile_picture_path)) {
    move_uploaded_file($file_tmp_name, $file_destination);
	header("location: signin.php?status=success-account-created");
	exit;
}
else {
	header("location: signup.php?error=error-signin-wrong-credentials");
	exit;
}
