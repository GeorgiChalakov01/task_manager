<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';
?>

<!DOCTYPE html>
<html>
	<head>

		<title><?php echo $phrases['home-page-title'];?></title>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/php/head.php';?>

	</head>
	<body class="cust-dark1">

		<?php require '../common/navbar/navbar.php';?>


		<div class="container mt-5 p-3 mb-3 bg-dark rounded text-white text-center">
			<div class="jumbotron bg-dark rounded">
				<h1 class="display-4">Welcome to Task Manager!</h1>
				<p class="lead">Organize and prioritize your tasks effectively.</p>
				<hr class="my-4">
			</div>

			<div class="row">
				<div class="col-md-4 mb-3">
					<div class="p-3 bg-secondary rounded text-center">
						<h2>Organize</h2>
						<p>Keep all your tasks in one place. No more sticky notes and random notebooks.</p>
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<div class="p-3 bg-secondary rounded text-center">
						<h2>Prioritize</h2>
						<p>Decide which tasks are most important and tackle those first.</p>
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<div class="p-3 bg-secondary rounded text-center">
						<h2>Accomplish</h2>
						<p>Check off your tasks as you complete them. Feel the satisfaction of getting things done!</p>
					</div>
				</div>
			</div>
		</div>



		<script src="/common/scripts/form_mandatory_fields.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

	</body>
</html>
