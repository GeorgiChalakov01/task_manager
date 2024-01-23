<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

$edit=false;
$chosen_category='';
if(isset($_GET['id'])) {
    $edit=true;
	$chosen_category=get_category_info($con, $_GET['id'], $_SESSION['user-details']['id']);
}
?>

<!DOCTYPE html>
<html>
	<head>

		<title><?php if($edit)echo $phrases['category-edit-page-title'];else echo $phrases['category-create-page-title'];?></title>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/php/head.php';?>

	</head>
	<body class="cust-dark1">

		<?php require '../common/navbar/navbar.php';?>


		<br/>
		<div class="container p-0 bg-light d-flex justify-content-center rounded" style="height: 85vh;">
			<div class="col-12 col-lg-7 p-5" style="overflow: auto;">
				<h1 class="col-12 text-center">
					<?php echo $edit? $phrases['category-edit-title'] : $phrases['category-create-title'];?>
				</h1>
				<?php require '../common/statuserror/statuserror.php';?>
				<form action="<?php echo $edit?'category_edit.inc.php':'category_create.inc.php';?>" method="post" id="categoryForm" class="needs-validation" novalidate>
					<div class="form-group mb-3">
					<label for="categoryName"><?php echo $phrases['category-create-name-label'];?></label>
					<input 
						type="text" 
						id="categoryName" 
						name="name" class="form-control" 
						<?php 
						echo 'placeholder="' . $phrases['category-create-name-placeholder'] . '"';
						if($edit)
							echo 'value="' . $chosen_category['name'] . '"';
						?> 
							required
						>
						<div class="invalid-feedback"><?php echo $phrases['error-field-is-manditory'];?></div>
					</div>
					<div class="form-group mb-3">
						<label><?php echo $phrases['category-create-color-style-label'];?></label>
						<div id="color_styles" class="d-flex flex-wrap justify-content-center p-3" style="background-color: #e9ecef; border-radius: 5px;">
							<?php
							$color_schemes=get_color_schemes($con);
							foreach($color_schemes as $color_scheme) {
								echo '
								<div 
								    data-id="' . $color_scheme['id'] . '"
								    class="p-2 m-1 rounded d-flex align-items-center justify-content-center" 
								    style="
									width: 70px; 
									height: 70px; 
									word-wrap: break-word;
									color: ' . $color_scheme['text_color'] . '; 
									background-color: ' . $color_scheme['background_color'] . '; 
									border: 3px solid ' . $color_scheme['text_color'] . '; 
									cursor: pointer;"
								>' .
								    $color_scheme['name'] . '
								</div>';
							}
							?>
						</div>
						<input type="hidden" id="id" name="id" value="<?php echo $_GET['id'];?>" required>
						<input type="hidden" id="color_scheme_id" name="color_scheme_id" value="1" required>
					</div>
					<br/>
					<br/>
					<button type="submit" name="submit" class="col-12 btn btn-secondary"><?php echo $phrases['category-create-form-submit-button'];?></button>
				</form>
			</div>
			<div class="col-0 col-lg-5 bg-dark text-white p-4 d-none d-lg-block">
				<h2><?php echo $phrases['category-create-info-header'];?></h2>
				<p><?php echo $phrases['category-create-info-paragraph'];?></p>
			</div>
		</div>




		<script>
		// Get all color boxes
		var colorBoxes = document.querySelectorAll('#color_styles div');

		// Function to handle box click
		function handleBoxClick() {
		// If a box is already selected, revert its styling
		if (selectedBox) {
		    selectedBox.style.transform = 'scale(1)';
		    selectedBox.style.borderRadius = '5px';
		}

		// Style the clicked box and set it as the selected box
		this.style.transform = 'scale(0.7)';
		this.style.borderRadius = '50%';
		selectedBox = this;

		// Update the color_scheme_id input field with the data-id of the clicked box
		document.getElementById('color_scheme_id').value = this.getAttribute('data-id');
		}

		// Add click event listener to each box
			colorBoxes.forEach(function(box) {
			box.addEventListener('click', handleBoxClick);
		});

		// Select the default color box
		<?php
		$color_scheme_id=1;
		if(isset($_GET['id']))
			$color_scheme_id=get_category_info($con, $_GET['id'], $_SESSION['user-details']['id'])['color_scheme_id'];

		?>
		var selectedBox = document.querySelector('#color_styles div[data-id="<?php echo $color_scheme_id;?>"]');
		selectedBox.click();
		</script>

		<script src="/common/scripts/form_mandatory_fields.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

	</body>
</html>
