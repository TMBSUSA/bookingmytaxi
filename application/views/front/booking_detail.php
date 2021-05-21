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
    
    <section id="search-results" class="content-section search-results">
    	<div class="container-fluid">
            <div class="col-md-8">
            	<div class="card">
                    <div class="row">
                        <div class="col-sm-12 text-left card-header">
                            <h4>Payment Details</h4>
                        </div>
                    </div>
                    <div class="row card-content">
                    <?php if(!$this->session->userdata('user_logged_in')){ ?>
                    <div class="col-sm-12 passanger">
					  <div class="tabbable-line-log">	
                        <ul class="nav nav-tabs">
                          <li><a class="register_page" data-toggle="tab" href="#register_tab">Register</a></li>
                          <li class="active"><a class="login_page" data-toggle="tab" href="#login_tab">Login</a></li>
                        </ul>
                        
                        <div class="tab-content">
                          <div id="register_tab" class="tab-pane fade">
                            <div class="row">
                            	<br />
                                <?php if(isset($error) && $error == '0' ){?>
                                <div class="alert alert-danger">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  <strong>Sorry!</strong> Email or Mobile already registered.
                                </div>	
                                <?php }?>	
                                
                                <form id="register" action="<?php echo base_url('user/register/booking') ?>" method="post" >
                                <div class="col-sm-12 text-left scard-body">
                               	<div class="row">
                                <div class="form-group">
                                  <label class="col-md-3 control-label text-right" for="textinput">Name</label>
                                  <div class="col-md-4">
                                  <input type="text" name="FirstName" placeholder="First Name" class="form-control input-md register-firstname">
                                  </div>
                                  <div class="col-md-4">
                                  <input type="text" name="LastName" placeholder="Last Name" class="form-control input-md register-lastname">
                                  </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group">
                                  <label class="col-md-3 control-label text-right" for="passwordinput">Email</label>
                                  <div class="col-md-8">
                                  <input type="text" name="Email" placeholder="Email Address" class="form-control input-md register-email" >
                                  </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group">
                                  <label class="col-md-3 control-label text-right" for="passwordinput">Phone No</label>
                                  <div class="col-md-8">
                                  <input type="text" name="Contact" placeholder="Contact Number" class="form-control input-md register-phone" maxlength="17" onkeypress="return onlyNos(event,this);">
                                  </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group">
                                  <label class="col-md-3 control-label text-right" for="passwordinput">Password</label>
                                  <div class="col-md-8">
                                    <input type="password" name="Password" placeholder="Password" class="form-control input-md register-password" >
                                  </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="form-group">
                                  <div class="col-md-8 col-md-offset-3">
                                    <input class="btn btn-yellow btn-block btn-register register-submit" type="submit" value="Submit" />
                                  </div>
                                </div>
                                </div>
                                </div>
                                </form>
                            </div>  
                          </div>
                          <div id="login_tab" class="tab-pane fade in active">
                           	<div class="row">
                            	<br />
                                
                                <?php if(isset($error) && $error == '10' ){?>
                                <div class="alert alert-danger">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  <strong>Sorry!</strong> Incorrect Email or Password.
                                </div>	
                                <?php }?>
                				<form id="login" action="<?php echo base_url('user/validate_credentials/booking') ?>" method="post" >
                                <div class="col-sm-12 text-left scard-body">
                                
                                <div class="form-group">
                                  <label class="col-md-3 control-label text-right" for="Email">Email</label>
                                  <div class="col-md-8">
                                  <input name="Email" type="text" placeholder="Email Address" class="form-control input-md login-email">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-md-3 control-label text-right" for="Password">Password</label>
                                  <div class="col-md-8">
                                    <input name="Password" type="password" placeholder="Password" class="form-control input-md login-password">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <div class="col-md-8 col-md-offset-3">
                                    <button type="submit" class="btn btn-yellow btn-block btn-login login-submit">Sign in</button>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                	<div class="col-md-8 col-md-offset-3">
                                    	<div class="col-md-12 ">
                                			<h3 class="or-line"><span>OR</span></h3>
                                        </div>
                                	</div>
                                </div>
                                
                                <div class="form-group">
                                <div class="col-md-4 col-md-offset-3">
                                    <a href="<?php echo $authUrl ?>" class="btn btn-fb btn-block"><i class="fa fa-facebook bt-icn" aria-hidden="true"></i>Login with Facebook</a>
                                </div>
                                <div class="col-md-4">
                                    <a href="https://accounts.google.com/o/oauth2/auth?response_type=code&amp;redirect_uri=http%3A%2F%2Fmowebify.com%2Fbookingmytaxi%2Fuser%2Fvalidate_credentials%2F&amp;client_id=827628162385-8vcemurdcmra2rbv9tmglrit8qhiu2n2.apps.googleusercontent.com&amp;scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email&amp;access_type=offline&amp;approval_prompt=force" class="btn btn-gl btn-block"><i class="fa fa-google-plus bt-icn" aria-hidden="true"></i>Login with Google</a>
                                </div>
                                </div>
                                
                                </div>
                                </form>
                            </div>  
                          </div>
                        </div>
                      </div>  
                    </div>
                    <?php }?>
                    <div class="col-sm-12 payment <?php if(!$this->session->userdata('user_logged_in')){ echo "temp-hidden"; }?>">
                        <!--<div class="alert alert-success alert-login-success temp-hidden">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Success!</strong> Login Successful.
                        </div>
                        <div class="alert alert-success alert-register-success temp-hidden">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Success!</strong> Register Successful.
                        </div>-->
