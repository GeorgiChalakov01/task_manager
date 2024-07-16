<?php
require $_SERVER['DOCUMENT_ROOT'] . '/common/php/php_start.php';
require 'includes/php_auth_check.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo htmlspecialchars($note['title']); ?></title>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/php/head.php';?>
</head>
<body class="cust-dark1">

	<?php require '../common/navbar/navbar.php';?>
	<?php require '../common/php/hidden_menu.php';?>

<?php
// This tag should not be at the top because the hidden menu adds variables with the same name. It would be good to revisit this toppic and think of a better solution.
$note_id = $_GET['id'];
$note = get_note_info($con, $note_id, $_SESSION['user-details']['id']);
?>

	<div class="container mt-4">
		<?php require '../common/statuserror/statuserror.php';?>
		<div class="row">
		<div class="col-md-12 d-flex">
			<div class="bg-light p-2 mb-4 rounded flex-grow-1">
			<h1><strong><?php echo htmlspecialchars($note['title']); ?></strong></h1>
			<p><?php echo nl2br(htmlspecialchars($note['description'])); ?></p>
			<p><strong><?php echo $phrases['note-view-created-on'];?></strong> <?php echo htmlspecialchars($note['created_on']); ?></p>
			<?php if($project['deadline']): ?>
				<p><strong><?php echo $phrases['note-view-deadline'];?></strong> <?php echo htmlspecialchars($note['deadline']); ?></p>
			<?php endif; ?>
				<button class="btn btn-secondary" onClick="window.location.href='note_edit.php?id=<?php echo $note_id;?>'"><?php echo $phrases['note-view-edit'];?></button>
				<button class="btn btn-secondary"><?php echo $phrases['note-view-archive'];?></button>
			</div>
		</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="bg-light p-2 rounded">
					<h2><?php echo $phrases['note-view-attached-files'];?></h2>
					<div class="row" style="min-height: 150px;">
					<?php
					$files=get_attached_files_to_note($con, $note_id, $_SESSION['user-details']['id']);
					foreach($files as $file) {
						if($file['description']) {
							$description = $file['description'];
						}
						else {
							$description = $phrases['text-no-description'];
						}

						$source_image = '/common/images/file.png';
						if(in_array($file['extension'], ['jpg', 'jpeg', 'png', 'gif', 'ico', 'webp'])) {
							$source_image = 'get_file_minio.php?file_id=' . $file['id'];
						}
		
						echo '
						<div class="col-lg-3 col-md-6 col-sm-12 mb-4">
							<div class="card rounded" style="height: 700px;">
								<div class="h-50" style="background-color: #f7f7f7; cursor: pointer;" onclick="show_menu(' . $file['id'] . ', \'attached_file\');">
									<img src="' . $source_image . '" style="width: 100%; height: 100%; object-fit: cover;" alt="File image">
								</div>
								<div class="card-body">
									<h5 class="card-title" style="height: 40px; overflow: auto;">' . $file['title'] . '</h5>
									<p class="card-text" style="height: 60px; overflow: scroll;">' . $description . '</p>
									<p class="card-text" style="height: 40px; overflow: scroll;">' . $file['original_name'] . '.' . $file['extension'] . '</p> 
									<p class="card-text" style="height: 40px; overflow: scroll;">' . $file['uploaded_on'] . '</p>
									<a href="file_download.inc.php?id=' . $file['id'] . '" class="btn btn-secondary">' . $phrases['files-file-download-button'] . '</a> 
								</div>
							</div>
						</div>';
					}
					?>
					</div>
				</div>
			</div>
		</div>
	</div>



	<script src="/common/scripts/form_mandatory_fields.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

