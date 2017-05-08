<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><script src="<?php echo base_url();?>assets/js/views/class_level.js"></script>
<script>
functions.push(function(){
	dt = $("#data").dataTable({
        "sorting": [[0, "asc" ]],
        "processing": true,
        "serverSide": true,
        "ajax": {
	        "url": base_url+'class_level/get',
	        "type": "POST",
	        "data": function(d){
	        	d.ci3csrf = $.cookie('ci3csrf');
	        }
        },
        // "dom": '<"top"iflp<"clear">>rt' ,
        "columns": [
				{
					"data": "class_level_name",
					"title": "Category Name",
					"width": '60%'
				},
				{
					"data": "updated_at",
					"title": "Last Modified",
					"width": '30%'
				},
            	{
            		"data": "action_edit",
            		"title": "",
            		"sortable": false,
            		"width": '5%'
            	},
            	{
            		"data": "action_delete",
            		"title": "",
            		"sortable": false,
            		"width": '5%'
            	}
        ]});

});
</script>

<div class="p20">
	<h1>Class Level</h1>
	<div class="mb20">
		<a data-toggle="modal" href="#addForm" class="btn btn-primary" id="btnAdd"><strong>+</strong> Add</a>
</div>
<div class="travel-table">
	<table class="table table-striped table-hover vertical-middle class dataTable" id="data">
	</table>
</div>

<div id="addForm" class="modal fade" tabindex="-1" data-width="430" style="display: none;" data-focus-on="input:first" >
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    	<h2 class="modal-title">Add Class Level</h2>
	</div>
	<div class="modal-body">
	    <form role="form" class="parsley-validate ajax" action="<?php echo site_url('admin/class_level/process');?>" done="confirmAgain()" clearform>
				<input type="hidden" name="id" value="new" />
				<input type="hidden" name="class_level_id" value="" />
				<div class="row">
					<div class="col-md-12">
				        <div class="form-group">
				            <label for="class_level_name">Class Level Name:</label>
				            <input type="text" id="class_level_name" name="class_level_name" class="form-control" required/>
				        </div>
				        <div class="form-group">
				            <label for="class_level_category_id">Category:</label>
				            <select class="chosen-select" name="class_level_category_id" id="class_level_category_id">
		                        <option value="0"></option>
					            <?php 
$_fh0_data = (isset($this->scope["category"]) ? $this->scope["category"] : null);
if ($this->isTraversable($_fh0_data) == true)
{
	foreach ($_fh0_data as $this->scope['val'])
	{
/* -- foreach start output */
?>
								  	<option value="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'class_level_category_id',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->scope["val"], false);?>"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'class_level_category_name',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->scope["val"], false);?></option>
								<?php 
/* -- foreach end output */
	}
}?>

		                    </select>
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
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>