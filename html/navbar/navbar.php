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
						$params=$_GET;
						$params['language_code']=$language['code'];
						$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? 'https://' : 'http://';


						$new_url = $protocol . $_SERVER['HTTP_HOST'] . explode("?", $_SERVER['REQUEST_URI'])[0] . '?';
						foreach($params as $key => $value) {
							$new_url .= $key . '=' . $value . '&';
						}
						$new_url=substr($new_url, 0, -1);

						echo '<a class="dropdown-item" href="' . $new_url . '">' . $language['name'] . '</a>';
					}
				?>
				</div>
			</li>
		</ul>
	</div>
</nav>
