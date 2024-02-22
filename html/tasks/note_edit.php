<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$edit=false;
$chosen_note='';
$note_categories=array();
if(isset($_GET['id'])) {
	$edit=true;
	$chosen_note=get_note_info($con, $_GET['id'], $_SESSION['user-details']['id']);
	$note_categories=get_note_categories($con, $_GET['id'], $_SESSION['user-details']['id']);
}
?>

<!DOCTYPE html>
<html>
	<head>

		<title><?php if($edit)echo $phrases['note-edit-page-title']; else echo $phrases['note-create-page-title'];?></title>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/php/head.php';?>

	</head>
	<body class="cust-dark1">

		<?php require '../common/navbar/navbar.php';?>


		<br/>
		<div class="container p-0 bg-light d-flex justify-content-center rounded" style="height: 85vh;">
			<div class="col-12 col-lg-7 p-5" style="overflow: auto;">
				<h1 class="col-12 text-center">
					<?php echo $edit? $phrases['note-edit-title'] : $phrases['note-create-title'];?>
				</h1>
				<?php require '../common/statuserror/statuserror.php';?>
				<form action="<?php echo $edit?'note_edit.inc.php':'note_create.inc.php';?>" method="post" enctype="multipart/form-data" id="fileForm" class="needs-validation" novalidate>
					<div class="form-group mb-3">
						<label for="name"><?php echo $phrases['note-edit-title-label'];?></label>
						<input 
							type="text" 
							id="name" 
							name="title" class="form-control" 
							required
							<?php 
							echo 'placeholder="' . $phrases['note-edit-title-placeholder'] . '"';
							if($edit)
								echo 'value="' . $chosen_note['title'] . '"';
							?> 
						>
						<div class="invalid-feedback"><?php echo $phrases['error-field-is-manditory'];?></div>
					</div>

					<div class="form-group mb-3">
						<label for="description"><?php echo $phrases['note-edit-description-label'];?></label>
						<textarea 
							id="description" 
							name="description" 
							class="form-control" 
							style="min-height: 100px; width: 100%; resize: none;" 
							<?php 
							echo 'placeholder="' . $phrases['note-edit-description-placeholder'] . '"';
						?> 
						><?php if($edit) echo $chosen_note['description'];?></textarea>
						<div class="invalid-feedback"><?php echo $phrases['error-field-is-manditory'];?></div>
					</div>
					<div class="form-group mb-3">
						<label for="categories"><?php echo $phrases['categories-label'];?></label>
						<div id="categories" style="height: 200px; overflow-y: scroll; border: 1px solid #ccc; padding: 10px; border-radius: 10px; background-color: #f8f9fa;">
							<?php
							$categories = get_categories($con, $_SESSION['user-details']['id']);
							$default_id=get_default_category_id($con, $_SESSION['user-details']['id']);

							if(!$edit)
								$first = true;

							foreach($categories as $category) {
								$name=$category['name'];
								$checked='';
								if($category['id'] == $default_id)
									$name=$phrases['default-category-name'];

								if(in_array($category['id'], $note_categories))
									$checked='checked';
								
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
										class="form-check-input"
										type="checkbox" 
										id="category_' . $category['id'] . '" 
										name="category_' . $category['id'] . '" 
										style="width: 20px; height: 20px; margin-right: 10px;" 
										'.($first ? "checked" : "") . ' ' .
										$checked . '
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
						<label for="files"><?php echo $phrases['note-edit-files-label'];?></label>
						<div id="files" style="height: 200px; overflow-y: scroll; border: 1px solid #ccc; padding: 10px; border-radius: 10px; background-color: #f8f9fa;">
							<?php
							$files = get_files($con, $_SESSION['user-details']['id']);
							$attached_file_ids = array_column(get_attached_files_to_note($con, $_GET['id'], $_SESSION['user-details']['id']), 'id');


							foreach($files as $file) {
								$checked='';
								if(in_array($file['id'], $attached_file_ids))
									$checked='checked';
								$description=$file['description'] ? $file['description'] : $phrases['text-no-description'];
								echo '
								<div style="display: flex; align-items: center; margin-bottom: 10px; ' . $file['background_color'] . '; padding: 10px; border-radius: 10px;">
									<input 
										type="checkbox" 
										id="file_' . $file['id'] . '"  
										name="file_' . $file['id'] . '"  ' . 
										$checked . '
										style="width: 20px; height: 20px; margin-right: 10px;" 
									>
									<label for="file_' . $file['id'] . '" style="color: ' . $file['text_color'] . '">' . 
										$file['title']. ': ' . $description . '
									</label>
								</div>';
							}   
							?>  
						</div>
					</div>

					<div class="form-group mb-3">
						<input type="hidden" id="id" name="id" value="<?php echo $_GET['id'];?>" required>
					</div>
					<br/>
					<br/>
					<button type="submit" name="submit" class="col-12 btn btn-secondary"><?php echo $phrases['note-edit-form-submit-button'];?></button>
				</form>
			</div>
			<div class="col-0 col-lg-5 bg-dark text-white p-4 d-none d-lg-block">
				<h2><?php echo $phrases['note-edit-info-header'];?></h2>
				<p><?php echo $phrases['note-edit-info-paragraph'];?></p>
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
