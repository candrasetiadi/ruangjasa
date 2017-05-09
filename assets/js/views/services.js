var dt = null;
function confirmAgain(){
	dt.fnReloadAjax();
	if($("#addForm").find('form input[name=id]').val() == 'new')
	{
		var no = function(){
			$.closeModal();
		}
		$.confirm("Do you want to add another services?",undefined,no);
	}
	else
	{
		$.closeModal();
	}
}

functions.push(function(){
	$("#btnAdd").click(function(){
		$("#addForm .modal-title").html("Add Services");
		$("#addForm input[name=id]").val("new");
		$("#addForm input[name=file]").attr("required","true");
	});

	$("#data").on('click','.btn_edit',function(){
		var services_id = $(this).attr('data');
		$("#addForm input[name=id]").val("edit");
		$.postAjax(base_url + "services/get_by_id",
		{
			services_id:services_id
		},
			function(data){
				$("#addForm").modal('show');
				$("#addForm .modal-title").html("Edit Services Category");
				$("#addForm input[name=services_name]").val(data.services_name);
				$("#addForm select[name=services_category_id]").val(data.services_category_id);
				$("#addForm select[name=services_category_id]").trigger("chosen:updated");

			}
		);
	});

	$("#data").on('click','.btnDelete',function(){
		var _t = $(this);
		var yes = function(){
			$.postAjax(base_url + "services/delete",{data:$(_t).attr('data')},
				function(){
					dt.fnReloadAjax();
				}
			);

		};
		$.confirm("Do you want to delete the data?",yes);
	});
});
