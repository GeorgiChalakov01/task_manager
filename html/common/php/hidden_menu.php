<div id="overlay" class="overlay"></div>

<div id="menu" class="hidden-menu">
<p><?php echo $phrases['categories-hidden-menu-question'];?></p>
	<a id="open" href="" class="btn btn-secondary"><?php echo $phrases['categories-hidden-menu-open'];?></a>
	<a id="edit" href="" style="background-color: green;"><?php echo $phrases['categories-hidden-menu-edit'];?></a>
	<a id="delete" href="" style="background-color: red;"><?php echo $phrases['categories-hidden-menu-delete'];?></a>
</div>

<script>
function show_menu(id, object_type) {
	var overlay = document.getElementById('overlay');
	var menu = document.getElementById('menu');
	var open_btn = document.getElementById('open');

	if (['project', 'note'].includes(object_type)) 
		open_btn.style.display = 'block';
	else
		open_btn.style.display = 'none';

	open_btn.href = object_type + "_view.php?id=" + id;
	document.getElementById('edit').href = object_type + "_edit.php?id=" + id;
	document.getElementById('delete').href = object_type + "_delete.inc.php?id=" + id;

	overlay.style.display = "block";
	menu.style.display = "block";
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
	if (event.target.matches('.overlay')) {
		var overlay = document.getElementById('overlay');
		var menu = document.getElementById("menu");
		if (menu.style.display === "block") {
			overlay.style.display = "none";
			menu.style.display = "none";
		}
	}
}
</script>
