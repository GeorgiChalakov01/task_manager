<?php
require 'includes/php_start.php';
require 'includes/php_auth_check.php';
?>

<!DOCTYPE html>
<html>
	<head>

		<?php include 'includes/head.php';?>

	</head>
	<body class="cust-dark1">

		<?php require '../common/navbar/navbar.php';?>

		<div class="container p-0 col-10 bg-light d-flex justify-content-center rounded" style="height: 80vh;">
			<div class="col-12 col-lg-7 p-5" style="overflow: auto;">
				<h1 class="col-12 text-center"><?php echo $phrases['signin-form-title'];?></h1>
				<?php require '../common/statuserror/statuserror.php';?>
				<form action="signin.inc.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
					<div class="form-group">
						<label for="email"><?php echo $phrases['signin-form-email-label'];?></label>
						<input 
							type="email" 
							name="email" 
							class="form-control" 
							id="email" 
							placeholder="<?php echo $phrases['signin-form-email-placeholder'];?>" 
							autocomplete="email"
							value="<?php echo $_SESSION['signin-form']['email'];?>"
							required
						>
						<div class="invalid-feedback"><?php echo $phrases['error-field-is-manditory'];?></div>

					</div>
					<div class="form-group">
						<label for="password"><?php echo $phrases['signin-form-password-label'];?></label>
						<input 
							type="password" 
							name="password" 
							class="form-control" 
							id="password" 
							placeholder="<?php echo $phrases['signin-form-password-placeholder'];?>" 
							autocomplete="current-password"
							required
						>
						<div class="invalid-feedback"><?php echo $phrases['error-field-is-manditory'];?></div>
					</div>
					<br/>
					<br/>
					<button type="submit" name="submit" class="col-12 btn btn-secondary"><?php echo $phrases['signin-form-submit-button'];?></button>
				</form>
			</div>
			<div class="col-0 col-lg-5">
				<img 
					class="img-fluid d-none d-sm-block signin-img" 
					src="/signin_system/images/signin.png" style="object-fit: cover; height: 100%; width: 100%;"/>
			</div>
		</div>

		<script src="/common/scripts/form_mandatory_fields.js"></script>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

	</body>
</html>
