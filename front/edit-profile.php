<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>Booking My Taxi</title>
    <?php include_once("header.php"); ?>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" class="wrap">
    <?php include_once("top-nav.php"); ?>
    <div class="in-wrap">
    
    <section id="intro" class="intro-section2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1></h1>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content-section search-results">
    	<div class="container-fluid">
        	<div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-sm-12 text-left card-header">
                                <h4>Edit profile</h4>
                            </div>
                        </div>
                        
                        
                        <form class="form-horizontal">
                    <fieldset class="edit-prof">
                    
                    <!-- Text input-->
                    <div class="form-group">
                    <div class="row">
                    <div class="col-md-6">
                    	<p><strong>Edit First Name</strong></p>
	                      <input id="textinput" name="textinput" type="text" placeholder="placeholder" class="form-control input-md">
                     </div>
                     <div class="col-md-6">
                    	<p><strong>Edit Last Name</strong></p>
                     	 <input id="textinput" name="textinput" type="text" placeholder="placeholder" class="form-control input-md">
                     </div>
                      </div>
                      <div class="row">
                    <div class="col-md-6">
                    	<p><strong>Edit Email</strong></p>
	                      <input id="textinput" name="textinput" type="text" placeholder="placeholder" class="form-control input-md">
                     </div>
                     <div class="col-md-6">
                    	<p><strong>Edit Contact Number</strong></p>
                     	 <input id="textinput" name="textinput" type="text" placeholder="placeholder" class="form-control input-md">
                     </div>
                      </div>
                      
                    </div>
                    
                    <!-- Button -->
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <button id="singlebutton" name="singlebutton" class="btn btn-yellow btn-block">Update</button>
                      </div>
                    </div>
                    
                    </fieldset>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<section class="content-section gray">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-6 col-md-offset-3">
                    <div class="scard">
                        <div class="row">
                            <div class="col-sm-12 text-left scard-header">
                                <h4>Change Password</h4>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-sm-12 text-left scard-body">
                        		<form class="form-horizontal">
                            <fieldset>
                            
                            <!-- Password input-->
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="passwordinput">Enter current password</label>
                              <div class="col-md-8">
                                <input id="passwordinput" name="passwordinput" type="password" placeholder="Password" class="form-control input-md">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="passwordinput">Enter new password</label>
                              <div class="col-md-8">
                                <input id="passwordinput" name="passwordinput" type="password" placeholder="Password" class="form-control input-md">
                              </div>
                            </div>     
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="passwordinput">Confirm new password</label>
                              <div class="col-md-8">
                                <input id="passwordinput" name="passwordinput" type="password" placeholder="Password" class="form-control input-md">
                              </div>
                            </div>                        
                            <!-- Button -->
                            <div class="form-group">
                              <div class="col-md-5 col-md-offset-3">
                                <button id="singlebutton" name="singlebutton" class="btn btn-yellow btn-block">Update</button>
                              </div>
                            </div>
                            
                            </fieldset>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 	<section class="content-section search-results">
    	<div class="container-fluid">
        	<div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-sm-12 text-left card-header">
                                <h4>Booking History</h4>
                            </div>
                        </div>
                        <div class="row card-content b-history">
                            <div class="col-sm-4 col-xs-6 text-left">
                                <h4>Cab Provider</h4>
                                <p><i class="glyphicon glyphicon-map-marker"></i> &nbsp;London &nbsp; <i class="zmdi zmdi-arrow-right zmdi-hc-lg"></i> &nbsp; Sansf</p>
                               
                            </div>
                            <div class="col-sm-4 col-xs-6 text-left">
                            <h4></h4>
                                <p><i class="glyphicon glyphicon-time icn"></i> Date : disp date</p>
                                <p><i class="glyphicon glyphicon-time icn"></i> Time : disp time</p>
                            </div>
                            <div class="col-sm-2 col-xs-6 text-left">
                            	<p>Booking id</p>
                                <h4>1237689</h4>
                                
                                
                            </div>
                            <div class="col-sm-2 col-xs-6 text-left">
                            		<p>Paid amount</p>
                                 <h4>456</h4>
                                
                            </div>
                        </div>
                        <div class="row card-content b-history">
                            <div class="col-sm-4 col-xs-6 text-left">
                                <h4>Cab Provider</h4>
                                <p><i class="glyphicon glyphicon-map-marker"></i> &nbsp;London &nbsp; <i class="zmdi zmdi-arrow-right zmdi-hc-lg"></i> &nbsp; Sansf</p>
                               
                            </div>
                            <div class="col-sm-4 col-xs-6 text-left">
                            <h4></h4>
                                <p><i class="glyphicon glyphicon-time icn"></i> Date : disp date</p>
                                <p><i class="glyphicon glyphicon-time icn"></i> Time : disp time</p>
                            </div>
                            <div class="col-sm-2 col-xs-6 text-left">
                            	<p>Booking id</p>
                                <h4>1237689</h4>
                                
                                
                            </div>
                            <div class="col-sm-2 col-xs-6 text-left">
                            		<p>Paid amount</p>
                                 <h4>456</h4>
                                
                            </div>
                        </div>
                        <div class="row card-content b-history">
                            <div class="col-sm-4 col-xs-6 text-left">
                                <h4>Cab Provider</h4>
                                <p><i class="glyphicon glyphicon-map-marker"></i> &nbsp;London &nbsp; <i class="zmdi zmdi-arrow-right zmdi-hc-lg"></i> &nbsp; Sansf</p>
                               
                            </div>
                            <div class="col-sm-4 col-xs-6 text-left">
                            <h4></h4>
                                <p><i class="glyphicon glyphicon-time icn"></i> Date : disp date</p>
                                <p><i class="glyphicon glyphicon-time icn"></i> Time : disp time</p>
                            </div>
                            <div class="col-sm-2 col-xs-6 text-left">
                            	<p>Booking id</p>
                                <h4>1237689</h4>
                                
                                
                            </div>
                            <div class="col-sm-2 col-xs-6 text-left">
                            		<p>Paid amount</p>
                                 <h4>456</h4>
                                
                            </div>
                        </div>
                        <div class="row card-content b-history">
                            <div class="col-sm-4 col-xs-6 text-left">
                                <h4>Cab Provider</h4>
                                <p><i class="glyphicon glyphicon-map-marker"></i> &nbsp;London &nbsp; <i class="zmdi zmdi-arrow-right zmdi-hc-lg"></i> &nbsp; Sansf</p>
                               
                            </div>
                            <div class="col-sm-4 col-xs-6 text-left">
                            <h4></h4>
                                <p><i class="glyphicon glyphicon-time icn"></i> Date : disp date</p>
                                <p><i class="glyphicon glyphicon-time icn"></i> Time : disp time</p>
                            </div>
                            <div class="col-sm-2 col-xs-6 text-left">
                            	<p>Booking id</p>
                                <h4>1237689</h4>
                                
                                
                            </div>
                            <div class="col-sm-2 col-xs-6 text-left">
                            		<p>Paid amount</p>
                                 <h4>456</h4>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once("footer-credits.php"); ?>
    <?php include_once("footer-assets.php"); ?>
    </div>
</body>
</html>
