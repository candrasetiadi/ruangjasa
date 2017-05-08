<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><script src="<?php echo base_url();?>assets/js/views/users.js"></script>
<script>
functions.push(function(){
	dt = $("#data").dataTable({
        "sorting": [[0, "asc" ]],
        "processing": true,
        "serverSide": true,
        "ajax": {
	        "url": base_url+'users/get',
	        "type": "POST",
	        "data": function(d){
	        	d.ci3csrf = $.cookie('ci3csrf');
	        }
        },
        // "dom": '<"top"iflp<"clear">>rt' ,
        "columns": [
				{
					"data": "user_email",
					"title": "Email",
					"width": '10%'
				},
            	{
            		"data": "user_name",
            		"title": "Name",
            		"width": '20%'
            	},
            	{
            		"data": "user_address",
            		"title": "Address",
            		"width": '25%'
            	},
            	{
            		"data": "user_city_id",
            		"title": "City",
            		"width": '10%'
            	},
            	{
            		"data": "user_phone",
            		"title": "Phone",
            		"width": '10%'
            	},
            	{
            		"data": "user_status",
            		"title": "Status",
            		"width": '10%'
            	},
            	{
            		"data": "last_login",
            		"title": "Last Login",
            		"width": '10%'
            	},
            	{
            		"data": "action",
            		"title": "",
            		"sortable": false,
            		"width": '5%'
            	}
        ]});
});
</script>

<div class="p20">
	<h1>Users</h1>
	<div class="mb20">
		<a data-toggle="modal" href="#addForm" class="btn btn-primary" id="btnAdd"><strong>+</strong> Add</a>
</div>
<div class="travel-table">
	<table class="table table-striped table-hover vertical-middle class dataTable" id="data">
	</table>
</div>

<div id="addForm" class="modal fade" tabindex="-1" data-width="1290" style="display: none;" data-focus-on="input:first" >
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    	<h2 class="modal-title">Add Users</h2>
	</div>
	<div class="modal-body">
	    <form role="form" class="parsley-validate ajax" action="<?php echo site_url('admin/users/process');?>" done="confirmAgain()" clearform>
				<input type="hidden" name="id" value="new" />
				<div class="row">
					<div class="col-md-6">
				        <div class="form-group">
				            <label for="user_email">Email:</label>
				            <input type="email" id="user_email" name="user_email" class="form-control" required data-parsley-type="email"/>
				        </div>
				        <div class="form-group">
				            <label for="user_name">Name:</label>
				            <input type="text" id="user_name" name="user_name" class="form-control" required/>
				        </div>
				        <div class="form-group">
				            <label for="password">Password:</label>
				            <input type="password" id="password" name="password" class="form-control" required/>
				        </div>
				        <div class="form-group">
				            <label for="confirm">Confirm:</label>
				            <input type="password" id="confirm" name="confirm" class="form-control" required data-parsley-equalto="#password"/>
				        </div>
				        
				        <div class="form-group">
				            <label for="user_profession">Profession:</label>
				            <input type="text" id="user_profession" name="user_profession" class="form-control" required/>
				        </div>
				        <div class="form-group">
				            <label for="user_type">User Type:</label>
				            <select class="chosen-select" name="user_type">
		                        <option value="0"></option>
							  	<option value="admin">Admin</option>
							  	<option value="teacher">Teacher</option>
							  	<option value="student">Student</option>
		                    </select>
				        </div>
				        <div class="form-group">
				            <label for="user_status">User Status:</label>
				            <select class="chosen-select" name="user_status">
		                        <option value="0"></option>
							  	<option value="active">Active</option>
							  	<option value="inactive">Inactive</option>
		                    </select>
				        </div>
				        <div class="form-group">
				            <label for="user_gender">Gender</label>
				            <select class="chosen-select" name="user_gender">
		                        <option value="0"></option>
							  	<option value="men">Men</option>
							  	<option value="women">Women</option>
		                    </select>
				        </div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
				            <label for="user_address">Address:</label>
				            <textarea type="text" id="user_address" name="user_address" class="form-control" required></textarea>
				        </div>
				        <div class="form-group">
				            <label for="user_province_id">Province:</label>
				            <select class="chosen-select" name="user_province_id">
		                        <option value="0"></option>
					            <?php 
$_fh0_data = (isset($this->scope["provinces"]) ? $this->scope["provinces"] : null);
if ($this->isTraversable($_fh0_data) == true)
{
	foreach ($_fh0_data as $this->scope['val'])
	{
/* -- foreach start output */
?>
								  	<option value="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'id',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->scope["val"], false);?>"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'name',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->scope["val"], false);?></option>
								<?php 
/* -- foreach end output */
	}
}?>

		                    </select>
				        </div>
				        <div class="form-group">
				            <label for="user_city_id">City:</label>
				            <select class="chosen-select" name="user_city_id">
		                        <option value="0"></option>
					            <?php 
$_fh1_data = (isset($this->scope["cities"]) ? $this->scope["cities"] : null);
if ($this->isTraversable($_fh1_data) == true)
{
	foreach ($_fh1_data as $this->scope['val'])
	{
/* -- foreach start output */
?>
								  	<option value="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'id',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->scope["val"], false);?>"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'name',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->scope["val"], false);?></option>
								<?php 
/* -- foreach end output */
	}
}?>

		                    </select>
				        </div>
				        <div class="form-group">
				            <label for="user_district_id">Districts:</label>
				            <select class="chosen-select" name="user_district_id">
		                        <option value="0"></option>
					            <?php 
$_fh2_data = (isset($this->scope["districts"]) ? $this->scope["districts"] : null);
if ($this->isTraversable($_fh2_data) == true)
{
	foreach ($_fh2_data as $this->scope['val'])
	{
/* -- foreach start output */
?>
								  	<option value="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'id',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->scope["val"], false);?>"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'name',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->scope["val"], false);?></option>
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