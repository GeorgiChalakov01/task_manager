<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$object_id=$_GET['object_id'];
$object_type=strtoupper($_GET['object_type']);

echo json_encode(get_object_privileges ($con, $object_type, $object_id, $_SESSION['user-details']['id']));
exit;
