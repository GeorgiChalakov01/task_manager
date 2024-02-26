<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$edit = false;
$chosen_task = '';
if (isset($_GET['id'])) {
	$edit = true;
	$chosen_task = get_task_info($con, $_GET['id'], $_SESSION['user-details']['id']);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php if($edit) echo $phrases['task-edit-page-title']; else echo $phrases['task-create-page-title'];?></title>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/php/head.php';?>
</head>
<body class="cust-dark1">

	<?php require '../common/navbar/navbar.php';?>

	<br/>
	<div class="container p-0 bg-light d-flex justify-content-center rounded" style="height: 85vh;">
		<div class="col-12 col-lg-7 p-5" style="overflow: auto;">
			<h1 class="col-12 text-center">
				<?php echo $edit ? $phrases['task-edit-title'] : $phrases['task-create-title'];?>
			</h1>
			<?php require '../common/statuserror/statuserror.php';?>
			<form action="<?php echo $edit ? 'task_edit.inc.php' : 'task_create.inc.php'; ?>" method="post" id="taskForm" class="needs-validation" novalidate>
				<div class="form-group mb-3">
					<label for="title"><?php echo $phrases['task-edit-title-label'];?></label>
					<input 
						type="text" 
						id="title" 
						name="title" 
						class="form-control" 
						required
						placeholder="<?php echo $phrases['task-edit-title-placeholder']; ?>" 
						value="<?php if($edit) echo $chosen_task['title']; ?>"
					>
					<div class="invalid-feedback"><?php echo $phrases['error-field-is-manditory'];?></div>
				</div>

				<div class="form-group mb-3">
					<label for="description"><?php echo $phrases['task-edit-description-label'];?></label>
					<textarea 
						id="description" 
						name="description" 
						class="form-control" 
						style="min-height: 100px; width: 100%; resize: none;" 
						placeholder="<?php echo $phrases['task-edit-description-placeholder']; ?>"
					><?php if($edit) echo $chosen_task['description'];?></textarea>
					<div class="invalid-feedback"><?php echo $phrases['error-field-is-manditory'];?></div>
				</div>

				<div class="form-group mb-3">
					<input type="checkbox" name="blocker" id="blocker" class="form-check-input" <?php if($edit and $chosen_task['blocker']) echo ' checked';?>/>
					<label for="blocker"><?php echo $phrases['task-edit-blocker-label'];?></label>
				</div>

				<div class="form-group mb-3">
					<label for="duration"><?php echo $phrases['task-edit-duration-label'];?><?php echo $phrases['task-edit-duration'];?></label>
					<input type="number" id="duration" name="duration" value="<?php if($edit) echo $chosen_task['duration']; else echo '15';?>" min="0" class="form-control form-icon-trailing"/>
				</div>

				<div class="form-group mb-3">
					<label for="deadline"><?php echo $phrases['task-edit-deadline-label'];?></label>
					<input 
						type="date" 
						id="deadline" 
						name="deadline" 
						class="form-control"
						value="<?php if($edit and $chosen_task['deadline']) echo date('Y-m-d', strtotime($chosen_task['deadline'])); ?>"
					>
				</div>

				<div class="form-group mb-3">
					<label><?php echo $phrases['task-edit-attached-notes'];?></label>
					<div id="notes" style="height: 200px; overflow-y: scroll; border: 1px solid #ccc; padding: 10px; border-radius: 10px; background-color: #f8f9fa;">
						<?php
						$notes = get_notes($con, $_SESSION['user-details']['id']);
						$attached_note_ids = array_column(get_attached_notes_to_task($con, $_GET['id'], $_SESSION['user-details']['id']), 'id');


						foreach($notes as $note) {
							$checked='';
							if(in_array($note['id'], $attached_note_ids))
								$checked='checked';
							$description=$note['description'] ? $note['description'] : $phrases['text-no-description'];
							echo '
							<div style="display: flex; align-items: center; margin-bottom: 10px; ' . $note['background_color'] . '; padding: 10px; border-radius: 10px;">
								<input 
								class="form-check-input"
									type="checkbox" 
									id="note_' . $note['id'] . '"  
									name="note_' . $note['id'] . '"  ' . 
									$checked . ' 
									style="width: 20px; height: 20px; margin-right: 10px;" 
								>
								<label for="note_' . $note['id'] . '" style="color: ' . $note['text_color'] . '">' . 
									$note['title']. ': ' . $description . ' 
								</label>
							</div>';
						}
						?>
					</div>
				</div>

				<div class="form-group mb-3">
					<input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>" required>
					<input type="hidden" id="project_id" name="project_id" value="<?php echo $_GET['project_id']; ?>" required>
				</div>

				<br/>
				<button type="submit" name="submit" class="col-12 btn btn-secondary"><?php echo $phrases['task-edit-form-submit-button'];?></button>
			</form>
		</div>
		<div class="col-0 col-lg-5 bg-dark text-white p-4 d-none d-lg-block">
			<h2><?php echo $phrases['task-edit-info-header'];?></h2>
			<p><?php echo $phrases['task-edit-info-paragraph'];?></p>
		</div>
	</div>

	<script src="/common/scripts/form_mandatory_fields.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
