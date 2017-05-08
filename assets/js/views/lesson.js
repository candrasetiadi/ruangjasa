var dt = null;
function confirmAgain(){
	dt.fnReloadAjax();
	if($("#addForm").find('form input[name=id]').val() == 'new')
	{
		var no = function(){
			$.closeModal();
		}
		$.confirm("Do you want to add another Lesson?",undefined,no);
	}
	else
	{
		$.closeModal();
	}
}
functions.push(function(){
	$("#btnAdd").click(function(){
		$("#addForm .modal-title").html("Add Lesson");
		$("#addForm input[name=id]").val("new");
	});

	$("#data").on('click','.btn_edit',function(){
		var lesson_id = $(this).attr('data');
		$("#addForm input[name=id]").val("edit");
		$.postAjax(base_url + "lesson/get_by_id",
		{
			lesson_id:lesson_id
		},
			function(data){
				$("#addForm").modal('show');
				$("#addForm .modal-title").html("Edit Lesson");
				$("#addForm input[name=lesson_id]").val(data.lesson_id);
				$("#addForm input[name=lesson_name]").val(data.lesson_name);
				$("#addForm select[name=lesson_category_id]").val(data.lesson_category_id);
				$("#addForm select[name=lesson_category_id]").trigger("chosen:updated");
			}
		);
	});

	$("#data").on('click','.btn_delete',function(){
		var _t = $(this);
		var yes = function(){
			$.postAjax(base_url + "lesson/delete",{data:$(_t).attr('data')},
				function(){
					dt.fnReloadAjax();
				}
			);

		};
		$.confirm("Do you want to delete the data?",yes);
	});
});
