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
    
    <section id="booking-my-taxi" class="content-section gray">
    	
    	<div class="container">
        	<div class="row">
            	<div class="col-md-6 col-md-offset-3">
				<?php if(isset($error) && $error == '1' ){?>
                <div class="alert alert-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success!</strong> Reset Password Link Sent to Your Email.
                </div>	
                <?php } if(isset($error) && $error == '0' ){?>
                <div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Sorry!</strong> Email Not Registered.
                </div>	
                <?php }?>
                </div>
            	<div class="col-md-6 col-md-offset-3">
                    <div class="scard">
                        <div class="row">
                            <div class="col-sm-12 text-left scard-header">
                                <h4>Forgot Password?</h4>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-sm-12 text-left scard-body">
                        	<form id="forgotpassword" action="<?php echo base_url('forgotpassword')?>" method="post" class="form-horizontal">
                            <br />
                            <div class="form-group">
                              <div class="col-md-12 text-center">
                              <p>Please enter your registered email address to receive password reset link.</p>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="textinput">Email</label>
                              <div class="col-md-6">
                              <input name="Email" type="email" placeholder="Email" class="form-control input-md">
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-yellow btn-block">Submit</button>
                              </div>
                            </div>
                            
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            	
        	</div>
        </div>
    </section>

</div>