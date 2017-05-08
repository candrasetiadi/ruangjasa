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
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/client/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/client/css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/client/css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/client/css/magnific-popup.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/client/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/client/css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/client/css/style.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="fh5co-loader"></div>
    <div id="page">
        <nav class="fh5co-nav" role="navigation">
            <div class="top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <p class="num">Call: +01 123 456 7890</p>
                            <ul class="fh5co-social">
                                <li><a href="#"><i class="icon-twitter"></i></a></li>
                                <li><a href="#"><i class="icon-dribbble"></i></a></li>
                                <li><a href="#"><i class="icon-github"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-1">
                            <div id="fh5co-logo"><a href="index.html">Learn<span>.</span></a></div>
                        </div>
                        <div class="col-xs-11 text-right menu-1">
                            <ul>
                                <li class="active"><a href="index.html">Home</a></li>
                                <li><a href="courses.html">Courses</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                                <li class="has-dropdown">
                                    <a href="blog.html">Blog</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Web Design</a></li>
                                        <li><a href="#">eCommerce</a></li>
                                        <li><a href="#">Branding</a></li>
                                        <li><a href="#">API</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                                <li class="btn-cta"><a href="#"><span>Login</span></a></li>
                                <li class="btn-cta"><a href="#"><span>Create a Course</span></a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </nav>
             <?php echo $this->scope["template"]["body"];?>

    </div>
    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>
    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/client/js/jquery.js"></script>
    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>

    <script>
        var base_url = '<?php echo base_url();?>';
    </script>
    <script src="<?php echo base_url();?>assets/js/functions.js"></script>
    <script src="<?php echo base_url();?>assets/js/global.js"></script>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/client/js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="<?php echo base_url();?>assets/client/js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>assets/client/js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="<?php echo base_url();?>assets/client/js/jquery.waypoints.min.js"></script>
    <!-- Stellar Parallax -->
    <script src="<?php echo base_url();?>assets/client/js/jquery.stellar.min.js"></script>
    <!-- Carousel -->
    <script src="<?php echo base_url();?>assets/client/js/owl.carousel.min.js"></script>
    <!-- countTo -->
    <script src="<?php echo base_url();?>assets/client/js/jquery.countTo.js"></script>
    <!-- Magnific Popup -->
    <script src="<?php echo base_url();?>assets/client/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url();?>assets/client/js/magnific-popup-options.js"></script>
    <!-- Main -->
    <script src="<?php echo base_url();?>assets/client/js/main.js"></script>
</body>
</html>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>