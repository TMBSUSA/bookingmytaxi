<script>
history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
});
</script>
<section id="intro" class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1>Book Taxi for anywhere in United Kingdom</h1>
                </div>
            </div>
        </div>
    </section>
    
    <section class="home-search">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-10 col-md-offset-1">
                	<div class="card">
                    	<form id="booking" class="form-horizontal" method="post" action="<?= base_url('search') ?>" onsubmit="return ValidationEvent()" >
                        
                            <div class="row">
                            <div class="btn-group col-md-offset-1" data-toggle="buttons">
                                <label class="btn active">
                                <input type="radio" name="trip" value="single" checked><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i> <span>  Single Trip</span>
                                </label>
                                <label class="btn">
                                <input type="radio" name="trip" value="round" class="isround"><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i><span> Round Trip</span>
                                </label>
                            </div>
                            
                            <p class="text-right pull-right">
                            	<i class="glyphicon glyphicon-map-marker distance-icon"></i> <font class="distance"></font> &nbsp;&nbsp;
                                <i class="glyphicon glyphicon-time duration-icon"></i> <font class="duration"></font>
                            </p>
                            </div>
                            <br>
                            <!-- Text input-->
                           <div class="row"> 
                              <div class="col-md-offset-1 col-md-5 pick_up">
                              <label>Pick up location</label>
                              <input id="from_loc" name="from_loc" type="text" placeholder="Pick up location" class="form-control input-md from_loc"  >
                              </div>
                              
                              
                              <div class="col-md-5 drop_off">
                              <label>Drop off location</label>
                              <input id="to_loc" name="to_loc" type="text" placeholder="Drop off location" class="form-control input-md to_loc" >
                              </div>
                              
                              <div class="col-md-1 via_btn">
                                  <label>Via</label>
                                  <input type="button" class="btn btn-yellow" value="+" >
                              </div>
                          	</div>
                            <div class="row">    
                              <div class="via">
                              <div class="col-md-offset-1 col-md-10">                              
                                <label>Via</label>
                                <div class="input-group col-md-6">
                                  <input id="via" name="via" type="text" placeholder="Via location" class="form-control input-md via" >
                                  <span class="input-group-btn">
                                    <button class="via_close btn btn-default" type="button">X</button>
                                  </span>
                                </div>
                              </div>
                              </div>
                           	</div>   
                          	<div class="row">    
                              <div class="col-md-offset-1 col-md-5 extra_fields passenger">
                              	  <label>Passenger</label>
                                  <select name="passenger" class="form-control">
                                    <option value="1">1 Passenger</option>
									<?php for($i=2;$i<=16;$i++){ ?>
                                    <option value="<?=$i?>"><?=$i?> Passengers</option>
                                    <?php }?>
                                  </select>
                              </div>
                            
                            
                              <div class="col-md-5 extra_fields luggage">
                              	<label>Luggage</label>
                              	<?php /*?><input id="" name="luggage" type="text" placeholder="Luggage" class="form-control input-md"><?php */?>
                                  <select name="luggage" class="form-control"><!--class=Luggage-->
                                    <option disabled>Luggage</option>
                                    <option value="0" selected>None</option>
                                    <option value="1">1 Suitcase</option>
                                    <?php for($i=2;$i<=16;$i++){ ?>
                                    <option value="<?=$i?>"><?=$i?> Suitcases</option>
                                    <?php }?>
                                  </select>
                              </div>
                            </div>  
                           	<div class="row">
                            
                              <div class="col-md-offset-1 col-md-5 extra_fields pickup_time">
                              	<label>Pick up Date &amp; Time</label>
                              	<input name="pickup" type="text" placeholder="Pickup Date &amp; Time" class="form-control input-md datetimepicker pickuptime" readonly>
                              </div>
                              <div class="col-md-5 drop_time">
                              <label>Return Pick up Date &amp; Time</label>
                              	<input name="drop" type="text" placeholder="Return Pick up Date &amp; Time" class="form-control input-md dropdatetimepicker" readonly>
                              </div>
                            </div>
                            <div class="row">
                            <div class="form-group">  
                              <div class="col-md-12">
                              <div class="col-md-10 col-md-offset-1 submit_btn">
                              	<button type="submit" id="search" class="btn btn-block btn-yellow">Search</button>
                              </div>
                              </div>
                            </div>
                            </div>
                        <input type="hidden" id="MinEndDate" name="MinEndDate" value=""  />
                        <input type="hidden" id="from_lat" name="from_lat" value=""  />
                        <input type="hidden" id="from_lng" name="from_lng" value=""  />
                        <input type="hidden" id="to_lat" name="to_lat" value=""  />
                        <input type="hidden" id="to_lng" name="to_lng" value=""  />
                        <input type="hidden" id="via_lat" name="via_lat" value=""  />
                        <input type="hidden" id="via_lng" name="via_lng" value=""  />
                        <input type="hidden" id="finaldistance" name="finaldistance" value=""  />
                        <input type="hidden" id="finalduration" name="finalduration" value=""  />
                     	</form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="why" class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Why to choose us</h1>
                    <div class="row features">
                    	<div class="col-sm-4 card">
                            <img src="<?= base_url('front/')?>imgs/ic-1.svg" alt=""/> 
                            <h3>Savings</h3>
                            <p>Vestibulum rutrum quam vitae fringilla tincidunt. Suspendisse nec tortor urna. Ut laoreet sodales nisi, quis iaculis nulla iaculis vitae. Donec sagittis faucibus lacus eget blandit. Mauris vitae ultricies metus, at condimentum nulla. Donec quis ornare lacus. Etiam gravida mollis tortor quis porttitor.</p>
                        </div>
                    	<div class="col-sm-4 card">
                            <img src="<?= base_url('front/')?>imgs/ic-2.svg" alt=""/> 
                            <h3>Comparision</h3>
                            <p>Vestibulum rutrum quam vitae fringilla tincidunt. Suspendisse nec tortor urna. Ut laoreet sodales nisi, quis iaculis nulla iaculis vitae. Donec sagittis faucibus lacus eget blandit. Mauris vitae ultricies metus, at condimentum nulla. Donec quis ornare lacus. Etiam gravida mollis tortor quis porttitor.</p>
                        </div>
                    	<div class="col-sm-4 card">
                            <img src="<?= base_url('front/')?>imgs/ic-3.svg" alt=""/> 
                            <h3>Reliable</h3>
                            <p>Vestibulum rutrum quam vitae fringilla tincidunt. Suspendisse nec tortor urna. Ut laoreet sodales nisi, quis iaculis nulla iaculis vitae. Donec sagittis faucibus lacus eget blandit. Mauris vitae ultricies metus, at condimentum nulla. Donec quis ornare lacus. Etiam gravida mollis tortor quis porttitor.</p>
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
                                <img src="<?= base_url('front/')?>imgs/step-1.svg" alt=""/>
                                <p>Log on to www.bookingmytaxi.com</p>
                            </div>
                            <div class="stepwizard-step">
                                <img src="<?= base_url('front/')?>imgs/step-2.svg" alt=""/>
                                <p>Set From - To Location and Pickup date &amp; time</p>
                            </div>
                            <div class="stepwizard-step">
                                <img src="<?= base_url('front/')?>imgs/step-3.svg" alt=""/>
                                <p>Compare Pricing from Taxi Providors near you</p>
                            </div>
                            <div class="stepwizard-step">
                                <img src="<?= base_url('front/')?>imgs/step-4.svg" alt=""/>
                                <p>Pay and Get your ride</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row visible-sm visible-xs small-features">
                <div class="col-sm-6">
                    <img src="<?= base_url('front/')?>imgs/step-1.svg" alt=""/>
                    <p>Log on to <?php echo base_url(); ?></p>
                </div>
                <div class="col-sm-6">
                    <img src="<?= base_url('front/')?>imgs/step-2.svg" alt=""/>
                    <p>Set From - To Location and Pickup date &amp; time</p>
                </div>
                <div class="col-sm-6">
                    <img src="<?= base_url('front/')?>imgs/step-3.svg" alt=""/>
                    <p>Compare Pricing from Taxi Providors near you</p>
                </div>
                <div class="col-sm-6">
                    <img src="<?= base_url('front/')?>imgs/step-4.svg" alt=""/>
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
                    	<div class="col-sm-6">
                        	<div class="benefit-1">
                            	<p>Some text here</p>
                                <h4>Driven by verified drives</h4>
                            </div>
                        </div>
                    	<div class="col-sm-6">
                        	<div class="benefit-2">
                            	<p>Some text here</p>
                                <h4>Driven by verified drives</h4>
                            </div>
                        </div>
                    	<div class="col-sm-6">
                        	<div class="benefit-3">
                            	<p>Some text here</p>
                                <h4>Driven by verified drives</h4>
                            </div>
                        </div>
                    	<div class="col-sm-6">
                        	<div class="benefit-4">
                            	<p>Some text here</p>
                                <h4>Driven by verified drives</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   
<style>
.input-group-btn{width: 0% !important;}
.via>div {padding-bottom: 15px;}
</style> 
   