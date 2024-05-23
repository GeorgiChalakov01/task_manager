<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/common/db/dbh.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/common/php/functions.inc.php';


if(isset($_SESSION['user-details']['id']))
        $_SESSION['language_code'] = get_user_language($con, $_SESSION['user-details']['id']);
else
        $_SESSION['language_code'] = 'en';

$chosen_language_code=$_SESSION['language_code'];
$phrases=get_phrases($con, $chosen_language_code);
