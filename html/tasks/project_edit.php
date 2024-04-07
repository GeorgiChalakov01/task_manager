<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$edit = false;
$chosen_project = '';
$project_categories = array();
if (isset($_GET['id'])) {
	$edit = true;
	$chosen_project = get_project_info($con, $_GET['id'], $_SESSION['user-details']['id']);
	$project_categories = get_project_categories($con, $_GET['id'], $_SESSION['user-details']['id']);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php if($edit) echo $phrases['project-edit-page-title']; else echo $phrases['project-create-page-title'];?></title>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/php/head.php';?>
</head>
<body class="cust-dark1">

	<?php require '../common/navbar/navbar.php';?>

	<br/>
	<div class="container p-0 bg-light d-flex justify-content-center rounded" style="height: 85vh;">
		<div class="col-12 col-lg-7 p-5" style="overflow: auto;">
			<h1 class="col-12 text-center">
				<?php echo $edit ? $phrases['project-edit-title'] : $phrases['project-create-title'];?>
			</h1>
			<?php require '../common/statuserror/statuserror.php';?>
			<form action="<?php echo $edit ? 'project_edit.inc.php' : 'project_create.inc.php'; ?>" method="post" id="projectForm" class="needs-validation" novalidate>
				<div class="form-group mb-3">
					<label for="title"><?php echo $phrases['project-edit-title-label'];?></label>
					<input 
						type="text" 
						id="title" 
						name="title" 
						class="form-control" 
						required
						placeholder="<?php echo $phrases['project-edit-title-placeholder']; ?>" 
						value="<?php if($edit) echo $chosen_project['title']; ?>"
					>
					<div class="invalid-feedback"><?php echo $phrases['error-field-is-manditory'];?></div>
				</div>

				<div class="form-group mb-3">
					<label for="description"><?php echo $phrases['project-edit-description-label'];?></label>
					<textarea 
						id="description" 
						name="description" 
						class="form-control" 
						style="min-height: 100px; width: 100%; resize: none;" 
						placeholder="<?php echo $phrases['project-edit-description-placeholder']; ?>"
					><?php if($edit) echo $chosen_project['description'];?></textarea>
					<div class="invalid-feedback"><?php echo $phrases['error-field-is-manditory'];?></div>
				</div>

				<div class="form-group mb-3">
					<label for="deadline"><?php echo $phrases['project-edit-deadline-label'];?></label>
					<input 
						type="date" 
						id="deadline" 
						name="deadline" 
						class="form-control"
						value="<?php if($edit and $chosen_project['deadline']) echo date('Y-m-d', strtotime($chosen_project['deadline'])); ?>"
					>
				</div>

				<div class="form-group mb-3">
					<label for="categories"><?php echo $phrases['categories-label'];?></label>
					<div id="categories" style="height: 200px; overflow-y: scroll; border: 1px solid #ccc; padding: 10px; border-radius: 10px; background-color: #f8f9fa;">
						<?php
						$categories = get_categories($con, $_SESSION['user-details']['id']);
						$default_id = get_default_category_id($con, $_SESSION['user-details']['id']);

						if($edit)
							$first = false;
						else
							$first = true;

						foreach($categories as $category) {
							$name = $category['name'];
							$checked = '';
							if($category['id'] == $default_id)
								$name = $phrases['default-category-name'];

							if($edit && in_array($category['id'], $project_categories))
								$checked = 'checked';

							echo '
							<div 
								style="
									display: flex; 
									align-items: center; 
									margin-bottom: 10px; 
									background-color: ' . $category['background_color'] . ';  
									color: ' . $category['text_color'] . ';  
									padding: 10px; 
									border-radius: 10px;"
							>
								<input 
									type="checkbox" 
									id="category_' . $category['id'] . '"  
									name="category_' . $category['id'] . '"  
									style="width: 20px; height: 20px; margin-right: 10px;" 
									' . ($first ? "checked" : "") . ' ' . $checked . ' 
								>
								<label for="category_' . $category['id'] . '"> 
									' . $name . ' 
								</label>
							</div>';
							$first = false;
						}
						?>
					</div>
				</div>

				<div class="form-group mb-3">
					<label for="notes"><?php echo $phrases['project-edit-attached-notes'];?></label>
					<div id="notes" style="height: 200px; overflow-y: scroll; border: 1px solid #ccc; padding: 10px; border-radius: 10px; background-color: #f8f9fa;">
						<?php
						$notes = get_notes($con, $_SESSION['user-details']['id']);
						$attached_note_ids = array_column(get_attached_notes_to_project($con, $_GET['id'], $_SESSION['user-details']['id']), 'id');


						foreach($notes as $note) {
							$checked='';
							if(in_array($note['id'], $attached_note_ids))
								$checked='checked';
							$description=$note['description'] ? $note['description'] : $phrases['text-no-description'];
							echo '
							<div style="display: flex; align-items: center; margin-bottom: 10px; ' . $note['background_color'] . '; padding: 10px; border-radius: 10px;">
								<input 
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
				</div>

				<br/>
				<button type="submit" name="submit" class="col-12 btn btn-secondary"><?php echo $phrases['project-edit-form-submit-button'];?></button>
			</form>
		</div>
		<div class="col-0 col-lg-5 bg-dark text-white p-4 d-none d-lg-block">
			<h2><?php echo $phrases['project-edit-info-header'];?></h2>
			<p><?php echo $phrases['project-edit-info-paragraph'];?></p>
		</div>
	</div>

	<script>
		var checkboxes = document.querySelector('#categories').querySelectorAll('input[type="checkbox"]');
		checkboxes.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
				var checked = Array.prototype.slice.call(checkboxes).some(x => x.checked);
				if (!checked) {
					checkboxes[0].checked = true;
				}
			});
		});
	</script>
	<script src="/common/scripts/form_mandatory_fields.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
