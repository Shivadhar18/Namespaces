jQuery(function($){
	$(".action").tooltip();
});
function delete_todo(id){
	$.ajax({
		url:"core/model.php",
		type:"post",
		data:{
			action:'delete',
			id:id
		},
		success:function(){
			location.reload();
		},
		error:function(){

		}

	});
}
function edit(id,date_time,todo,status){
	$("#edit-todo-modal").modal("show");
	
	$("#edit-todo-modal #todo_id").val(id);
	$("#edit-todo-modal #date_time").val(date_time);
	$("#edit-todo-modal #schedule").val(todo);
	$("#edit-todo-modal #status").val(status);

	// $("#edit-todo-modal").modal("show");
	// $.ajax({
	// 	url:"core/model.php",
	// 	type:"post",
	// 	data:{
	// 		action:'edit',
	// 		id:id,
	// 		date_time:date_time,
	// 		todo:todo,
	// 		status:status
	// 	},
	// 	success:function(){
	// 		// location.reload();
	// 	},
	// 	error:function(){

	// 	}

	// });
}