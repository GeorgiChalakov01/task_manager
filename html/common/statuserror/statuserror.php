<div id="status" class="alert alert-success text-center <?php echo isset($_GET['status']) ? '' : 'd-none'; ?>" role="alert"><?php echo $phrases[$_GET['status']];?></div>

<div id="message" class="alert alert-danger text-center <?php echo isset($_GET['error']) ? '' : 'd-none'; ?>" role="alert"><?php echo $phrases[$_GET['error']];?></div>
