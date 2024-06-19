<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$object_id=$_GET['id'];
$object_type=strtoupper($_GET['type']);
$object_type_lower=strtolower($object_type);

// get the selected permissions from the post request like its done for the categories;
$view_privileges=array();
foreach($_POST as $key => $value) {
        if(strpos($key, 'user_checkbox_view_') === 0) {
                $view_privileges[] = substr($key, 19);
        }
}

$edit_privileges=array();
foreach($_POST as $key => $value) {
        if(strpos($key, 'user_checkbox_edit_') === 0) {
                $edit_privileges[] = substr($key, 19);
        }
}

// Delete the permissions besides the ones of the current user.
delete_object_privileges($con, $object_id, $object_type, $_SESSION['user-details']['id']);

// Grant the new set of permissions.
foreach($view_privileges as $grantee_id){
	grant_access($con, $grantee_id, $object_id, 'VIEW', $object_type, $_SESSION['user-details']['id']);
}

foreach($edit_privileges as $grantee_id){
	grant_access($con, $grantee_id, $object_id, 'EDIT', $object_type, $_SESSION['user-details']['id']);
}

header('location: /tasks/' . $object_type_lower . 's.php');
exit;
