<?php
if(isset($_SESSION["signedin"]) && $_SESSION["signedin"] === true) {
        header("location: tasks/home.php");
        exit;
}
