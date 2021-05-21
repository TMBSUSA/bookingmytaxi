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
    
    
    <section id="intro" class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1>Devon’s Taxi Comparison service. Get a fixed price now.</h1>
                </div>
            </div>
        </div>
    </section>
    
    <section class="home-search">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-10 col-md-offset-1">
                	<div class="card">
                    	<form class="form-horizontal">
                        <fieldset>
                        
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn active">
                            <input type="radio" name="trip" checked><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i> <span>  Single Trip</span>
                            </label>
                            <label class="btn">
                            <input type="radio" name="trip"><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i><span> Round Trip</span>
                            </label>
                        </div>
                        <!--<p class="text-right pull-right hidden-xs"><i class="glyphicon glyphicon-map-marker"></i> Distance &nbsp;&nbsp;<i class="glyphicon glyphicon-time"></i> 2 Hrs.</p>-->
                        <br><br>

                        <div class="form-group">
                          <div class="col-sm-6">
                          <input id="textinput1" name="textinput" type="text" placeholder="Pick up address" class="form-control input-md">
                          </div>
                          <div class="col-sm-6">
                          <input id="textinput2" name="textinput" type="text" placeholder="Drop off address" class="form-control input-md">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <div class="col-sm-6">
                          <input id="textinput1" name="textinput" type="text" placeholder="Pick up time" class="form-control input-md">
                          </div>
                          <div class="col-sm-6">
                          <input id="textinput2" name="textinput" type="text" placeholder="Drop off time" class="form-control input-md">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <div class="col-sm-6">
                          <select id="selectbasic" name="selectbasic" class="form-control">
                            <option value="0" selected disabled>Select Pessanger</option>
                            <option value="1">Option one</option>
                            <option value="2">Option two</option>
                          </select>
                          </div>
                          <div class="col-sm-6">
                          <input id="textinput" name="textinput" type="text" placeholder="To" class="form-control input-md">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-12">
                          <a href="search.php" class="btn btn-block btn-yellow">Search</a>
                          </div>
                        </div>
                        
                        
                        
                        </fieldset>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--<section class="home-search">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-10 col-md-offset-1">
                	<div class="card">
                    	<form class="form-horizontal">
                        <fieldset>
                        
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn active">
                            <input type="radio" name="trip" checked><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i> <span>  Single Trip</span>
                            </label>
                            <label class="btn">
                            <input type="radio" name="trip"><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i><span> Round Trip</span>
                            </label>
                        </div>
                        <p class="text-right pull-right"><i class="glyphicon glyphicon-map-marker"></i> Distance &nbsp;&nbsp;<i class="glyphicon glyphicon-time"></i> 2 Hrs.</p>
                        <br><br>

                        <div class="form-group">
                          <div class="col-sm-4">
                          <input id="textinput1" name="textinput" type="text" placeholder="Pick up address" class="form-control input-md">
                          </div>
                          <div class="col-sm-4">
                          <input id="textinput2" name="textinput" type="text" placeholder="Drop off address" class="form-control input-md">
                          </div>
                          <div class="col-sm-4">
                          <input id="textinput3" name="textinput" type="text" placeholder="Pickup date &amp; time" class="form-control input-md">
                          </div>
                        </div>
                        

                        <div class="form-group">
                          <div class="col-sm-4">
                          <select id="selectbasic" name="selectbasic" class="form-control">
                            <option value="0" selected disabled>Select Pessanger</option>
                            <option value="1">Option one</option>
                            <option value="2">Option two</option>
                          </select>
                          </div>
                          <div class="col-sm-6">
                          <input id="textinput" name="textinput" type="text" placeholder="To" class="form-control input-md">
                          </div>
                          <div class="col-sm-2">
                          <button id="singlebutton" name="singlebutton" class="btn btn-block btn-yellow">Search</button>
                          </div>
                        </div>
                        
                        </fieldset>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>-->

    <!-- About Section -->
    <section id="why" class="content-section after-search">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Why to choose us</h1>
                    <div class="row features">
                    	<div class="col-sm-4 card">
                            <img src="imgs/ic-1.svg" alt=""/> 
                            <h3>Savings</h3>
                            <p>The price quoted is the price you will pay for your journey, so no more calling taxi companies  to find the best deal. By using booking my taxi you will be saving yourself time and money. We work hard for you to get you the best price for your taxi journey.</p>
                        </div>
                    	<div class="col-sm-4 card">
                            <img src="imgs/ic-2.svg" alt=""/> 
                            <h3>Comparision</h3>
                            <p>Booking my Taxi compares fares from local taxi cab provider in your area. Our site provides you with a fixed priced quote dependant on your specific journey. We aim to make it easy for you to make the right choice depending on price and feedback from other customers.</p>
                        </div>
                    	<div class="col-sm-4 card">
                            <img src="imgs/ic-3.svg" alt=""/> 
                            <h3>Reliable</h3>
                            <p>We only work with licenced taxi cab providers who are experienced in providing an excellent service. Our simple and quick booking system makes sure your journey is drama-free and that you have a great customer experience.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="steps" class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h1>Easy steps to book a taxi for all your need</h1>
                </div>
            </div>
            <div class="row visible-md visible-lg">
                <div class="col-md-12">
                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <img src="imgs/step-1.svg" alt=""/>
                                <p>Log on to www.bookingmytaxi.com</p>
                            </div>
                            <div class="stepwizard-step">
                                <img src="imgs/step-2.svg" alt=""/>
                                <p>Set From - To Location and Pickup date &amp; time</p>
                            </div>
                            <div class="stepwizard-step">
                                <img src="imgs/step-3.svg" alt=""/>
                                <p>Compare Pricing from Taxi Providors near you</p>
                            </div>
                            <div class="stepwizard-step">
                                <img src="imgs/step-4.svg" alt=""/>
                                <p>Pay and Get your ride</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row visible-sm visible-xs small-features">
                <div class="col-sm-6">
                    <img src="imgs/step-1.svg" alt=""/>
                    <p>Log on to www.bookingmytaxi.com</p>
                </div>
                <div class="col-sm-6">
                    <img src="imgs/step-2.svg" alt=""/>
                    <p>Set From - To Location and Pickup date &amp; time</p>
                </div>
                <div class="col-sm-6">
                    <img src="imgs/step-3.svg" alt=""/>
                    <p>Compare Pricing from Taxi Providors near you</p>
                </div>
                <div class="col-sm-6">
                    <img src="imgs/step-4.svg" alt=""/>
                    <p>Pay and Get your ride</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="benefits" class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1>More benefits of BookingMyTaxi.com</h1>
                    <div class="row" id="benelist">
                    	<div class="col-sm-6 bottom-right">
                        	<div class="benefit-1">
                            	<p>Safety is a must</p>
                                <h4>Driven by verified drivers</h4>
                            </div>
                        </div>
                    	<div class="col-sm-6 bottom-left">
                        	<div class="class">
                        	<div class="benefit-2">
                            	<p>24 hrs availability</p>
                                <h4>Get a taxi for all your needs</h4>
                            </div>
                            </div>
                        </div>
                    	<div class="col-sm-6 right-only">
                        	<div class="benefit-3">
                            	<p>A to B</p>
                                <h4>Attractive Fixed Rate Fare</h4>
                            </div>
                        </div>
                    	<div class="col-sm-6 left-only">
                        	<div class="benefit-4">
                            	<p>Comparison</p>
                                <h4>Save Time and Money</h4>
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
