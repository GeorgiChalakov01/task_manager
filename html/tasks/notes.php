<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';
?>

<!DOCTYPE html>
<html>
<head>

	<title><?php echo $phrases['notes-page-title'];?></title>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/php/head.php';?>

</head>
<body class="cust-dark1">

	<?php require '../common/navbar/navbar.php';?>
	<?php require '../common/php/hidden_menu.php';?>


	<br/>
	<div class="container">
		<?php require '../common/statuserror/statuserror.php';?>
		<div class="d-flex justify-content-center">
			<div class="row col-12 d-flex justify-content-between rounded" style="padding: 10px; background-color: #333333">
				<div class="dropdown col-3">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
					<?php 
					$categories=get_categories($con, $_SESSION['user-details']['id']);
					$default_id=get_default_category_id($con, $_SESSION['user-details']['id']);
					foreach($categories as &$category) {
						if($category['id'] == $default_id)
							$category['name'] = $phrases['default-category-name'];
					}
					unset($category); // Unset reference to last element


					if(isset($_GET['category_id'])) {
						$category_name=get_category_info($con, $_GET['category_id'], $_SESSION['user-details']['id'])['name'];
						if ($category_name == 'default-category') 
							$category_name = $phrases['default-category-name'];
						
						echo $category_name;
					}
					else {
						echo $phrases['dropdown-filter-categories'];
					}
					?>
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
					<?php
					echo "
					<li><a class='dropdown-item' href='notes.php'>{$phrases['dropdown-all-categories']}</a></li>";
					foreach($categories as $category) {
						echo "
						<li><a class='dropdown-item' href='notes.php?category_id={$category['id']}'>{$category['name']}</a></li>
						";
					}
					?>
					</ul>
				</div>
				<button 
					type="button" 
					class="btn btn-secondary col-3"
					onclick="window.location.href = 'note_edit.php';"
				>
					<?php echo $phrases['notes-create-button']?>
				</button>
			</div>
		</div>
		<div class="row">
			<?php
			if(isset($_GET['category_id']))
				$notes=get_notes_from_category($con, $_SESSION['user-details']['id'], $_GET['category_id']);
			else
				$notes=get_notes($con, $_SESSION['user-details']['id']);

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
				onclick="show_menu(' . $note['id'] . ', \'note\');"
			>
				<div class="card rounded" style="height: 400px;">
					<div class="card-body" style="background-color: #f7f7f7;">
						<h2 class="card-title" style="height: 80px; overflow: auto;">' . $note['title'] . '</h2>
					</div>
					<div class="card-body">
						<p class="card-text" style="height: 150px; overflow: scroll;">' . nl2br($description) . '</p>';

					echo	'<div style="height: 50px; width: 100%; overflow-x: auto; white-space: nowrap;
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
				</div>
			</div>';

			}
			?>
		</div>
	</div>

	<script src="/common/scripts/form_mandatory_fields.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
