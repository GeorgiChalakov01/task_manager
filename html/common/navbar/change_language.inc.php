<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';

// Sanitize the language_code parameter
$language_code = filter_input(INPUT_GET, 'language_code', FILTER_SANITIZE_STRING);

set_user_language($con, $_SESSION['user-details']['id'], $language_code);

$_SESSION['language_code'] = $language_code;

// Sanitize the return URL
$return_url = filter_input(INPUT_GET, 'return', FILTER_SANITIZE_URL);

header('Location: ' . urldecode($return_url));
exit;