<?php 
	if($trip == 'round') 
	{
		$finalfare = $TotalFare + $TotalFare2;
	}
	else
	{
		$finalfare = $TotalFare;
	} 
?>                        
						<div class="user-details temp-hidden">		
                            <div class="row cont">
                                <div class="col-md-12 text-left">
                                    <p class="user-name"><strong>Name:</strong>&nbsp;&nbsp;</p>
                                </div>
                                <div class="col-md-12 text-left user-email-div">
                                    <p class="user-email"><strong>Email:</strong>&nbsp;&nbsp;</p>
                                </div>
                                <div class="col-md-12 text-left user-contact-div">
                                    <p class="user-contact"><strong>Contact:</strong>&nbsp;&nbsp;</p>
                                </div>
                                <div class="col-md-12 text-left">
                                    <p><strong>Fare:</strong> <?php echo CURRENCY.$finalfare ?></p>
                                </div>
                            </div>
                      	</div>  
                        		
                    <form id="passenger" action="<?= base_url('payment') ?>" method="POST">                        
                       	<div class="form-group">
                            <script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button pay"
                                data-key="<?php echo STRIPE_PUBLISH ?>"
                                data-amount="<?php echo $finalfare * 100 ?>"
                                data-name="Booking My Taxi"
                                data-description="Payment"
                                data-image="<?= base_url('front/imgs/logo_round.png') ?>"
                                data-locale="auto"
                                data-currency="gbp"
                                data-zip-code="false">
                            </script>
                            
                        </div>
                      	<input type="hidden" name="PID" value="<?= $PID ?>"  />
                        <input type="hidden" name="Fare" value="<?= $Fare ?>"  />
                        <input type="hidden" name="Commission" value="<?= $Commission ?>"  />
                        <input type="hidden" name="CommissionOnFare" value="<?= $CommissionOnFare ?>"  />
                        <input type="hidden" name="TotalFare" value="<?= $TotalFare ?>"  />
                        <input type="hidden" name="NeededCar" value="<?= $NeededCar ?>"  />
                        
                        <input type="hidden" id="from_loc" name="from_loc" value="<?= $from_loc ?>"  />
                        <input type="hidden" id="to_loc" name="to_loc" value="<?= $to_loc ?>"  />
                        <input type="hidden" id="via" name="via" value="<?= $via ?>"  />
                        <input type="hidden" id="trip" name="trip" value="<?= $trip ?>"  />
                        <input type="hidden" id="pickup" name="pickup" value="<?= $pickup ?>"  />
                    	<input type="hidden" id="drop" name="drop" value="<?= $drop ?>"  />
                        <input type="hidden" id="passenger" name="passenger" value="<?= $passenger ?>"  />
                    	<input type="hidden" id="luggage" name="luggage" value="<?= $luggage ?>"  />
                        <input type="hidden" name="going_out_end" value="<?= $going_out_end ?>" id="going_out_end"  />
                        <input type="hidden" name="ReturnEnd" value="<?= $ReturnEnd ?>" id="ReturnEnd"  />
                        
						<?php if($trip == 'round') {?> 
                        <input type="hidden" name="PID2" value="<?= $PID2 ?>"  />
                        <input type="hidden" name="Fare2" value="<?= $Fare2 ?>"  />
                        <input type="hidden" name="Commission2" value="<?= $Commission2 ?>"  />
                        <input type="hidden" name="CommissionOnFare2" value="<?= $CommissionOnFare2 ?>"  />
                        <input type="hidden" name="TotalFare2" value="<?= $TotalFare2 ?>"  />
						<?php } ?>
                        
                    </form>
                    </div>
                    </div>
                </div>
            </div>
        	<div class="col-md-4 text-p">
                <div class="card">
                    <div class="row">
                        <div class="col-sm-12 text-left card-header">
                            <h4 class="pull-left">Going Out</h4>
                            <form id="realdata" action="<?php echo base_url('search'); ?>" method="post">
                            	<input type="hidden" id="from_loc" name="from_loc" value="<?= $from_loc ?>"  />
                                <input type="hidden" id="to_loc" name="to_loc" value="<?= $to_loc ?>"  />
                                <input type="hidden" id="via" name="via" value="<?= $via ?>"  />
                                <input type="hidden" id="trip" name="trip" value="<?= $trip ?>"  />
                                <input type="hidden" id="pickup" name="pickup" value="<?= $pickup ?>"  />
                                <input type="hidden" id="drop" name="drop" value="<?= $drop ?>"  />
                                <input type="hidden" id="passenger" name="passenger" value="<?= $passenger ?>"  />
                                <input type="hidden" id="luggage" name="luggage" value="<?= $luggage ?>"  />
                                <input type="hidden" name="from_lat" value="<?= $from_lat ?>" id="from_lat"  />
                                <input type="hidden" name="from_lng" value="<?= $from_lng ?>" id="from_lng"  />
                                <input type="hidden" name="to_lat" value="<?= $to_lat ?>" id="to_lat"  />
                                <input type="hidden" name="to_lng" value="<?= $to_lng ?>" id="to_lng"  />
                            	<button type="submit" class="pull-right btn btn-yellow btn-edit">Edit</button>
                            </form>
                        </div>
                    </div>
                    <br />
                    <div class="row cont">
                        <div class="col-md-12 text-left">
                            <p><strong>From:</strong>&nbsp;&nbsp;<?= $from_loc ?></p>
                        </div>
                    </div>
                    <?php if($via != ''){?>
					<div class="row cont">
                        <div class="col-md-12 text-left">
                            <p><strong>Via:</strong>&nbsp;&nbsp;<?= $via ?></p>
                        </div>
                    </div>	
					<?php }?>
                    <div class="row cont">
                        <div class="col-md-12 text-left">
                            <p><strong>To:</strong>&nbsp;&nbsp;<?= $to_loc ?></p>
                        </div>
                    </div>
                    <div class="row cont">
                        <div class="col-md-12 text-left">
                            <p><strong>Pick Up:</strong>&nbsp;&nbsp;<?= $pickup ?></p>
                        </div>
                    </div>
                    <div class="row cont">
                        <div class="col-md-12 text-left">
                            <p><strong><span class="glyphicon glyphicon-user icn"></span>Passenger:</strong>&nbsp;&nbsp;<?= $passenger ?></p>
                        </div>
                    </div>
                    <div class="row cont">
                        <div class="col-md-12 text-left">
                            <p><strong><span class="glyphicon glyphicon-briefcase icn"></span>Luggage:</strong>&nbsp;&nbsp;<?= $luggage ?></p>
                        </div>
                    </div>
                 </div>
                <?php 
				if($trip == 'round') 
				{ ?>
                 <div class="card">
                    <div class="row">
                        <div class="col-sm-12 text-left card-header">
                            <h4 class="pull-left">Return</h4>
                            <form action="<?php echo base_url('search'); ?>" method="post">
                            	<input type="hidden" id="from_loc" name="from_loc" value="<?= $from_loc ?>"  />
                                <input type="hidden" id="to_loc" name="to_loc" value="<?= $to_loc ?>"  />
                                <input type="hidden" id="via" name="via" value="<?= $via ?>"  />
                                <input type="hidden" id="trip" name="trip" value="<?= $trip ?>"  />
                                <input type="hidden" id="pickup" name="pickup" value="<?= $pickup ?>"  />
                                <input type="hidden" id="drop" name="drop" value="<?= $drop ?>"  />
                                <input type="hidden" id="passenger" name="passenger" value="<?= $passenger ?>"  />
                                <input type="hidden" id="luggage" name="luggage" value="<?= $luggage ?>"  />
                                <input type="hidden" name="from_lat" value="<?= $from_lat ?>" id="from_lat"  />
                                <input type="hidden" name="from_lng" value="<?= $from_lng ?>" id="from_lng"  />
                                <input type="hidden" name="to_lat" value="<?= $to_lat ?>" id="to_lat"  />
                                <input type="hidden" name="to_lng" value="<?= $to_lng ?>" id="to_lng"  />
                            	<button type="submit" class="pull-right btn btn-yellow btn-edit">Edit</button>
                            </form>
                        </div>
                    </div>
                    <br />
                    <div class="row cont">
                        <div class="col-md-12 text-left">
                            <p><strong>From:</strong>&nbsp;&nbsp;<?= $to_loc ?></p>
                        </div>
                    </div>
                    <div class="row cont">
                        <div class="col-md-12 text-left">
                            <p><strong>To:</strong>&nbsp;&nbsp;<?= $from_loc ?></p>
                        </div>
                    </div>
                    <div class="row cont">
                        <div class="col-md-12 text-left">
                            <p><strong>Pick Up:</strong>&nbsp;&nbsp;<?= $drop ?></p>
                        </div>
                    </div>
                    <div class="row cont">
                        <div class="col-md-12 text-left">
                            <p><strong><span class="glyphicon glyphicon-user icn"></span>Passenger:</strong>&nbsp;&nbsp;<?= $passenger ?></p>
                        </div>
                    </div>
                    <div class="row cont">
                        <div class="col-md-12 text-left">
                            <p><strong><span class="glyphicon glyphicon-briefcase icn"></span>Luggage:</strong>&nbsp;&nbsp;<?= $luggage ?></p>
                        </div>
                    </div>
                 </div>
                <?php  
                } ?>
            </div>
        </div>    	
    </section>
</div>
<script>
var page = 'login';
$('.register_page').click(function () {
	page = 'register';
});
$('.login_page').click(function () {
	page = 'login';
});

history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
	$('#realdata').submit();
});
        function onlyNos(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }
            catch (err) {
                alert(err.Description);
            }
        }
 
    </script>