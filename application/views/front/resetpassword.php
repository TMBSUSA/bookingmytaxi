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
                  <strong>Success!</strong> Password reset successfully.
                </div>	
                <?php header( "refresh:2;url=".base_url('login') );
				}?>
                </div>
            	<div class="col-md-6 col-md-offset-3">
                    <div class="scard">
                        <div class="row">
                            <div class="col-sm-12 text-left scard-header">
                                <h4>Reset Password?</h4>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-sm-12 text-left scard-body">
                        	<form id="resetpassword" action="<?php echo base_url('reset_password/'.$ResetKey)?>" method="post" class="form-horizontal">
                            <br />
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="textinput">Password</label>
                              <div class="col-md-7">
                              <input id="Password" name="Password" type="password" placeholder="Password" class="form-control input-md">
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="textinput">Confirm Password</label>
                              <div class="col-md-7">
                              <input name="ConPassword" type="password" placeholder="Confirm Password" class="form-control input-md">
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <div class="col-md-7 col-md-offset-4">
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