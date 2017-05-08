var csrf_token_name = "ci3csrf";
var csrf_cookie_name = "ci3csrf";

function inArray(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle) return true;
    }
    return false;
}

$.onLoading = function(message) {
	$(".overlayall").fadeIn();
	$(".loading").fadeIn();
};

$.hideLoading = function() {
	$(".overlayall").fadeOut();
	$(".loading").fadeOut();
	$(".contentData").fadeIn();
};

$.alert = function(message,ok) {
	// alert(message);
	$("#alertContent").html(message);
	$("#alertModal").modal({
    backdrop: 'static',
    keyboard: false
	});
	$("#alertModal").modal("show");
	$(".btnAlertOk").unbind("click");
	$(".btnAlertOk").click(function(){
		if(ok != undefined && typeof(ok) == 'function')
			ok();
		$("#alertModal").modal("hide");
	});
};


$.info = function(message,ok) {
	// alert(message);
	$("#infoContent").html(message);
	$("#infoModal").modal({
    backdrop: 'static',
    keyboard: false
	});
	$("#infoModal").modal("show");
	$(".btnInfoOk").unbind("click");
	$(".btnInfoOk").click(function(){
		if(ok != undefined && typeof(ok) == 'function')
			ok();
		$("#infoModal").modal("hide");
	});
};

$.confirm = function(message,yes,no) {
	$("#confirmContent").html(message);
	$("#confirmModal").modal({
    backdrop: 'static',
    keyboard: false
	});
	$("#confirmModal").modal("show");
	$(".btnConfirmCancel").unbind("click");
	$(".btnConfirmCancel").click(function(){
		if(no != undefined && typeof(no) == 'function')
			no();
		$("#confirmModal").modal("hide");
	});
	$(".btnConfirmOk").unbind("click");
	$(".btnConfirmOk").click(function(){
		if(yes != undefined && typeof(yes) == 'function')
			yes();
		$("#confirmModal").modal("hide");
	});
};


$.prompt = function(message,ok) {
	return prompt(message);
};

$.resetParsley = function(){
	$('form.parsley-validate').each(function(){
		if($(this).parsley() != undefined)
			$(this).parsley().reset();
	});
};

$.clearForm = function(form){
	$(form).find("input[type=text]")
		.val('');
	$(form).find("input[type=file]")
		.val('');
	$(form).find("input[type=password]")
		.val('');
	$(form).find("textarea")
		.val('');
	$(form).find("select option")
		.removeAttr('selected');
	$(form).find("input[type=checkbox]")
		.removeAttr('checked');
	$(form).find("input[type=radio]")
		.removeAttr('checked');
	$(form).find("input[type=radio]")
		.removeAttr('selected');
	$(form).find(".tinymce").each(function(){
		var id = $(this).attr('id');
		var editor = tinymce.get(id);
		if(editor != undefined)
		{
			var val = editor.setContent('');
		}
	});
	$(form).find(".tagitcontrol").each(function(){
		if($.isFunction($.fn.tagit))
		{
			$(this).tagit('removeAll');
		}
	});
};

$.postData = function(formData, url, done, error, form){
	$.ajax({
		type: "POST",
		url: url,
		data: formData,
		processData: false,
		contentType: false,
		dataType:'json',
		beforeSend:function(){
			$.onLoading();
		},
		success: function( response ) {
			$.hideLoading();
			if(response.error_code == 0)
			{

				var ok = function(){
					if(done != undefined && done != '')
					{
						if(typeof(done) == 'function')
							done(response);
						else
							eval(done);
					}
					if(form != undefined)
					{
						if($(form).attr('clearform') != undefined)
							$.clearForm(form);
						$.resetParsley();
					}
				};
				if(response.message != undefined && response.message != '')
					$.info(response.message, ok);
				else
					ok();
			}
			else
			{
				$.alert(response.error);
				if(error != undefined && error != '')
				{
					if(typeof(error) == 'function')
						error(response);
					else
						eval(error);
				}
			}
		},
  error: function(data){
    $.hideLoading();
    $.alert("There's problem in processing your request, please contact your administrator");
  }
	});
}

$.postAjax = function(url,data,done,error){
	var formData = new FormData();
	formData.append(csrf_token_name,$.cookie(csrf_cookie_name));
	$.each(data,function(name,val){
		formData.append(name,val);
	});
	$.postData(formData,url,done,error);
};

