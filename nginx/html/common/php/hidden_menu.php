<div id="overlay" class="overlay"></div>

<div id="menu" class="hidden-menu">
	<p><?php echo $phrases['categories-hidden-menu-question'];?></p>

	<a id="open" href="" class="btn btn-secondary" style="display: none;"><?php echo $phrases['categories-hidden-menu-open'];?></a>
	<a id="complete" class="btn btn-secondary" style="background-color: blue; display: none;"><?php echo $phrases['task-view-mark-completed'];?></a>
	<a id="unattach" href="" class="btn" style="background-color: #7CB9E8; display: none;"><?php echo $phrases['categories-hidden-menu-unattach'];?></a>
	<button id="move" class="btn" style="background-color: #7CB9E8; color: white; width: 100%; padding: 12px 16px; display: none;"><?php echo $phrases['categories-hidden-menu-move'];?></button>
	<a id="edit" href="" class="btn" style="background-color: green; display: none;"><?php echo $phrases['categories-hidden-menu-edit'];?></a>
	<a id="delete" href="" class="btn" style="background-color: red; display: none;"><?php echo $phrases['categories-hidden-menu-delete'];?></a>
	<a id="schedule" class="btn" style="background-color: blue; display: none;"><?php echo $phrases['hidden-menu-schedule'];?></a>
	<a id="unschedule" class="btn" style="background-color: blue; display: none;"><?php echo $phrases['hidden-menu-unschedule'];?></a>
</div>

<form action="" method="post" id="move_form" class="hidden-menu">
	<p><?php echo $phrases['categories-hidden-move-form-question'];?></p>
	<input id="move_form_input" type="number" min="1" name="new_place"/>
	<button type="submit" id="move" class="btn" style="background-color: #7CB9E8; color: white;"><?php echo $phrases['categories-hidden-menu-move'];?></button>
</form>

<form action="" method="post" id="schedule_form" class="hidden-menu">
	<table class="table table-bordered">
		<tr>
			<td colspan="2" class="text-center"><?php echo $phrases['schedule-from-question'];?></td>
		</tr>
		<tr>
			<td class="text-center"><?php echo $phrases['schedule-from-start'];?></td>
			<td class="text-center"><input id="start_time" type="time" name="start_time"/></td>
		</tr>
		<tr>
			<td class="text-center"><?php echo $phrases['schedule-from-end'];?></td>
			<td class="text-center"><input id="end_time" type="time" name="end_time"/></td>
		</tr>
		<tr>
			<td colspan="2" class="text-center">
				<button type="submit" id="submit" class="btn btn-primary" style="background-color: #7CB9E8; color: white;"><?php echo $phrases['schedule-from-submit'];?></button>
			</td>
		</tr>
	</table>
</form>

<?php require 'includes/note_chooser.php';?>

<script>
var url_params = new URLSearchParams(window.location.search);

var overlay = document.getElementById('overlay');
var menu = document.getElementById('menu');
var move_form = document.getElementById('move_form');
var move_form_input = document.getElementById('move_form_input');
var schedule_form = document.getElementById('schedule_form');
var schedule_form_start_input = document.getElementById('schedule_form_start');
var schedule_form_end_input = document.getElementById('schedule_form_end');
var note_chooser = document.getElementById("note_chooser");


var open_btn = document.getElementById('open');
var move_btn = document.getElementById('move');
var complete_btn = document.getElementById('complete');
var unattach_btn = document.getElementById('unattach');
var edit_btn = document.getElementById('edit');
var delete_btn = document.getElementById('delete');
var schedule_btn = document.getElementById('schedule');
var unschedule_btn = document.getElementById('unschedule');

function show_menu(id, object_type, id2 = null) {
	// Show mark completed/non-completed correctly.
	<?php 
		foreach($tasks as $task) { 
			echo "
			if({$task['id']} === id && '{$task['completed_on']}' != '') 
				complete_btn.innerHTML = '{$phrases['task-view-mark-non-completed']}';";
		}
	?>

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
			move_form_input.value = 1;

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
	else if(object_type === 'task-to-schedule'){
		const project_id = url_params.get('project_id');

		open_btn.style.display = 'block';
		edit_btn.style.display = 'block';
		schedule_btn.style.display = 'block';

		open_btn.href = "task_view.php?id=" + id;
		edit_btn.href = "task_edit.php?id=" + id;

		schedule_btn.onclick = function() {
			menu.style.display = 'none';
			schedule_form.style.display = 'block';
			schedule_form.action = "task_schedule.inc.php?project_id=" + project_id + "&task_id=" + id + "&date=<?php if(isset($date)) echo $date->format('Y-m-d');?>";
		};
	}
	else if(object_type === 'scheduled-task'){
		open_btn.style.display = 'block';
		edit_btn.style.display = 'block';
		unschedule_btn.style.display = 'block';
		complete_btn.style.display = 'block';

		open_btn.href = "task_view.php?id=" + id;
		edit_btn.href = "task_edit.php?id=" + id;
		unschedule_btn.href = "task_unschedule.inc.php?id=" + id2;
		complete_btn.href = "task_complete.inc.php?id=" + id;
	}


	overlay.style.display = "block";
	menu.style.display = "block";
}

function show_note_chooser() {
	overlay.style.display = 'block';
	note_chooser.style.display = 'block';
}

window.onclick = function(event) {
	if (event.target.matches('.overlay')) {
		if (menu.style.display === "block" || move_form.style.display === "block" || note_chooser.style.display === 'block' || schedule_form.style.display === "block") {
			overlay.style.display = "none";
			menu.style.display = "none";
			move_form.style.display = "none";
			note_chooser.style.display = 'none';
			schedule_form.style.display = 'none';


			open_btn.style.display = "none";
			move_btn.style.display = "none";
			complete_btn.style.display = "none";
			unattach_btn.style.display = "none";
			edit_btn.style.display = "none";
			delete_btn.style.display = "none";
			schedule_btn.style.display = "none";
			unschedule_btn.style.display = "none";
		}
	}
}
</script>