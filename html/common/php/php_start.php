<?php
session_start();
if(isset($_SESSION['language_code']) == false)
	$_SESSION['language_code'] = 'en';

require_once '../common/db/dbh.inc.php';
require_once '../common/php/functions.inc.php';

$chosen_language_code=$_SESSION['language_code'];
$phrases=get_phrases($con, $chosen_language_code);
