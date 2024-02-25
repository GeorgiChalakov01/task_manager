<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$task_id = $_GET['id'];
$task = get_task_info($con, $task_id, $_SESSION['user-details']['id']);
$notes = [];
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo htmlspecialchars($task['title']); ?></title>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/php/head.php';?>
</head>
<body class="cust-dark1">

	<?php require '../common/navbar/navbar.php';?>
	<?php require '../common/php/hidden_menu.php';?>

	<div class="container mt-4">
	<?php require '../common/statuserror/statuserror.php';?>
		<div class="col-12 d-flex">
			<div class="bg-light p-2 mb-4 rounded flex-grow-1">
				<h2><?php echo htmlspecialchars($task['title']); ?></h2>
				<br>
				<p><strong><?php echo $phrases['task-view-description'];?>: </strong><br> <?php echo nl2br(htmlspecialchars($task['description'])); ?></p>
				<p><strong><?php echo $phrases['task-view-created-on'];?>: </strong><br> <?php echo htmlspecialchars($task['created_on']); ?></p>
				<?php if($task['deadline']): ?>
					<p><strong><?php echo $phrases['task-view-deadline'];?>: </strong><br> <?php echo htmlspecialchars($task['deadline']); ?></p>
				<?php endif; ?>
				<div>
					<button class="btn btn-secondary" onClick="window.location.href='task_edit.php?id=<?php echo $task_id;?>'"><?php echo $phrases['task-view-edit'];?></button>
					<button class="btn btn-secondary"><?php echo $phrases['task-view-mark-complete'];?></button>
					<?php if($task['ended_on']): ?>
						<p><strong><?php echo $phrases['task-view-completed-on'];?>: </strong><br> <?php echo htmlspecialchars($task['ended_on']); ?></p>
					<?php else: ?>
						<button class="btn btn-secondary"><?php echo $phrases['task-view-archive'];?></button>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="col-12 d-flex">
			<div class="bg-light p-2 mb-4 rounded flex-grow-1">
				<h2><?php echo $phrases['task-view-attached-notes'];?></h2>
				<div style="">
					<div class="row">
						<?php
						$notes=get_attached_notes_to_task($con, $task_id, $_SESSION['user-details']['id']);

						foreach($notes as $note) {
							if($note['description']) {
								$description = $note['description'];
						}
							else {
								$description = $phrases['text-no-description'];
						}

						$attached_files=get_attached_files_to_note($con, $note['id'], $_SESSION['user-details']['id']);

						echo '
						<div 
							class="col-lg-4 col-md-6 col-sm-12 mb-4" 
							style="cursor: pointer;" 
							onclick="show_menu(' . $note['id'] . ', \'attached_note_to_task\');"
						>
							<div class="card rounded" style="height: 400px;">
								<div class="card-body" style="background-color: #f7f7f7;">
									<h2 class="card-title" style="height: 80px; overflow: auto;">' . $note['title'] . '</h2>
								</div>
								<div class="card-body">
									<p class="card-text" style="height: 150px; overflow: scroll;">' . nl2br($description) . '</p>';

								echo    '<div style="height: 50px; width: 100%; overflow-x: auto; white-space: nowrap;
										<div style="width: 2000px; height: 50px;">';
										foreach($attached_files as $file){
											$source_image = '/common/images/file.png';
											if(in_array($file['extension'], ['jpg', 'jpeg', 'png', 'gif', 'ico', 'webp'])) {
												$source_image = '/common/uploaded_files/' . $file['server_name'] . '.' . $file['extension'];
											}
											echo '<img src="' . $source_image . '" style="cursor: pointer; width: 50px; height: 100%; object-fit: cover; border-radius: 10px;" alt="File image" onclick="show_menu(' . $file['id'] . ', \'file\');">&nbsp;';
										}
									echo   '</div>';
								echo   '</div>';
								echo   '<p class="card-text" style="height: 40px; overflow: scroll;">' . $note['created_on'] . '</p>
								</div>
							</div>';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>



	<script src="/common/scripts/form_mandatory_fields.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

