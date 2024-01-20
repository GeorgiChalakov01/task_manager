<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
	<?php
		if(isset($_SESSION['user-details'])) {
			echo '
			<ul class="navbar-nav">
				<li class="nav-item active d-flex justify-content-center">
					<a class="nav-link" href="#">' . $phrases['home'] . '</a>
				</li>
				<li class="nav-item active d-flex justify-content-center">
					<a class="nav-link" href="/tasks/categories.php">' . $phrases['categories'] . '</a>
				</li>
				<li class="nav-item active d-flex justify-content-center">
					<a class="nav-link" href="/tasks/files.php">' . $phrases['files'] . '</a>
				</li>
				<li class="nav-item active d-flex justify-content-center">
					<a class="nav-link" href="/tasks/notes.php">' . $phrases['notes'] . '</a>
				</li>
			</ul>';
		}
		else {
			if(basename($_SERVER['PHP_SELF']) == "signin.php")
				echo '
				<ul class="navbar-nav ms-auto">
					<li class="nav-item active d-flex justify-content-center">
						<a class="nav-link" href="signup.php">' . $phrases['signup-link-text'] . '</a>
					</li>
				</ul>';
			else
				echo '
				<ul class="navbar-nav ms-auto">
					<li class="nav-item active d-flex justify-content-center">
						<a class="nav-link" href="signin.php">' . $phrases['signin-link-text'] . '</a>
					</li>
				</ul>';
		}
		?>
		<ul class="navbar-nav ms-auto">
			<li class="nav-item ">
				<a class="nav-link dropdown-toggle text-center" href="#" id="settingsDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    ⚙️
				</a>
				<div
					class="dropdown-menu text-center"
					style="left: auto; right: 0;"
					aria-labelledby="settingsDropdownMenuLink"
				>

				<?php
				if(isset($_SESSION['user-details'])) {
					echo '
					<a class="dropdown-item" href="#">'. $phrases['navbar-profile'] . '</a>
					<a class="dropdown-item" href="/common/navbar/signout.inc.php">'. $phrases['navbar-signout'] . '</a>
					<div class="dropdown-divider"></div>
					';
				}

				echo '<h6 class="dropdown-header">'. $phrases['navbar-languages'] . '</h6>';

				$languages=get_languages($con);
				foreach($languages as $language) {
					$return_url = urlencode($_SERVER['REQUEST_URI']);
					echo '
					<a
						class="dropdown-item"
						href="/common/navbar/change_language.inc.php?language_code=' .  $language['code']. '&return=' . $return_url . '"
				   >' .
						$language['name'] . '
					</a>';
				 }
				 ?>
				</div>
			</li>
		</ul>

	</div>
</nav>
