var tinymceConfig = {
		theme: "modern",
		inline: true,
		statusbar: false,
		menubar: false,
		plugins: [
		   ["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker"],
	        ["searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking"],
	        ["save table contextmenu directionality emoticons template paste"],
	        ["preview wordcount"]
	    ],
			paste_as_text: true,
			paste_word_valid_elements: "b,strong,i,em,h1,h2,p",
			paste_webkit_styles: "",
    	paste_retain_style_properties: "",
			paste_merge_formats: true,
	    add_unload_trigger: false,
	    schema: "html5",
	    toolbar: "undo redo | bold italic | link",
    	paste_data_images: true,
	    style_formats:[
        {title: "Title", format: "h4"},
        {title: "Sub Title", format: "h5"},
        {title: "Paragraph", format: "p"},
        {title: "Blockquote", format: "blockquote"}
	    ],
	    // readonly: true,
	    extended_valid_elements:"*[*]",
	    save_onsavecallback: function() {
	    	// saveData();
	    	return;
	    },
	    valid_elements : "form[action],input[type|value],img,img[src]",
	    //for resizing image in bdesk_photo
	    new_resized_width: 360,
	    new_resized_height: 480
	};

function run()
{
	if(functions == undefined)
		return;
  for(var i in functions)
  {
    functions[i]();
  }
}

$(document).ready(function(){

	if($.fn.dataTable != undefined)
	{
		$.extend( $.fn.dataTable.defaults, {
	    "pageLength": 10,
			"processing": true,
			"serverSide": true,
			"responsive": true,
			"ajax": {
				"type": "POST",
				"data": function(d){
					d.ci3csrf = $.cookie('ci3csrf');
				}
			}/*,
			"dom": '<"top"iflp<"clear">>rtp'*/
		} );
	}

	$(".logout").click(function(e){
		e.preventDefault();
		$.confirm("Are you sure to logout?",
			function(){
				$.redirect('logout');
			}
		);
	});

	$('.datepicker').each(function(){
		$(this).datepicker({
	  		format: "yyyy-mm-dd",
				autoclose: true
	  	});
	});

	$('.tinymce').each(function(){
		$(this).tinymce(tinymceConfig);
	});


	window.ParsleyValidator
	.addValidator('laterthan', function (value, requirement) {
		var currDT = Date.parse(value);
		var reqDT = Date.parse($(requirement).val());
	  return reqDT < currDT
	}, 32)
	.addMessage('en', 'laterthan', 'This value must be later than %s');

	window.ParsleyValidator
	.addValidator('laterorequalthan', function (value, requirement) {
		var currDT = Date.parse(value);
		var reqDT = Date.parse($(requirement).val());
	  return reqDT <= currDT
	}, 32)
	.addMessage('en', 'laterthan', 'This value must be later or equal than %s');

	window.ParsleyValidator.addValidator('cek_phone', 
		function (value, requirement) {
			if(isNaN(value)) {
				return false;
			} else {
				return true;
			}
			
		}, 32)
	.addMessage('en', 'cek_phone', 'This value should be a valid phone number');
	
	run();
});
