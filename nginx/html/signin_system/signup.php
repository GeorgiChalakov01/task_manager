<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';
?>

<!DOCTYPE html>
<html>
	<head>

		<title><?php echo $phrases['signup-page-title'];?></title>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/php/head.php';?>

	</head>
	<body class="cust-dark1">

		<?php require '../common/navbar/navbar.php';?>

		<br/>
		<div class="container p-0 bg-light d-flex justify-content-center rounded" style="height: 85vh;">
			<div class="col-12 col-lg-7 p-5" style="overflow: auto;">
				<h1 class="col-12 text-center"><?php echo $phrases['signup-form-title'];?></h1>
				<?php require '../common/statuserror/statuserror.php';?>
				<form action="signup.inc.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
					<div class="form-group mb-3">
						<label for="first_name"><?php echo $phrases['signup-form-first-name-label'];?></label>
						<input 
							   type="text" 
							   name="first_name" 
							   class="form-control" 
							   id="first_name" 
							   placeholder="<?php echo $phrases['signup-form-first-name-placeholder'];?>" 
							   autocomplete="given-name"
							   value="<?php echo $_SESSION['signup-form']['first_name'];?>"
							   required
							   >
							   <div class="invalid-feedback"><?php echo $phrases['error-field-is-manditory'];?></div>
					</div>
					<div class="form-group mb-3">
						<label for="last_name"><?php echo $phrases['signup-form-last-name-label'];?></label>
						<input 
							   type="text" 
							   name="last_name" 
							   class="form-control" 
							   id="last_name" 
							   placeholder="<?php echo $phrases['signup-form-last-name-placeholder'];?>" 
							   autocomplete="given-name"
							   value="<?php echo $_SESSION['signup-form']['last_name'];?>"
							   required
							   >
							   <div class="invalid-feedback"><?php echo $phrases['error-field-is-manditory'];?></div>
					</div>
					<div class="form-group mb-3">
						<label for="username"><?php echo $phrases['signup-form-username-label'];?></label>
						<input
							type="text"
							name="username"
							class="form-control"
							id="username"
							placeholder="<?php echo $phrases['signup-form-username-placeholder'];?>"
							autocomplete="username"
							value="<?php echo $_SESSION['signup-form']['username'];?>"
							required
							>
							<div class="invalid-feedback"><?php echo $phrases['error-field-is-manditory'];?></div>
					</div>

					<div class="form-group mb-3">
						<label for="email"><?php echo $phrases['signup-form-email-label'];?></label>
						<input 
							   type="email" 
							   name="email" 
							   class="form-control" 
							   id="email" 
							   placeholder="<?php echo $phrases['signup-form-email-placeholder'];?>" 
							   autocomplete="email"
							   value="<?php echo $_SESSION['signup-form']['email'];?>"
							   required
							   >
							   <div class="invalid-feedback"><?php echo $phrases['error-field-is-manditory'];?></div>
					</div>
					<div class="form-group mb-3">
						<label for="password"><?php echo $phrases['signup-form-password-label'];?></label>
						<input 
							   type="password" 
							   name="password" 
							   class="form-control" 
							   id="password" 
							   placeholder="<?php echo $phrases['signup-form-password-placeholder'];?>" 
							   autocomplete="new-password"
							   required
							   >
							   <div class="invalid-feedback"><?php echo $phrases['error-field-is-manditory'];?></div>
					</div>
					<div class="form-group mb-3">
						<label for="password_repeat"><?php echo $phrases['signup-form-password-repeat-label'];?></label>
						<input 
							   type="password" 
							   name="password_repeat" 
							   class="form-control" 
							   id="password_repeat" 
							   placeholder="<?php echo $phrases['signup-form-password-repeat-placeholder'];?>" 
							   autocomplete="new-password"
							   required
							   >
							   <div class="invalid-feedback"><?php echo $phrases['error-field-is-manditory'];?></div>
					</div>
					<div class="form-group mb-3">
						<label 
						 for="formFile" 
						 class="form-label"
						 >
						 <?php echo $phrases['signup-form-profile-picture-label'];?>
						</label>
						<input 
						 class="form-control" 
						 type="file" 
						 id="profile_picture" name="file" accept="image/*">
					</div>
					<label for="timezone" class="form-label">
						<?php echo $phrases['signup-form-timezone-label'];?>
					</label>
					<select id="timezone" class="form-select" aria-label="Default select example" name="timezone" required>
						<option value="" disabled selected><?php echo $phrases['signup-form-timezone-placeholder'];?></option>
					<?php
						$timezones = DateTimeZone::listIdentifiers();
						foreach ($timezones as $timezone) {
							echo '<option value="' . $timezone . '">' . $timezone . '</option>';
						}
					?>
					</select>
					<br/>
					<br/>
					<button type="submit" name="submit" class="col-12 btn btn-secondary"><?php echo $phrases['signup-form-submit-button'];?></button>
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
