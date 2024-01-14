<?php
session_start();
foreach($_SESSION['user-details'] as $key => $value) {
	echo $key . '=>' . $value . ', ';
}
