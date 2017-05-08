{$test|@var_dump}
<script src="{base_url()}assets/js/views/voucher.js"></script>
<script>
functions.push(function(){
	dt = $("#data").dataTable({
        "sorting": [[0, "asc" ]],
        "processing": true,
        "serverSide": true,
        "ajax": {
	        "url": base_url+'voucher/get',
	        "type": "POST",
	        "data": function(d){
	        	d.ci3csrf = $.cookie('ci3csrf');
	        }
        },
        // "dom": '<"top"iflp<"clear">>rt' ,
        "columns": [
            	{
            		"data": "createdate",
            		"title": "Date",
            		"width": '15%'
            	},
            	{
            		"data": "title",
            		"title": "Title",
            		"width": '15%'
            	},
            	{
            		"data": "image",
            		"title": "Image",
            		"width": '15%',
            		"sortable": false
            	},
            	{
            		"data": "action",
            		"title": "",
            		"sortable": false,
            		"width": '15%'
            	}
        ]});
});
</script>

<div class="p20">
	<h1>Voucher</h1>
	<div class="mb20">
		<a data-toggle="modal" href="#addForm" class="btn btn-primary" id="btnAdd"><strong>+</strong> Add</a>
</div>
<div class="travel-table">
	<table class="table table-striped table-hover vertical-middle class dataTable" id="data">
	</table>
</div>

<div id="addForm" class="modal fade" tabindex="-1" data-width="400" style="display: none;" data-focus-on="input:first" >
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    	<h2 class="modal-title">Add Voucher</h2>
	</div>
	<div class="modal-body">
	    <form role="form" class="parsley-validate ajax" action="{site_url('admin/voucher/process')}" done="confirmAgain()" clearform>
				<input type="hidden" name="id" value="new" />
	        <div class="form-group">
	            <label for="name">Name:</label>
	            <input type="text" id="name" name="name" class="form-control" required/>
	        </div>
	        <div class="form-group">
	            <label for="start_date">Start Date:</label>
	            <input type="text" id="start_date" name="start_date" class="form-control datepicker" required/>
	        </div>
	        <div class="form-group">
	            <label for="end_date">End Date:</label>
	            <input type="text" id="end_date" name="end_date" class="form-control datepicker" required data-parsley-laterthan="start_date"/>
	        </div>
	        <div class="form-group">
	            <label for="is_global">Global:</label>
	            <input type="checkbox" id="is_global" name="is_global"/>
	        </div>
	        <div class="form-group isglobal">
	            <label for="global_code">Global Code:</label>
	            <input type="text" id="global_code" name="global_code" class="form-control"/>
	        </div>
	        <div class="form-group">
	            <label for="type">Type:</label>
	            <select id="type" name="type" class="form-control chosen-select" data-placeholder="Select a type">
								<option></option>
								<option value="Discount">Discount</option>
								<option value="Number">Number</option>
							</select>
	        </div>
	        <div class="form-group">
	            <label for="value">Value:</label>
	            <input type="text" id="value" name="value" class="form-control" required data-parsley-min="1" data-parsley-max="100"/>
	        </div>
	    </form>
	</div>
	 <div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
		<button type="button" class="btn btn-primary">Save changes</button>
	</div>
</div>
