<div id="overlay" class="overlay"></div>

<div id="menu" class="hidden-menu">
	<p><?php echo $phrases['categories-hidden-menu-question'];?></p>
	<button id="move" class="btn" style="background-color: #7CB9E8; width: 100%; padding: 12px 16px;"><?php echo $phrases['categories-hidden-menu-move'];?></button>
	<a id="open" href="" class="btn btn-secondary"><?php echo $phrases['categories-hidden-menu-open'];?></a>
	<a id="unattach" href="" class="btn" style="background-color: #7CB9E8;"><?php echo $phrases['categories-hidden-menu-unattach'];?></a>
	<a id="edit" href="" class="btn" style="background-color: green;"><?php echo $phrases['categories-hidden-menu-edit'];?></a>
	<a id="delete" href="" class="btn" style="background-color: red;"><?php echo $phrases['categories-hidden-menu-delete'];?></a>
</div>

<form action="" method="post" id="move_form" class="hidden-menu">
	<p><?php echo $phrases['categories-hidden-move-form-question'];?></p>
	<input id="move_form_input" type="number" min="1" name="new_place"/>
	<button type="submit"id="move" class="btn" style="background-color: #7CB9E8;"><?php echo $phrases['categories-hidden-menu-move'];?></button>
</form>

<script>
function show_menu(id, object_type) {
	var url_params = new URLSearchParams(window.location.search);

	var overlay = document.getElementById('overlay');
	var menu = document.getElementById('menu');
	var move_form = document.getElementById('move_form');
	var move_form_input = document.getElementById('move_form_input');

	var move_btn = document.getElementById('move');
	var open_btn = document.getElementById('open');
	var unattach_btn = document.getElementById('unattach');
	var edit_btn = document.getElementById('edit');
	var delete_btn = document.getElementById('delete');

	if(['category', 'file'].includes(object_type)){
		move_btn.style.display = 'none';
		open_btn.style.display = 'none';
		unattach_btn.style.display = 'none';
	}
	else if(['project', 'note'].includes(object_type)){
		move_btn.style.display = 'none';
		open_btn.style.display = 'block';
		unattach_btn.style.display = 'none';
	} else if(['attached_file'].includes(object_type)){
		move_btn.style.display = 'none';
		open_btn.style.display = 'none';
		unattach_btn.style.display = 'block';
		const note_id = url_params.get('id');
		unattach_btn.href = "note_unattach_file.inc.php?note_id=" + note_id + "&file_id=" + id;
		object_type = 'file';
	} else if(['attached_note_to_project'].includes(object_type)){
		move_btn.style.display = 'none';
		open_btn.style.display = 'block';
		unattach_btn.style.display = 'block';
		const project_id = url_params.get('id');
		unattach_btn.href = "project_unattach_note.inc.php?project_id=" + project_id + "&note_id=" + id;
		object_type = 'note';
	} else if(['attached_note_to_task'].includes(object_type)){
		move_btn.style.display = 'none';
		open_btn.style.display = 'block';
		unattach_btn.style.display = 'block';
		const task_id = url_params.get('id');
		const project_id = url_params.get('project_id');
		unattach_btn.href = "task_unattach_note.inc.php?task_id=" + task_id + "&note_id=" + id + '&project_id=' + project_id;
		object_type = 'note';
	} else if(['task'].includes(object_type)){
		open_btn.style.display = 'block';
		unattach_btn.style.display = 'none';
		open_btn.href = object_type + "_view.php?id=" + id + 'project_id=' + project_id;
		move_btn.style.display = 'block';
		move_btn.onclick = function() {
			menu.style.display = 'none';
			move_form.style.display = 'block';
			move_form_input.value = null;

			const project_id = url_params.get('id');
			move_form.action = "task_move.inc.php?project_id=" + project_id + "&task_id=" + id;
		};
	}

	var project_id = url_params.get('id');
	if(['task'].includes(object_type)){
		open_btn.href = object_type + "_view.php?id=" + id + '&project_id=' + project_id;
		edit_btn.href = object_type + "_edit.php?id=" + id + '&project_id=' + project_id;
		delete_btn.href = object_type + "_delete.inc.php?id=" + id + '&project_id=' + project_id;
	}
	else{
		open_btn.href = object_type + "_view.php?id=" + id;
		edit_btn.href = object_type + "_edit.php?id=" + id;
		delete_btn.href = object_type + "_delete.inc.php?id=" + id;
	}


	overlay.style.display = "block";
	menu.style.display = "block";
}

window.onclick = function(event) {
	if (event.target.matches('.overlay')) {
		var overlay = document.getElementById('overlay');
		var menu = document.getElementById("menu");
		var move_form = document.getElementById("move_form");

		if (menu.style.display === "block" || move_form.style.display === "block") {
			overlay.style.display = "none";
			menu.style.display = "none";
			move_form.style.display = "none";
		}
	}
}
</script>
