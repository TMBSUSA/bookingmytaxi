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
    
    
    <section class="content-section gray">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-4 col-md-offset-4">
                    <div class="scard">
                        <div class="row">
                            <div class="col-sm-12 text-left scard-header">
                                <h4>Sign in</h4>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-sm-12 text-left scard-body">
                        		<form class="form-horizontal">
                            <fieldset>
                            
                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="textinput">Email</label>
                              <div class="col-md-8">
                              <input id="textinput" name="textinput" type="text" placeholder="Email" class="form-control input-md">
                              </div>
                            </div>
                            
                            <!-- Password input-->
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="passwordinput">Password</label>
                              <div class="col-md-8">
                                <input id="passwordinput" name="passwordinput" type="Password" placeholder="placeholder" class="form-control input-md">
                              </div>
                            </div>
                            
                            
                            <!-- Password input-->
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="passwordinput"></label>
                              <div class="col-md-8">
                            	<p><a href="forgotpassword.php" class="forgotpassword">Forgot password?</a></p>
                              </div>
                            </div>
                            
                            
                            
                            <!-- Button -->
                            <div class="form-group">
                              <div class="col-md-5 col-md-offset-3">
                                <button id="singlebutton" name="singlebutton" class="btn btn-yellow btn-block">Sign in</button>
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

    
    <?php include_once("footer-credits.php"); ?>
    <?php include_once("footer-assets.php"); ?>
    </div>
</body>
</html>
