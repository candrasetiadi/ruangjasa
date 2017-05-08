var dt = null;
function confirmAgain(){
	dt.fnReloadAjax();
	if($("#addForm").find('form input[name=id]').val() == 'new')
	{
		var no = function(){
			$.closeModal();
		}
		$.confirm("Do you want to add another Class Level?",undefined,no);
	}
	else
	{
		$.closeModal();
	}
}
functions.push(function(){
	$("#btnAdd").click(function(){
		$("#addForm .modal-title").html("Add Class Level");
		$("#addForm input[name=id]").val("new");
	});

	$("#data").on('click','.btn_edit',function(){
		var class_level_id = $(this).attr('data');
		$("#addForm input[name=id]").val("edit");
		$.postAjax(base_url + "class_level/get_level_by_id",
		{
			class_level_id:class_level_id
		},
			function(data){
				$("#addForm").modal('show');
				$("#addForm .modal-title").html("Edit Class Level");
				$("#addForm input[name=class_level_id]").val(data.class_level_id);
				$("#addForm input[name=class_level_name]").val(data.class_level_name);
				$("#addForm select[name=class_level_category_id]").val(data.class_level_category_id);
				$("#addForm select[name=class_level_category_id]").trigger("chosen:updated");
			}
		);
	});

	$("#data").on('click','.btn_delete',function(){
		var _t = $(this);
		var yes = function(){
			$.postAjax(base_url + "class_level/delete",{data:$(_t).attr('data')},
				function(){
					dt.fnReloadAjax();
				}
			);

		};
		$.confirm("Do you want to delete the data?",yes);
	});
});
