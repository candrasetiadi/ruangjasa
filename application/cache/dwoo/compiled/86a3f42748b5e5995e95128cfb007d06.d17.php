<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $this->scope["template"]["title"];?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap-modal.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap-modal-bs3fix.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/admin/css/custom.css" rel="stylesheet">
    <!-- <link href="<?php echo base_url();?>assets/admin/css/sb-admin.css" rel="stylesheet"> -->

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/js/plugins/datatables/css/jquery.dataTables.css" />

    <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/js/plugins/datatables/css/dataTables.bootstrap.css" /> -->

    <link rel="stylesheet" href="<?php echo base_url();?>assets/js/plugins/datatables/css/theme.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/js/plugins/datatables/css/responsive.bootstrap.min.css" />

    <link href="<?php echo base_url();?>assets/admin/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/js/plugins/chosen/chosen.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/js/plugins/parsley/parsley.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/js/plugins/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/js/plugins/datepicker/bootstrap-datepicker.min.css" rel="stylesheet" />

    <!-- jQuery -->


    <script>
        var base_url = '<?php echo base_url();?>admin/';
        var functions = new Array();
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>">Guru Online</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->scope["fullname"];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo site_url('admin/profile');?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#" class="logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                  <?php 
$_fh2_data = (isset($this->scope["menus"]) ? $this->scope["menus"] : null);
if ($this->isTraversable($_fh2_data) == true)
{
	foreach ($_fh2_data as $this->scope['key']=>$this->scope['value'])
	{
/* -- foreach start output */
?>
                    <?php if (($this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'child',  ),  3 =>   array (    0 => '',    1 => '',  ),), (isset($this->scope["value"]) ? $this->scope["value"]:null), true) !== null)) {
?>
                      <li class="havemenu <?php 
$_fh0_data = $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'child',  ),  3 =>   array (    0 => '',    1 => '',  ),), (isset($this->scope["value"]) ? $this->scope["value"]:null), true);
if ($this->isTraversable($_fh0_data) == true)
{
	foreach ($_fh0_data as $this->scope['key2']=>$this->scope['value2'])
	{
/* -- foreach start output */

if ((isset($this->scope["key2"]) ? $this->scope["key2"] : null) == (isset($this->scope["state"]) ? $this->scope["state"] : null)) {
?>active<?php 
}

/* -- foreach end output */
	}
}?>">
                        <a href="#" class="js-slide"><i class="fa <?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'class',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->scope["value"], false);?>"></i><?php echo $this->scope["key"];?><span class="caret"></span></a>
                        <ul>
                          <?php 
$_fh1_data = $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'child',  ),  3 =>   array (    0 => '',    1 => '',  ),), (isset($this->scope["value"]) ? $this->scope["value"]:null), true);
if ($this->isTraversable($_fh1_data) == true)
{
	foreach ($_fh1_data as $this->scope['key2']=>$this->scope['value2'])
	{
/* -- foreach start output */
?>
                            <li class="<?php if ((isset($this->scope["key2"]) ? $this->scope["key2"] : null) == (isset($this->scope["state"]) ? $this->scope["state"] : null)) {
?>active<?php 
}?>">
                              <a href="<?php echo site_url('admin/'.(isset($this->scope["key2"]) ? $this->scope["key2"] : null).'');?>"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'title',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->scope["value2"], false);?></a>
                            </li>
                          <?php 
/* -- foreach end output */
	}
}?>

                        </ul>
                      </li>
                    <?php 
}
else {
?>
                      <li class="<?php if ((isset($this->scope["state"]) ? $this->scope["state"] : null) == (isset($this->scope["key"]) ? $this->scope["key"] : null)) {
?>active<?php 
}?>">
                        <a href="<?php echo site_url('admin/'.(isset($this->scope["key"]) ? $this->scope["key"] : null).'');?>"><i class="fa <?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'class',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->scope["value"], false);?>"></i><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'title',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->scope["value"], false);?></a>
                      </li>
                    <?php 
}?>

                  <?php 
