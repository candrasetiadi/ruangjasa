var dt = null;
function confirmAgain(){
	dt.fnReloadAjax();
	if($("#addForm").find('form input[name=id]').val() == 'new')
	{
		var no = function(){
			$.closeModal();
		}
		$.confirm("Do you want to add another form?",undefined,no);
	}
	else
	{
		$.closeModal();
	}
}

functions.push(function(){
	$("#btnAdd").click(function(){
		$("#addForm .modal-title").html("Add Request Form");
		$("#addForm input[name=id]").val("new");
		$("#addForm input[name=file]").attr("required","true");
	});

	$("#data").on('click','.btn_edit',function(){
		var services_request_form_id = $(this).attr('data');
		$("#addForm input[name=id]").val("edit");
		$.postAjax(base_url + "services/get_request_form_by_id",
		{
			services_request_form_id:services_request_form_id
		},
			function(data){
				$("#addForm").modal('show');
				$("#addForm .modal-title").html("Edit Services Category");
				$("#addForm select[name=services_id]").val(data.services_id);
				$("#addForm select[name=services_id]").trigger("chosen:updated");
				$("#addForm input[name=services_request_form_name]").val(data.services_request_form_name);
				$("#addForm select[name=services_request_form_datatype]").val(data.services_request_form_datatype);
				$("#addForm select[name=services_request_form_datatype]").trigger("chosen:updated");

			}
		);
	});

	$("#data").on('click','.btnDelete',function(){
		var _t = $(this);
		var yes = function(){
			$.postAjax(base_url + "services/delete_request_form",{data:$(_t).attr('data')},
				function(){
					dt.fnReloadAjax();
				}
			);

		};
		$.confirm("Do you want to delete the data?",yes);
	});
});
