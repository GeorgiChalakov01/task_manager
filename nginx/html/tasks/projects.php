<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $phrases['projects-page-title'];?></title>
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
					unset($category);

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
					<li><a class='dropdown-item' href='projects.php'>{$phrases['dropdown-all-categories']}</a></li>";
					foreach($categories as $category) {
						echo "
						<li><a class='dropdown-item' href='projects.php?category_id={$category['id']}'>{$category['name']}</a></li>
						";
					}
					?>
					</ul>
				</div>
				<button 
					type="button" 
					class="btn btn-secondary col-3"
					onclick="window.location.href = 'project_edit.php';"
				>
					<?php echo $phrases['projects-create-button']?>
				</button>
			</div>
		</div>
		<div class="row">
			<?php
			if(isset($_GET['category_id']))
				$projects=get_projects_from_category($con, $_SESSION['user-details']['id'], $_GET['category_id']);
			else
				$projects=get_projects($con, $_SESSION['user-details']['id']);

			foreach($projects as $project) {
				if($project['description']) {
					$description = $project['description'];
				}
				else {
					$description = $phrases['text-no-description'];
				}

				$default_project = (($project['title'] == 'default-project-title') ? True : False);
				$onclick = $default_project ? "window.location.href='project_view.php?id={$project['id']}'" : "show_menu({$project['id']}, 'project');";

				echo '
				<div 
					class="col-lg-4 col-md-6 col-sm-12 mb-4" 
					style="cursor: pointer;" 
					onclick="' . $onclick . '"
				>
					<div class="card rounded" style="height: 400px;">
						<div class="card-body" style="background-color: #f7f7f7;">
							<h2 class="card-title" style="height: 50px; overflow: auto;">' . ($default_project ? $phrases[$project['title']] : $project['title']) . '</h2>
						</div>
						<div class="card-body">
							<p class="card-text" style="height: 200px; overflow: auto;">' . ($description == 'default-project-description' ? $phrases[$description] : $project['description']) . '</p>
							<p class="card-text" style="height: 40px; overflow: auto;">' . $project['created_on'] . '</p>
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
