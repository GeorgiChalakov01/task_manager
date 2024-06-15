<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$id =$_GET['id'];

if($category=delete_category($con, $id,  $_SESSION['user-details']['id'])) {
	header("location: /tasks/categories.php?status=success-category-deleted");
	exit;
}
else {
	header("location: category_edit.php?error=error-category-not-deleted");
	exit;
}
