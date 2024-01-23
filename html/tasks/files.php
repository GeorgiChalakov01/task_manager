<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';
?>

<!DOCTYPE html>
<html>
<head>

	<title><?php echo $phrases['files-page-title'];?></title>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/php/head.php';?>

</head>
<body class="cust-dark1">

	<?php require '../common/navbar/navbar.php';?>


	<br/>
	<div class="container">
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
						echo $phrases['files-dropdown-filter-categories'];
					}
					?>
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
					<?php
					echo "
					<li><a class='dropdown-item' href='files.php'>{$phrases['files-dropdown-all-categories']}</a></li>";
					foreach($categories as $category) {
						echo "
						<li><a class='dropdown-item' href='files.php?category_id={$category['id']}'>{$category['name']}</a></li>
						";
					}
					?>
					</ul>
				</div>
				<button 
					type="button" 
					class="btn btn-secondary col-3"
					onclick="window.location.href = 'file_edit.php';"
				>
					<?php echo $phrases['files-upload-button']?>
				</button>
			</div>
		</div>
		<div class="row">
			<?php
			if(isset($_GET['category_id']))
				$files=get_files_from_category($con, $_SESSION['user-details']['id'], $_GET['category_id']);
			else
				$files=get_files($con, $_SESSION['user-details']['id']);

			foreach($files as $file) {
				if($file['description']) {
					$description = $file['description'];
				}
				else {
					$description = $phrases['files-file-no-description'];
				}

				$source_image = '/common/images/file.png';
				if(in_array($file['extension'], ['jpg', 'jpeg', 'png', 'gif', 'ico', 'webp'])) {
					$source_image = '/common/uploaded_files/' . $file['server_name'] . '.' . $file['extension'];
				}
				
				echo '
				<div class="col-lg-3 col-md-6 col-sm-12 mb-4">
					<div class="card h-100 rounded">
						<img src="' . $source_image . '" class="card-img-top" alt="File image">
						<div class="card-body">
							<h5 class="card-title">' . $file['title'] . '</h5>
							<p class="card-text">' . $description . '</p>
							<p class="card-text">' . $file['original_name'] . '.' . $file['extension'] . '</p>
							<p class="card-text">' . $file['uploaded_on'] . '</p>
							<a href="file_download.inc.php?id=' . $file['id'] . '" class="btn btn-secondary">' . $phrases['files-file-download-button'] . '</a>
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
