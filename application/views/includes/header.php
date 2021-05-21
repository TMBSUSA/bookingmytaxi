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
    <link href="<?= base_url()?>theme/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= base_url()?>theme/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url()?>theme/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?= base_url()?>theme/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url()?>theme/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="<?= base_url()?>theme/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url()?>theme/vendor/bootstrap/js/bootstrap.min.js"></script>
<style>
.error{color:#F00}
</style> 
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url('admin') ?>"><?= TITLE ?></a>
            </div>
            <!-- /.navbar-header -->


            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-taxi fa-fw"></i> Taxi Companies<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?= base_url('admin/providers/add/') ?>">Create Taxi Company</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/providers/') ?>">List of Taxi Companies</a>
                                </li>
                            </ul>
                        </li>
                        
                        <?php /*?><li>
                            <a href="#"><i class="fa fa-calendar-times-o fa-fw"></i> Holidays<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?= base_url('admin/holidays/add/') ?>">Create Holidays</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/holidays/') ?>">List of Holidays</a>
                                </li>
                            </ul>
                        </li><?php */?>
                        <li>
                            <a href="#"><i class="fa fa-area-chart fa-fw"></i> Cities<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?= base_url('admin/city/add/') ?>">Add City</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/city/') ?>">List of Cities</a>
                                </li>
                            </ul>
                        </li>
                        
                       	<li>
                            <a href="<?= base_url('admin/user/') ?>"><i class="fa fa-user fa-fw"></i> Users</a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/booking/') ?>"><i class="fa fa-book fa-fw"></i> List of Booking</a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/special_fare/') ?>"><i class="fa fa-globe fa-fw"></i> Global Settings</a>
                        </li>
                       	
                        <li>
                            <a href="<?= base_url('admin/admin/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        
        <!-- /#page-wrapper -->

    
