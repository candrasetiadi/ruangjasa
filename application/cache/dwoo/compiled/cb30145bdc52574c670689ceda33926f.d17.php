<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="candra" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <title><?php echo $this->scope["template"]["title"];?></title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/client/login/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/client/login/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/client/login/css/style.css">


    <!-- Modernizr JS -->
    <script src="<?php echo base_url();?>assets/client/login/js/modernizr-2.6.2.min.js"></script>
    
</head>

<body>
    <?php echo $this->scope["template"]["body"];?>


    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/client/login/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>assets/client/login/js/bootstrap.min.js"></script>
    <!-- Placeholder -->
    <script src="<?php echo base_url();?>assets/client/login/js/jquery.placeholder.min.js"></script>
    <!-- Waypoints -->
    <script src="<?php echo base_url();?>assets/client/login/js/jquery.waypoints.min.js"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url();?>assets/client/login/js/main.js"></script>
    
</body>
</html>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>