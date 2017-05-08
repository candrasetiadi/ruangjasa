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
	});

	$("#data").on('click','.btn_edit',function(){
		var user_id = $(this).attr('data');
		$("#addForm input[name=id]").val("edit");
		$.postAjax(base_url + "users/get_by_id",
		{
			user_id:user_id
		},
			function(data){
				$("#addForm").modal('show');
				$("#addForm .modal-title").html("Edit Users");
				$("#addForm input[name=user_email]").val(data.user_email);
				$("#addForm input[name=user_name]").val(data.user_name);
				$("#addForm input[name=user_password]").attr("required", false);
				$("#addForm input[name=confirm]").attr("required", false);
				$("#addForm input[name=user_profession]").val(data.user_profession);
				$("#addForm select[name=user_type]").val(data.user_type);
				$("#addForm select[name=user_type]").trigger("chosen:updated");
				$("#addForm select[name=user_status]").val(data.user_status);
				$("#addForm select[name=user_status]").trigger("chosen:updated");
				$("#addForm select[name=user_gender]").val(data.user_gender);
				$("#addForm select[name=user_gender]").trigger("chosen:updated");
				$("#addForm textarea[name=user_address]").val(data.user_address);
				$("#addForm select[name=user_province_id]").val(data.user_province_id);
				$("#addForm select[name=user_province_id]").trigger("chosen:updated");
				$("#addForm input[name=user_phone]").val(data.user_phone);

				$.each(data.city, function(idx, val){
					$("#addForm select[name=user_city_id]").append($("<option></option>")
			            .attr("value", val.id)
			            .text(val.name)
			        );
			        $("#addForm select[name=user_city_id]").val(data.user_city_id);
					$("#addForm select[name=user_city_id]").trigger("chosen:updated");
				});

				$.each(data.district, function(idx, val){
					$("#addForm select[name=user_district_id]").append($("<option></option>")
			            .attr("value", val.id)
			            .text(val.name)
			        );
			        $("#addForm select[name=user_district_id]").val(data.user_district_id);
					$("#addForm select[name=user_district_id]").trigger("chosen:updated");
				});
			}
		);
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

	$(document).on('change', '#user_province_id', function(){
		var user_province_id = $(this).val();

		$.postAjax(base_url + "users/get_city", {
			user_province_id:user_province_id
		},
			function(result){
				$.each(result.data, function(idx, val){
					$("#user_city_id").append($("<option></option>")
			            .attr("value", val.id)
			            .text(val.name)
			        );
			        $("#user_city_id").trigger("chosen:updated");
				});
			}
		);

	});

	$(document).on('change', '#user_city_id', function(){
		var user_city_id = $(this).val();

		$.postAjax(base_url + "users/get_district", {
			user_city_id:user_city_id
		},
			function(result){
				$.each(result.data, function(idx, val){
					console.log(val.id);
					$("#user_district_id").append($("<option></option>")
			            .attr("value", val.id)
			            .text(val.name)
			        );
			        $("#user_district_id").trigger("chosen:updated");
				});
			}
		);

	});
});
