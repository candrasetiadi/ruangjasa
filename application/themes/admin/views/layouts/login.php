<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{$template.title}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{base_url()}assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{base_url()}assets/css/bootstrap-modal.css" rel="stylesheet">
    <link href="{base_url()}assets/css/bootstrap-modal-bs3fix.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{base_url()}assets/admin/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{base_url()}assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{base_url()}assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="{base_url()}assets/admin/css/style.css" rel="stylesheet" type="text/css">
    <link href="{base_url()}assets/js/plugins/chosen/chosen.css" rel="stylesheet" />
    <link href="{base_url()}assets/js/plugins/parsley/parsley.css" rel="stylesheet" type="text/css">
    <!-- jQuery -->



    <script>
        var base_url = '{base_url()}';
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

    <div id="wrapper" class="login">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="{base_url()}">CI 2</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
            </ul>
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
                {$template.body}
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

  <script src="{base_url()}assets/js/jquery.js"></script>
  <script src="{base_url()}assets/js/plugins/chosen/jquery.chosen.js"></script>
  <script src="{base_url()}assets/js/plugins/jquery.cookie.js"></script>
  <script src="{base_url()}assets/js/plugins/parsley/parsley.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="{base_url()}assets/js/bootstrap.min.js"></script>
  <script src="{base_url()}assets/js/bootstrap-modalmanager.js"></script>
  <script src="{base_url()}assets/js/bootstrap-modal.js"></script>
  <script src="{base_url()}assets/js/functions.js"></script>

  {if isset($succ_msg)}
    <script>
        functions.push(function(){
          $.info('{$succ_msg}');
        });
      </script>
  {/if}
  {if isset($err_msg)}
      <script>
          functions.push(function(){
            $.alert('{$err_msg}');
          });
        </script>
  {/if}
  <script src="{base_url()}assets/js/global.js"></script>
</body>

</html>
