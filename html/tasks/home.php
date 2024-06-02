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


		<br>
		<div class="container" style="height: 85%;">
			<div class="bg-light rounded mb-3" style="height: 60%; padding: 0; margin: 0;">
				<div class="bg-dark rounded text-white" style="height: 10%; width: 100%; padding: 0; margin: 0;">
					<input style="float:right;" type="date"/>
				</div>
				<div class="bg-light rounded mb-3" style="height: 90%; padding: 0; margin: 0; overflow: auto;">
					<div class="bg-dark p-1 rounded" style="float: left; padding: 0; margin: 0; width: 40px; height: 1900px;">
						<?php for ($i = 0; $i < 25; $i++) { ?>
							<div style="padding: 0; margin: 0; font-size: 12px; top: <?php echo $i * 60; ?>px; position: relative;" class="text-white">
								<?php echo sprintf("%02d:00", $i); ?>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="bg-light rounded" style="height: 40%; padding: 0; margin: 0; overflow-y: auto;">
				</div>
			</div>
		</div>



		<script src="/common/scripts/form_mandatory_fields.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

	</body>
</html>
