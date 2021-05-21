<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="<?= base_url('front/imgs/favicon.png') ?>">   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $page_title ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('front/')?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url('front/')?>css/moweb.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
	<?php
    	if(isset($css) && !empty($css))
		{
			foreach($css as $link)
			{
				echo $link;
			}
		}
	?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
#ui-datepicker-div{z-index: 3 !important;}
.title-header{background-color: #4c4d4d; color: #FFF;}
label.error {color: red; font-weight: 100;}
input.error {border:1px solid red !important}
select.error {border:1px solid red !important}
.temp-hidden{display:none}
.btn-edit{padding: 0px 20px; height: 38px;}
input[type="password"]{outline: none !important;box-shadow: none !important;border: 1px solid #eee;}
input[type="email"]{outline: none !important;box-shadow: none !important;border: 1px solid #eee; }
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover{color: #fff !important;}
.payment p{color: #333333 !important;}
.error-msg {text-align: left;}
.star-rating {font-size: 32px !important;}
</style>
<script>
var base_url = '<?= base_url() ?>';
var page = '';
</script> 
</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->
<?php if($this->uri->segment('1') == "booking_detail" or $this->uri->segment('3') == "booking")
{
	$home_link = base_url()."home/clear";
}
else
{
	$home_link = base_url();	
} ?>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle mobile-nav" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="<?= $home_link; ?>"><img class="logo" src="<?= base_url('front/imgs/logo.png') ?>"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?= $home_link; ?>">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">About us</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">FAQs</a>
                    </li>
                    <?php if(!$this->session->userdata('user_logged_in')){ ?>
                    <li>
                        <a class="page-scroll" href="<?= base_url('login#booking-my-taxi'); ?>">Login</a>
                    </li>
                    <?php }else{?>
                    
                    <li class="dropdown">
                        <a class="page-scroll dropdown-toggle" href="signin.php"  data-toggle="dropdown">Hi, <?php echo $this->session->userdata('username'); ?></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url('user/profile'); ?>">My Profile</a></li>
                            <li><a href="<?= base_url('user/booking'); ?>">My Booking</a></li>
                            <li><a href="<?= base_url('user/change_password'); ?>">Change Password</a></li>
                            <li><a href="<?= base_url('logout'); ?>">Logout</a></li>
                        </ul>
                    </li>
                    	
					<?php }?>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>