<?php
if(!isset($_POST["submit"])) {
	header('location: /index.php');
	exit;
}

require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$id =$_POST['id'];
$name=$_POST['name'];
$color_scheme_id=$_POST['color_scheme_id'];


//Save the inputed data in the session
$_SESSION['edit-category-form'] = array(
	'name' => $name
);


if($category=edit_category($con, $id,  $_SESSION['user-details']['id'], $name, $color_scheme_id)) {
	header("location: /tasks/categories.php?status=success-category-edited");
	exit;
}
else {
	header("location: category_edit.php?error=error-category-not-edited");
	exit;
}
