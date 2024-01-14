<?php
session_start();

require_once '../common/db/dbh.inc.php';
require_once 'functions.inc.php';

$chosen_language_code=$_SESSION['language_code'];
$phrases=get_phrases($con, $chosen_language_code);