/* -- foreach end output */
	}
}?>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

        <div class="container-fluid">
          <?php echo $this->scope["template"]["body"];?>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <div class="overlayall"></div>
  	<div class="loading">
  		<ul class="loader">
  			<li></li>
  			<li></li>
  			<li></li>
  		</ul>
  	</div>

    	<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-width="360">
    	  <!-- <div class="modal-dialog"> -->
    	    <div class="modal-content">
          	<div class="modal-header">
          	    	<h2 class="modal-title text-center">Confirmation</h2>
          	</div>
    	      <div class="modal-body text-center">
    	          <p id="confirmContent"></p>
    	          <div class="row">
    	              <div class="col-sm-6">
    	                  <a href="#" class="btn btn-default btn-block btnConfirmCancel">Cancel</a>
    	              </div>
    	              <div class="col-sm-6">
    	                  <a href="#" class="btn btn-primary btn-block btnConfirmOk">Ok</a>
    	              </div>
    	          </div>
    	      </div>
    	    </div>
    	  <!-- </div> -->
    	</div>
    	<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-width="360">
    	  <!-- <div class="modal-dialog"> -->
    	    <div class="modal-content">
          	<div class="modal-header">
          	    	<h2 class="modal-title text-center">Information</h2>
          	</div>
    	      <div class="modal-body text-center">
    	          <p id="infoContent"></p>
    	          <div class="row">
    	              <div class="col-sm-12">
    	                  <a href="#" class="btn btn-primary btn-block btnInfoOk">Ok</a>
    	              </div>
    	          </div>
    	      </div>
    	    </div>
    	  <!-- </div> -->
    	</div>
    	<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-width="360">
    	  <!-- <div class="modal-dialog"> -->
    	    <div class="modal-content">
          	<div class="modal-header">
          	    	<h2 class="modal-title text-center">Warning</h2>
          	</div>
    	      <div class="modal-body text-center">
    	          <p id="alertContent"></p>
    	          <div class="row">
    	              <div class="col-sm-12">
    	                  <a href="#" class="btn btn-danger btn-block btnAlertOk">Ok</a>
    	              </div>
    	          </div>
    	      </div>
    	    </div>
    	  <!-- </div> -->
    	</div>

      <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
      <script src="<?php echo base_url();?>assets/js/plugins/chosen/jquery.chosen.js"></script>
      <script src="<?php echo base_url();?>assets/js/plugins/jquery.cookie.js"></script>
      <script src="<?php echo base_url();?>assets/js/plugins/parsley/parsley.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/plugins/datatables/js/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/plugins/datatables/dataTables.fnReloadAjax.js"></script>
      <script src="<?php echo base_url();?>assets/js/plugins/datatables/js/dataTables.responsive.min.js"></script>


      <script src="<?php echo base_url();?>assets/js/plugins/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>

    	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/tinymce/tinymce.min.js"></script>
    	<script src="<?php echo base_url();?>assets/js/plugins/tinymce/jquery.tinymce.min.js"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/bootstrap-modalmanager.js"></script>
      <script src="<?php echo base_url();?>assets/js/bootstrap-modal.js"></script>
      <script src="<?php echo base_url();?>assets/js/plugins/datepicker/bootstrap-datepicker.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/functions.js"></script>


      <?php if (((isset($this->scope["succ_msg"]) ? $this->scope["succ_msg"] : null) !== null)) {
?>
          <script>
              functions.push(function(){
                $.info('<?php echo $this->scope["succ_msg"];?>');
              });
            </script>
      <?php 
}?>

      <?php if (((isset($this->scope["err_msg"]) ? $this->scope["err_msg"] : null) !== null)) {
?>
          <script>
              functions.push(function(){
                $.alert('<?php echo $this->scope["err_msg"];?>');
              });
            </script>
      <?php 
}?>

      <script src="<?php echo base_url();?>assets/js/global.js"></script>
      <script src="<?php echo base_url();?>assets/js/admin.js"></script>
</body>
</html>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>