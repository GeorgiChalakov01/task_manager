<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

header('Location: schedule.php?project_id=' . get_default_project_id($con, $_SESSION['user-details']['id']));
exit;
///////////////////////////////////////////////////////////////////////////////////////////////////////////

require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

if(isset($_GET['project_id']))
	$project_id = $_GET['project_id'];
else {
	header('Location: home.php?project_id=' . get_default_project_id($con, $_SESSION['user-details']['id']));
	$project_id = $_GET['project_id'];
}

$tasks = get_project_tasks($con, $project_id, $_SESSION['user-details']['id']);
$scheduled_tasks = get_scheduled_tasks($con, '2024-06-04', $_SESSION['user-details']['id']);
?>

<!DOCTYPE html>
<html>
	<head>

		<title><?php echo $phrases['home-page-title'];?></title>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/php/head.php';?>

	</head>
	<body class="cust-dark1">

		<?php require '../common/navbar/navbar.php';?>
		<?php require '../common/php/hidden_menu.php';?>


		<br>
		<div class="container" style="height: 80%;">
			<?php require '../common/statuserror/statuserror.php';?>
			<div class="bg-dark rounded mb-3" style="height: 60%; padding: 0; margin: 0;">
				<div class="bg-dark rounded text-white" style="height: 10%; width: 100%; padding: 0; margin: 0;">
					<input style="float:right;" type="date"/>
				</div>
				<div class="bg-light rounded mb-3 row" style="height: 90%; padding: 0; margin: 0; overflow: auto;">
					<div class="bg-dark rounded col-1" style="float: left; padding: 0; margin: 0; height: 1935px;">
						<?php for ($i = 0; $i < 25; $i++) { ?>
							<div style="text-align: center; padding: 0; margin: 0; font-size: 12px; top: <?php echo $i * 60; ?>px; position: relative; border-top: 1px solid white;" class="text-white">
								<?php echo sprintf("%02d:00", $i); ?>
							</div>
						<?php } ?>
					</div>
					<div class="col-11 rounded bg-light" style="height: 1935px; position: relative;">
						<div style="position: absolute; top: 0; left: 0; z-index: 1; width: 100%; height: 1935px;">
						<?php for ($i = 0; $i < 25; $i++) { ?>
							<div style="text-align: center; padding: 0; margin: 0; font-size: 12px; top: <?php echo $i * 60; ?>px; position: relative; border-top: 1px solid black;" class="col-12">&nbsp;</div>
						<?php } ?>
						</div>
						<div style="position: absolute; top: 0; left: 0; z-index: 1; width: 100%; height: 1935px;">
						<?php 
							foreach($scheduled_tasks as $scheduled_task){ 
								$start_minutes = time_to_minutes($scheduled_task['start_time']);
								$end_minutes = time_to_minutes($scheduled_task['end_time']);
								$height = $end_minutes - $start_minutes;

								echo '<div class="rounded" style="position: relative; border: 1px solid black; background-color: red; top: ' . $start_minutes . 'px; height: ' . $height . 'px;">' . $scheduled_task['title'] . '</div>';
							} 
						?>
						</div>
					</div>
				</div>
			</div>
			<div class="bg-light rounded" style="height: 40%; padding: 0; margin: 0; overflow-y: auto;">
				<div class="bg-dark rounded text-white row" style="height: 20%; width: 100%; padding: 0; margin: 0; align-items: center;">
					<?php 
					$projects = get_projects($con, $_SESSION['user-details']['id']);
					foreach($projects as $project){ ?>
						<a href="home.php?project_id=<?php echo $project['id']; ?>" class="col rounded" style="background-color: <?php echo $project['background_color'];?>; color: <?php echo $project['text_color'];?>; text-decoration: none; height: 20px;" href=""><?php echo $project['title'];?></a>
					<?php } ?>
				</div>
				<div class="bg-light rounded row" style="height: 80%; padding: 0; margin: 0; overflow: auto;">
					<div class="container" style="min-height: 100px;">
					<?php foreach($tasks as $task): ?>
						<div 
							class="row m-2 p-1" 
							style="
								border: 1px solid grey; 
								border-radius: 10px; 
								cursor: pointer; 
								background-color: <?php if($task['completed_on']) echo 'green'; else echo '#6c757d';?>; 
								color: white; 
								border: 1px solid black;" 
							onclick="show_menu(<?php echo $task['id']; ?>, 'task-schedule');"
						>
							<h5 class="mb-1"><?php echo $task['place'] . ': ' . htmlspecialchars($task['title']); ?></h5>
							<p class="mb-1"><?php echo htmlspecialchars($task['description']); ?></p>
							<?php if($task['deadline']): ?>
								<small><?php echo $phrases['project-view-deadline'];?>: <?php echo substr(htmlspecialchars($task['deadline']), 0, -3); ?></small>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>



		<script src="/common/scripts/form_mandatory_fields.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

	</body>
</html>
