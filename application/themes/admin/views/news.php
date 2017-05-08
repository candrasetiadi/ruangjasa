{$test|@var_dump}
<script src="{base_url()}assets/js/views/news.js"></script>
<script>
functions.push(function(){
	dt = $("#data").dataTable({
        "sorting": [[0, "asc" ]],
        "ajax": {
	        "url": base_url+'news/get'
        },
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
	<h1>News</h1>
	<div class="mb20">
		<a data-toggle="modal" href="#addForm" class="btn btn-primary" id="btnAdd"><strong>+</strong> Add</a>
</div>
<div class="travel-table">
	<table class="table table-striped table-hover vertical-middle class dataTable" id="data">
	</table>
</div>

<div id="addForm" class="modal fade" tabindex="-1" data-width="800" style="display: none;" data-focus-on="input:first" >
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    	<h2 class="modal-title">Add News</h2>
	</div>
	<div class="modal-body">
	    <form role="form" class="parsley-validate ajax" action="{site_url('admin/news/process')}" done="confirmAgain()" clearform>
				<input type="hidden" name="id" value="new" />
				<div class="row">
					<div class="col-md-12">
		        <div class="form-group">
		            <label for="title">Title:</label>
		            <input type="text" id="title" name="title" class="form-control" required/>
		        </div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
		        <div class="form-group">
		            <label for="file">File:</label>
		            <input type="file" id="file" name="file" class="form-control" accept="image"/>
		            <dfn class="small">Recommended size: 1110x400 px</dfn>
		        </div>
					</div>
					<div class="col-md-8">
		        <div class="form-group">
		            <label for="body">Description:</label>
								<div id="body" class="tinymce form-control" style="min-height:250px;" required></div>
		        </div>
					</div>
				</div>
	    </form>
	</div>
	 <div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
		<button type="button" class="btn btn-primary">Save changes</button>
	</div>
</div>
