var dt = null;
function confirmAgain(){
	dt.fnReloadAjax();
	if($("#addForm").find('form input[name=id]').val() == 'new')
	{
		var no = function(){
			$.closeModal();
		}
		$.confirm("Do you want to add another news?",undefined,no);
	}
	else
	{
		$.closeModal();
	}
}
functions.push(function(){
	$("#btnAdd").click(function(){
		$("#addForm .modal-title").html("Add News");
		$("#addForm input[name=id]").val("new");
		$("#addForm input[name=file]").attr("required","true");
	});
	$("#data").on('click','.btnEdit',function(){
		var id = $(this).attr('data');
		$.postAjax(base_url + "news/getbyid",{id:id},
			function(data){
				$("#addForm").modal('show');
				$("#addForm .modal-title").html("Edit News");
				$("#addForm input[name=id]").val(data.id);
				$("#addForm input[name=title]").val(data.title);
				var e = $("#addForm #body").attr('id');
				var editor = tinymce.get(e);
				editor.setContent(data.body);
				$("#addForm input[name=file]").removeAttr("required");
			}
		);
	});
	$("#data").on('click','.btnDelete',function(){
		var _t = $(this);
		var yes = function(){
			$.postAjax(base_url + "news/delete",{data:$(_t).attr('data')},
				function(){
					dt.fnReloadAjax();
				}
			);

		};
		$.confirm("Do you want to delete the data?",yes);
	});
});
