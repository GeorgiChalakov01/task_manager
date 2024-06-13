<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';

if(isset($_GET['project_id']))
	$project_id = $_GET['project_id'];
else {
	header('Location: schedule.php?project_id=' . get_default_project_id($con, $_SESSION['user-details']['id']));
	$project_id = $_GET['project_id'];
}

if(isset($_GET['date']))
	$date = DateTime::createFromFormat('Y-m-d', $_GET['date']);
else
	$date = new DateTime('now', new DateTimeZone(get_user_timezone($con, $_SESSION['user-details']['id'])));

$tasks = get_project_tasks($con, $project_id, $_SESSION['user-details']['id']);
$scheduled_tasks = get_scheduled_tasks($con, $date->format('Y-m-d'), $_SESSION['user-details']['id']);
$task_width = 300;
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $phrases['schedule-title'];?></title>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/php/head.php';?>
	</head>
	<body class="cust-dark1">
		<?php require '../common/navbar/navbar.php';?>
		<?php require '../common/php/hidden_menu.php';?>

		<br>
		<!-- Main Container -->
		<div class="container p-0" style="height: 85%;">

			<!-- Top Schedule Container -->
			<div class="bg-dark rounded" style="height: 60%; padding: 0; margin: 0;">
				<!-- Date Choosing Container -->
				<div class="bg-dark rounded text-white" style="height: 10%; width: 100%; padding: 0; margin: 0; border: 1px solid white;">
					<input id="date-picker" style="float:right;" type="date"/>
        </div>

				<!-- Top Content Schedule Container -->
			<div class="row rounded" style="height: 90%; padding: 0; margin: 0; overflow-x: hidden; overflow-y: auto; border: 1px solid white; width: auto;">
					<!-- Hour Container -->
					<div class="bg-dark rounded col-1" style="float: left; padding: 0; margin: 0; position: relative;">
						<?php for ($i = 0; $i < 25; $i++) { ?>
							<div style="text-align: center; padding: 0; margin: 0; font-size: 12px; top: <?php echo $i * 60; ?>px; position: absolute; border-top: 1px solid white; width: 100%;" class="text-white">
								<?php echo sprintf("%02d:00", $i); ?>
							</div>
						<?php } ?>
					</div>
					<!-- Schedule Content Container -->
					<div class="col-11 rounded" style="height: 1440px; position: relative; overflow-x: auto;">
						<!-- Schedule Content Line Container -->
						<div style="position: absolute; top: 0; left: 0; z-index: 1; min-width: 100%; <?php if($scheduled_tasks)echo 'width: ' . (max(array_column($scheduled_tasks, 'col'))+1) * $task_width . 'px;';?>">
						<?php for ($i = 0; $i < 24; $i++) { ?>
							<div class="col-12 bg-light" style="text-align: center; padding: 0; margin: 0; font-size: 12px; top: <?php echo $i * 60; ?>px; height: 60px; position: absolute; border: 1px solid black; background-color: transparent;">&nbsp;</div>
						<?php } ?>
						</div>
						<!-- Schedule Content Task Container -->
						<div style="position: absolute; top: 0; left: 0; z-index: 1; min-width: 100%;">
							<?php
								foreach($scheduled_tasks as $scheduled_task){
									$start_minutes = time_to_minutes($scheduled_task['start_time']);
									$end_minutes = time_to_minutes($scheduled_task['end_time']);
									$height = $end_minutes - $start_minutes;
									
									if(is_null($scheduled_task['completed_on'])){
										$background_color = $scheduled_task['background_color'];
										$text_color = $scheduled_task['text_color'];
									}
									else{
										$background_color = 'green';
										$text_color = 'white';
									}

									echo '
									<div 
										class="rounded" 
										style="font-size: 12px; text-align: center; position: absolute; border: 1px solid ' . $text_color . '; background-color: ' . $background_color . '; color: ' . $text_color . '; top: ' . $start_minutes . 'px; height: ' . $height . 'px; width: ' . $task_width . 'px; left: ' . (int)$scheduled_task['col'] * $task_width . 'px; cursor: pointer; z-index: ' . $scheduled_task['id'] . ';"
										onclick="show_menu(' . $task['id'] . ', \'scheduled-task\', '. $scheduled_task['task_schedule_id'] .');"
									>' . 
										$scheduled_task['title'] . '
									</div>';
								}
							?>
						</div>
					</div>
				</div>
			</div>

			<!-- Empty Top Space Container -->
			<div style="height: 3%; padding: 0; margin: 0;"></div>

			<!-- Top Task Container -->
			<div class="bg-dark rounded" style="height: 37%; padding: 0; margin: 0;">
				<!-- Project Choosing Container -->
				<div class="bg-dark rounded text-white row" style="height: 20%; width: 100%; padding: 0; margin: 0; align-items: center; border: 1px solid white;">
					<?php
					$projects = get_projects($con, $_SESSION['user-details']['id']);
					foreach($projects as $project){ ?>
						<a href="schedule.php?project_id=<?php echo $project['id']; ?>" class="col rounded" style="background-color: <?php echo $project['background_color'];?>; color: <?php echo $project['text_color'];?>; text-decoration: none; height: 20px;" href=""><?php echo $project['title'];?></a>
					<?php } ?>
				</div>
				<!-- Task Choosing Container -->
				<div class="bg-light rounded row" style="height: 80%; padding: 0; margin: 0; overflow: auto; border: 1px solid white;">
					<div class="container rounded" style="min-height: 100px;">
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
							onclick="show_menu(<?php echo $task['id']; ?>, 'task-to-schedule');"
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

		<script>
			const datePickerInput = document.getElementById('date-picker');

			datePickerInput.addEventListener('input', (e) => {
				const inputValue = e.target.value;
				const currentUrl = new URL(window.location.href);
				currentUrl.searchParams.set('date', inputValue);
				window.location.href = currentUrl.href;
			});


			const urlParams = new URLSearchParams(window.location.search);
			const dateParam = urlParams.get('date');

			if (dateParam) {
				datePickerInput.value = dateParam;
			}
		</script>
		<script src="/common/scripts/form_mandatory_fields.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

	</body>
</html>
