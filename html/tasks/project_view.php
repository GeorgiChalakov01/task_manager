<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$project_id = $_GET['id'];
$project = get_project_info($con, $project_id, $_SESSION['user-details']['id']);
$tasks = get_project_tasks($con, $project_id, $_SESSION['user-details']['id']);
;
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
	<?php require '../common/php/hidden_menu.php';?>

	<div class="container mt-4">
		<div class="row">
			<div class="col-md-7 d-flex">
				<div class="bg-light p-2 mb-4 rounded flex-grow-1">
					<h2><?php echo htmlspecialchars($project['title']); ?></h2>
					<br>
					<p><strong><?php echo $phrases['project-view-description'];?>: </strong><br> <?php echo nl2br(htmlspecialchars($project['description'])); ?></p>
					<p><strong><?php echo $phrases['project-view-created-on'];?>: </strong><br> <?php echo htmlspecialchars($project['created_on']); ?></p>
					<?php if($project['deadline']): ?>
						<p><strong><?php echo $phrases['project-view-deadline'];?>: </strong><br> <?php echo htmlspecialchars($project['deadline']); ?></p>
					<?php endif; ?>
					<div>
						<button class="btn btn-secondary" onClick="window.location.href='project_edit.php?id=<?php echo $project_id;?>'"><?php echo $phrases['project-view-edit'];?></button>
						<button class="btn btn-secondary"><?php echo $phrases['project-view-archive'];?></button>
						<?php if($project['ended_on']): ?>
							<p><strong><?php echo $phrases['project-view-completed-on'];?>: </strong><br> <?php echo htmlspecialchars($project['ended_on']); ?></p>
						<?php else: ?>
							<button class="btn btn-secondary"><?php echo $phrases['project-view-archive'];?></button>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-md-5 d-flex">
				<div class="bg-light p-2 mb-4 rounded flex-grow-1">
					<h2><?php echo $phrases['project-view-attached-notes'];?></h2>
					<div style="height: 400px; overflow-x: hidden; overflow-y: scroll;">
					<?php
						$notes=get_attached_notes_to_project($con, $project_id, $_SESSION['user-details']['id']);

						foreach($notes as $note) {
							if($note['description']) {
								$description = $note['description'];
							}
							else {
								$description = $phrases['text-no-description'];
						}

						$attached_files=get_attached_files_to_note($con, $note['id'], $_SESSION['user-details']['id']);

						echo '
						<div class="row">
						<div 
							class="mb-4" 
							style="cursor: pointer; width: 100%;" 
							onclick="show_menu(' . $note['id'] . ', \'attached_note\');"
						>
							<div class="card rounded" style="height: 400px;">
									<div class="card-body" style="background-color: #f7f7f7;">
										<h2 class="card-title" style="height: 80px; overflow: auto;">' . $note['title'] . '</h2>
									</div>
									<div class="card-body">
										<p class="card-text" style="height: 150px; overflow: scroll;">' . nl2br($description) . '</p>
										<div style="height: 50px; width: 100%; overflow-x: auto; white-space: nowrap;
											<div style="width: 2000px; height: 50px;">';
						foreach($attached_files as $file){
							$source_image = '/common/images/file.png';
							if(in_array($file['extension'], ['jpg', 'jpeg', 'png', 'gif', 'ico', 'webp'])) {
								$source_image = '/common/uploaded_files/' . $file['server_name'] . '.' . $file['extension'];
							}
							echo '<img src="' . $source_image . '" style="cursor: pointer; width: 50px; height: 100%; object-fit: cover; border-radius: 10px;" alt="File image" onclick="show_menu(' . $file['id'] . ', \'file\');">&nbsp;';
						}
						echo   '</div>
						</div>
						<p class="card-text" style="height: 40px; overflow: scroll;">' . $note['created_on'] . '</p>
							</div>
						</div>
						</div>';
						}
					?>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="bg-light p-2 rounded">
					<h2><?php echo $phrases['project-view-tasks-header'];?></h2>
					<a href="task_edit.php?project_id=<?php echo $project_id; ?>" class="btn btn-secondary mb-3"><?php echo $phrases['project-view-add-task'];?></a>
					<div class="container" style="min-height: 100px; border: 1px solid grey; border-radius: 10px;">
						<?php foreach($tasks as $task): ?>
							<div class="row m-2 p-1" style="border: 1px solid grey; border-radius: 10px;">
								<a href="#" class="list-group-item list-group-item-action">
									<div class="d-flex w-100 justify-content-between">
										<h5 class="mb-1"><?php echo htmlspecialchars($task['title']); ?></h5>
										<small>Due: <?php echo htmlspecialchars($task['due_date']); ?></small>
									</div>
									<p class="mb-1"><?php echo htmlspecialchars($task['description']); ?></p>
								</a>
							</div>
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

