<?php
if(!isset($_POST["submit"])) {
    header('location: /index.php');
    exit;
}

require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$title = $_POST['title'];
$description = $_POST['description'];
$deadline = $_POST['deadline'];

$categories = array();
foreach($_POST as $key => $value) {
    if(strpos($key, 'category_') === 0) {
        $categories[] = substr($key, 9);
    }
}

$_SESSION['create-project-form'] = array(
    'title' => $title,
    'description' => $description,
    'deadline' => $deadline,
    'categories' => $categories
);

if($project_id = create_project($con, $title, $description, $deadline, $_SESSION['user-details']['id'])) {
    foreach($categories as $category_id) {
        append_category($con, $category_id, $project_id, 'PROJECT', $_SESSION['user-details']['id']);
    }
    header("location: /tasks/projects.php?status=success-project-created");
    exit;
}
else {
    header("location: project_edit.php?error=error-project-not-created");
    exit;
}
?>

