<div id="overlay" class="overlay"></div>

<div id="menu" class="hidden-menu">
	<p><?php echo $phrases['categories-hidden-menu-question'];?></p>

	<a id="open" href="" class="btn btn-secondary" style="display: none;"><?php echo $phrases['categories-hidden-menu-open'];?></a>
	<a id="complete" class="btn btn-secondary" style="background-color: blue; display: none;"><?php echo $task['completed_on']?$phrases['task-view-mark-non-completed']:$phrases['task-view-mark-completed'];?></a>
	<a id="unattach" href="" class="btn" style="background-color: #7CB9E8; display: none;"><?php echo $phrases['categories-hidden-menu-unattach'];?></a>
	<button id="move" class="btn" style="background-color: #7CB9E8; color: white; width: 100%; padding: 12px 16px; display: none;"><?php echo $phrases['categories-hidden-menu-move'];?></button>
	<a id="edit" href="" class="btn" style="background-color: green; display: none;"><?php echo $phrases['categories-hidden-menu-edit'];?></a>
	<a id="delete" href="" class="btn" style="background-color: red; display: none;"><?php echo $phrases['categories-hidden-menu-delete'];?></a>
</div>

<form action="" method="post" id="move_form" class="hidden-menu">
	<p><?php echo $phrases['categories-hidden-move-form-question'];?></p>
	<input id="move_form_input" type="number" min="1" name="new_place"/>
	<button type="submit"id="move" class="btn" style="background-color: #7CB9E8; color: white;"><?php echo $phrases['categories-hidden-menu-move'];?></button>
</form>

<script>
function show_menu(id, object_type) {
	var url_params = new URLSearchParams(window.location.search);

	var overlay = document.getElementById('overlay');
	var menu = document.getElementById('menu');
	var move_form = document.getElementById('move_form');
	var move_form_input = document.getElementById('move_form_input');

	var open_btn = document.getElementById('open');
	var move_btn = document.getElementById('move');
	var complete_btn = document.getElementById('complete');
	var unattach_btn = document.getElementById('unattach');
	var edit_btn = document.getElementById('edit');
	var delete_btn = document.getElementById('delete');


	if(object_type === 'category'){
		edit_btn.style.display = 'block';
		delete_btn.style.display = 'block';

		edit_btn.href = 'category_edit.php?id=' + id;
		delete_btn.href = 'category_delete.inc.php?id=' + id;
	}
	else if(object_type === 'file'){
		edit_btn.style.display = 'block';
		delete_btn.style.display = 'block';

		edit_btn.href = "file_edit.php?id=" + id;
		delete_btn.href = "file_delete.inc.php?id=" + id;
	}
	else if(object_type === 'attached_file'){
		unattach_btn.style.display = 'block';
		edit_btn.style.display = 'block';
		delete_btn.style.display = 'block';

		const note_id = url_params.get('id');
		const file_id = id;
		unattach_btn.href = "note_unattach_file.inc.php?note_id=" + note_id + "&file_id=" + file_id;
		edit_btn.href = "file_edit.php?id=" + file_id;
		delete_btn.href = "file_delete.inc.php?id=" + file_id;
	}
	else if(object_type === 'note'){
		open_btn.style.display = 'block';
		edit_btn.style.display = 'block';
		delete_btn.style.display = 'block';

		open_btn.href = "note_view.php?id=" + id;
		edit_btn.href = "note_edit.php?id=" + id;
		delete_btn.href = "note_delete.inc.php?id=" + id;
	}
	else if(object_type === 'project'){
		open_btn.style.display = 'block';
		complete_btn.style.display = 'block';
		edit_btn.style.display = 'block';
		delete_btn.style.display = 'block';

		open_btn.href = "project_view.php?id=" + id;
		edit_btn.href = "project_edit.php?id=" + id;
		delete_btn.href = "project_delete.inc.php?id=" + id;
		complete_btn.href = "project_complete.inc.php?id=" + id;
	}
	else if(object_type === 'attached_note_to_project'){
		unattach_btn.style.display = 'block';
		open_btn.style.display = 'block';
		edit_btn.style.display = 'block';
		delete_btn.style.display = 'block';

		const project_id = url_params.get('id');
		const note_id = id;
		unattach_btn.href = "project_unattach_note.inc.php?project_id=" + project_id + "&note_id=" + note_id;
		open_btn.href = "note_view.php?id=" + note_id;
		edit_btn.href = "note_edit.php?id=" + id;
		delete_btn.href = "note_delete.inc.php?id=" + id;
	}
	else if(object_type === 'task'){
		open_btn.style.display = 'block';
		complete_btn.style.display = 'block';
		move_btn.style.display = 'block';
		edit_btn.style.display = 'block';
		delete_btn.style.display = 'block';

		const project_id = url_params.get('id');

		complete_btn.href = "task_complete.inc.php?id=" + id;
		open_btn.href = object_type + "_view.php?id=" + id + "project_id=" + project_id;
		edit_btn.href = "task_edit.php?id=" + id;
		delete_btn.href = "task_delete.inc.php?id=" + id + "&project_id=" + project_id;
		move_btn.onclick = function() {
			menu.style.display = 'none';
			move_form.style.display = 'block';
			move_form_input.value = null;

			move_form.action = "task_move.inc.php?project_id=" + project_id + "&task_id=" + id;
		};
	}
	else if(object_type === 'attached_note_to_task'){
		unattach_btn.style.display = 'block';
		open_btn.style.display = 'block';
		edit_btn.style.display = 'block';
		delete_btn.style.display = 'block';

		const task_id = url_params.get('id');
		const project_id = url_params.get('project_id');
		const note_id = id;

		unattach_btn.href = "task_unattach_note.inc.php?task_id=" + task_id + "&note_id=" + note_id + '&project_id=' + project_id;
		open_btn.href = "note_view.php?id=" + note_id;
		edit_btn.href = "note_edit.php?id=" + note_id;
		delete_btn.href = "note_delete.inc.php?id=" + note_id;
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