$.back = function () {

	window.history.length > 0 ? window.history.go(-1) : $.redirect('');
};

$.redirect = function(url){
	window.location.href = base_url + url;
};

$.closeModal = function() {
	$(".modal").modal('hide');
};

$(document).ready(function(){
	$.ajaxSetup({ async: false });
	$.resetParsley();
	$('.back').click(function(e){
		e.preventDefault();
		$.back();
	});

	$('[data-toggle="modal"]').on('click', function() {
		var href = $(this).attr('href');
		var target = $($(this).attr('data-target') || (href && href.replace(/.*(?=#[^\s]+$)/, '')));
		$.clearForm($(target).find("form"));
		$.resetParsley();
	});

	$("form.ajax").submit(function(e){
		e.preventDefault();
		var form = $(this);
		var data = $(this).serialize();
		var dataSplit = data.split("&");
		var formData = new FormData();
		var arr = {};

		formData.append(csrf_token_name,$.cookie(csrf_cookie_name));
    for(var i=0;i<dataSplit.length;i++)
    {
      var str = dataSplit[i].split("=");
			var val = str[1];
			var attr = $(this).find("input[name='" + unescape(str[0]) +"']").attr('type');
			var exclude = ["checkbox","radio"];
			if($(this).find("input[name='" + unescape(str[0]) +"']").val() != undefined && (typeof attr !== typeof undefined && attr !== false && !inArray(attr,exclude) ))
			{
				val = $(this).find("input[name=" + str[0] +"]").val();
			}

			if($(this).find("select[name='" + unescape(str[0]) + "']").attr('multiple') != undefined)
      {
        if( Object.prototype.toString.call( arr[unescape(str[0])] )  === '[object Array]' ) {
          arr[unescape(str[0])].push(unescape(val));
        }
        else {
          var oldval = arr[unescape(str[0])];
          arr[unescape(str[0])] = new Array();
          // arr[unescape(str[0])].push(oldval);
          arr[unescape(str[0])].push(unescape(val));
        }
      }
      else if(arr[unescape(str[0])] != undefined)
			{
				if( Object.prototype.toString.call( arr[unescape(str[0])] )  === '[object Array]' ) {
					arr[unescape(str[0])].push(unescape(val));
				}
				else {
					var oldval = arr[unescape(str[0])];
					arr[unescape(str[0])] = new Array();
					arr[unescape(str[0])].push(oldval);
					arr[unescape(str[0])].push(unescape(val));
				}
			}
			else
				arr[unescape(str[0])] = unescape(val);
      /*console.log(str[0]);
      console.log($(this).find("input[name=" + str[0] +"]").length > 1);*/
      if($(this).find("input[name=" + str[0] +"]").length > 1 && Object.prototype.toString.call( arr[unescape(str[0])] )  !== '[object Array]' && (typeof attr !== typeof undefined && attr !== false && !inArray(attr,['radio']) ) )
      {
        arr[unescape(str[0])] = new Array();
        arr[unescape(str[0])].push(unescape(val));
      }
		}
		$(this).find('input[type=file]').each(function(){
			var files = $(this)[0].files;
			// formData.append($(this).attr('name'),files[0]);
			var name = $(this).attr('name');
			if(name != undefined && name != '')
				arr[name] = files[0];
		});
		$(this).find('.tinymce').each(function(){
			var id = $(this).attr('id');
			var editor = tinymce.get(id);
			if(editor != undefined)
			{
				var val = editor.getContent();
				arr[id] = val;
			}
		});

		for (var key in arr) {
			if(arr[key] instanceof Array)
			{
				for(var i in arr[key])
					formData.append(key + "[]", arr[key][i]);
			}
			else
				formData.append(key, arr[key]);
		}
		$.postData(formData,$(form).attr( 'action' ), $(form).attr('done'), $(form).attr('error'), form);
	});

	$(".modal-footer .btn-primary").click(function(e){
		$(this).parent().parent().find("form").submit();
	});

  $('.chosen-select').each(function(){
    $(this).chosen();
  });

  if($.fn.modal.defaults != undefined)
  {
  	$.fn.modal.defaults.keyboard = false;
  	$.fn.modal.defaults.backdrop = 'static';
  }
});
