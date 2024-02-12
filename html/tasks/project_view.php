<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$project_id = $_GET['id'];
$project = get_project_info($con, $project_id, $_SESSION['user-details']['id']);
$tasks = [];
$notes = [];
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo htmlspecialchars($project['title']); ?></title>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/php/head.php';?>
</head>
<body class="cust-dark1">

	<?php require '../common/navbar/navbar.php';?>


	<div class="container mt-4">
	    <div class="row">
		<div class="col-md-7 d-flex">
		    <div class="bg-light p-2 mb-4 rounded flex-grow-1">
			<h2>Project Details</h2>
			<p><strong>Title:</strong> <?php echo htmlspecialchars($project['title']); ?></p>
			<p><strong>Description:</strong> <?php echo htmlspecialchars($project['description']); ?></p>
			<p><strong>Created on:</strong> <?php echo htmlspecialchars($project['created_on']); ?></p>
			<?php if($project['deadline']): ?>
			    <p><strong>Deadline:</strong> <?php echo htmlspecialchars($project['deadline']); ?></p>
			<?php endif; ?>
			<?php if($project['ended_on']): ?>
			    <p><strong>Completed on:</strong> <?php echo htmlspecialchars($project['ended_on']); ?></p>
			<?php else: ?>
			    <button class="btn btn-secondary" onClick="window.location.href='project_edit.php?id=<?php echo $project_id;?>'">Edit</button>
			    <button class="btn btn-secondary">Archive</button>
			    <button class="btn btn-secondary">Mark as Complete</button>
			<?php endif; ?>
		    </div>
		</div>
		<div class="col-md-5 d-flex">
		    <div class="bg-light p-2 mb-4 rounded flex-grow-1">
			<h2>Attached Notes</h2>
			<!-- Add notes content here or leave empty if no notes -->
		    </div>
		</div>
	    </div>

	    <div class="row">
		<div class="col-12">
		    <div class="bg-light p-2 rounded">
			<h2>Tasks</h2>
			<a href="task_edit.php?project_id=<?php echo $project_id; ?>" class="btn btn-secondary mb-3">Add New Task</a>
			<div class="list-group">
			    <?php foreach($tasks as $task): ?>
				<a href="#" class="list-group-item list-group-item-action">
				    <div class="d-flex w-100 justify-content-between">
					<h5 class="mb-1"><?php echo htmlspecialchars($task['title']); ?></h5>
					<small>Due: <?php echo htmlspecialchars($task['due_date']); ?></small>
				    </div>
				    <p class="mb-1"><?php echo htmlspecialchars($task['description']); ?></p>
				    <!-- Add your task options (view, edit, delete) here -->
				</a>
			    <?php endforeach; ?>
			</div>
		    </div>
		</div>
	    </div>
	</div>



	<script src="/common/scripts/form_mandatory_fields.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

