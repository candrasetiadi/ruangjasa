var dt = null;
function confirmAgain(){
	dt.fnReloadAjax();
	if($("#addForm").find('form input[name=id]').val() == 'new')
	{
		var no = function(){
			$.closeModal();
		}
		$.confirm("Do you want to add another users?",undefined,no);
	}
	else
	{
		$.closeModal();
	}
}
functions.push(function(){
	$("#btnAdd").click(function(){
		$("#addForm .modal-title").html("Add Users");
		$("#addForm input[name=id]").val("new");
		$("#addForm input[name=file]").attr("required","true");
		$("#addForm .isglobal").hide();
	});
	$("#data").on('click','.btnEdit',function(){
		var id = $(this).attr('data');
		$.postAjax(base_url + "users/getbyid",{id:id},
			function(data){
				$("#addForm").modal('show');
				$("#addForm .modal-title").html("Edit Users");
				$("#addForm input[name=name]").val(data.name);
				$("#addForm input[name=username]").val(data.username);
			}
		);
	});

	$("#addForm #is_global").change(function(){
		$("#addForm .isglobal").hide();
		$("#addForm input[name=global_code]").removeAttr("required");
		if($(this).is(':checked'))
		{
			$("#addForm .isglobal").show();
			$("#addForm input[name=global_code]").attr("required","true");
		}
	});

	$("#addForm #type").change(function(){
		$("#addForm input[name=value]").attr("data-parsley-max","100");
		if($(this).val() != 'Discount')
		{
			$("#addForm input[name=value]").removeAttr("data-parsley-max");
		}
	});

	$("#data").on('click','.btnDelete',function(){
		var _t = $(this);
		var yes = function(){
			$.postAjax(base_url + "users/delete",{data:$(_t).attr('data')},
				function(){
					dt.fnReloadAjax();
				}
			);

		};
		$.confirm("Do you want to delete the data?",yes);
	});
});
