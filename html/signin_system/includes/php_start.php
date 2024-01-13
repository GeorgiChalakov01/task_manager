<?php
session_start();

if(isset($_SESSION["signedin"]) && $_SESSION["signedin"] === true) {
    header("location: tasks/home.php");
    exit;
}

require_once '../db/dbh.inc.php';
require_once 'functions.inc.php';

$chosen_language_code=$_GET['language_code'];
$phrases=get_phrases($con, $chosen_language_code);
