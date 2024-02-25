<?php
if(!isset($_POST["submit"])) {
	header('location: /index.php');
	exit;
}

require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$project_id=$_POST['project_id'];
$blocker=$_POST['blocker']=='on'?True:False;
$title=$_POST['title'];
$description=$_POST['description'];
$duration=$_POST['duration'];
$deadline=$_POST['deadline'];

$notes=array();
foreach($_POST as $key => $value) {
	if(strpos($key, 'note_') === 0) {
		$notes[] = substr($key, 5); 
	}   
}

$_SESSION['create-task-form'] = array(
		'title' => $title,
		'description' => $description,
		'deadline' => $deadline
		);

if($task_id = create_task($con, $project_id, $blocker, $title, $description, $duration, $deadline, $_SESSION['user-details']['id'])) {
	foreach($notes as $note_id)
		attach_note_to_task($con, $note_id, $task_id, $_SESSION['user-details']['id']);

	header("location: /tasks/project_view.php?id=$project_id&status=success-task-created");
	exit;
}
else {
	header("location: /tasks/project_view.php?id=$project_id&status=error-task-not-created");
	exit;
}
?>
