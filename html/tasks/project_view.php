<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$project_id = $_GET['id'];
$project = get_project_info($con, $project_id, $_SESSION['user-details']['id']);
$tasks = get_project_tasks($con, $project_id, $_SESSION['user-details']['id']);
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
	<?php require '../common/statuserror/statuserror.php';?>
		<div class="row">
			<div class="col-md-7 d-flex">
				<div class="bg-light p-2 mb-4 rounded flex-grow-1 d-flex flex-column">
					<h2><?php echo htmlspecialchars($project['title']=='default-project-title'?$phrases[$project['title']]:$project['title']); ?></h2>
					<br>
					<p><strong><?php echo $phrases['project-view-description'];?>: </strong><br> <?php echo nl2br(htmlspecialchars($project['description']=='default-project-description'?$phrases[$project['description']]:$project['description'])); ?></p>
					<?php if($project['title']!='default-project-title'): ?>
						<p><strong><?php echo $phrases['project-view-created-on'];?>: </strong><br> <?php echo htmlspecialchars($project['created_on']); ?></p>
						<?php if($project['deadline']): ?>
							<p><strong><?php echo $phrases['project-view-deadline'];?>: </strong><br> <?php echo htmlspecialchars($project['deadline']); ?></p>
						<?php endif; ?>
						<div class="child mt-auto">
							<button class="btn btn-secondary" onClick="window.location.href='project_edit.php?id=<?php echo $project_id;?>'"><?php echo $phrases['project-view-edit'];?></button>
							<button class="btn btn-secondary"><?php echo $phrases['project-view-mark-complete'];?></button>
							<?php if($project['ended_on']): ?>
								<p><strong><?php echo $phrases['project-view-completed-on'];?>: </strong><br> <?php echo htmlspecialchars($project['ended_on']); ?></p>
							<?php else: ?>
								<button class="btn btn-secondary"><?php echo $phrases['project-view-archive'];?></button>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-md-5 d-flex">
				<div class="bg-light p-2 mb-4 rounded flex-grow-1">
					<h2><?php echo $phrases['project-view-attached-notes'];?></h2>
					<div style="min-height: 100px; max-height: 400px; border: 1px solid grey; border-radius: 10px; overflow-x: hidden; overflow-y: scroll;">
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
							class="mb-4 p-4 pb-0" 
							style="cursor: pointer; width: 100%;" 
							onclick="show_menu(' . $note['id'] . ', \'attached_note_to_project\');"
						>
							<div class="card" style="height: 400px; border: 1px solid black; border-radius: 10px;">
									<div class="card-body" style="background-color: #f7f7f7; border-radius: 10px;">
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
					<br>
					<button class="btn btn-secondary"><?php echo $phrases['project-view-attach-note'];?></button>
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
							<div class="row m-2 p-1" style="border: 1px solid grey; border-radius: 10px; cursor: pointer; background-color: #6c757d; color: white; border: 1px solid black;" onclick="show_menu(<?php echo $task['id']; ?>, 'task');">
								<h5 class="mb-1"><?php echo htmlspecialchars($task['title']); ?></h5>
								<p class="mb-1"><?php echo htmlspecialchars($task['description']); ?></p>
								<small><?php echo $phrases['project-view-deadline'];?>: <?php echo substr(htmlspecialchars($task['deadline']), 0, -3); ?></small>
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

