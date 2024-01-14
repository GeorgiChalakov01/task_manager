<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
	<?php
		if(isset($_SESSION["signedin"]) && $_SESSION["signedin"] === true) {
		echo '
		<ul class="navbar-nav">
			<li class="nav-item active d-flex justify-content-center">
				<a class="nav-link" href="#">' . $phrases['home'] . '</a>
			</li>
			<li class="nav-item active d-flex justify-content-center">
				<a class="nav-link" href="#">' . $phrases['categories'] . '</a>
			</li>
			<li class="nav-item active d-flex justify-content-center">
				<a class="nav-link" href="#">' . $phrases['notes'] . '</a>
			</li>
		</ul>';
		}
		?>
		<ul class="navbar-nav ms-auto">
			<li class="nav-item ">
				<a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					&nbsp;&nbsp;&nbsp;&nbsp;🌎
				</a>
				<div 
				class="dropdown-menu" 
				style="left: auto; right: 0;"
				aria-labelledby="navbarDropdownMenuLink"
				>
				<?php
				$languages=get_languages($con);
				foreach($languages as $language) {
					$return_url = urlencode($_SERVER['REQUEST_URI']);

					// Not a best practice to have the root directory exposed.
					echo '
					<a 
							class="dropdown-item" 
							href="/common/navbar/change_language.php?language_code=' .  $language['code']. '&return=' . $return_url . '"
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
