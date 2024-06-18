<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/common/db/dbh.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/common/php/functions.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/common/minio/minio.inc.php';


if(isset($_SESSION['user-details']['id'])) {
        $_SESSION['language_code'] = get_user_language($con, $_SESSION['user-details']['id']);
	date_default_timezone_set(get_user_timezone($con, $_SESSION['user-details']['id']));
}
else if(!isset($_SESSION['language_code'])) {
        $_SESSION['language_code'] = 'en';
}

$chosen_language_code=$_SESSION['language_code'];
$phrases=get_phrases($con, $chosen_language_code);
