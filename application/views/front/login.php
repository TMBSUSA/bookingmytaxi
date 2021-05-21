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
				<?php if(isset($error) && $error == '10' ){?>
                <div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Sorry!</strong> Incorrect Email or Password.
                </div>	
                <?php }?>
                </div>
                <div class="col-md-6 col-md-offset-3">
                    <div class="scard">
                        <div class="row">
                            <div class="col-sm-12 text-left scard-header">
                                <h4>Sign in</h4>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-sm-12 text-left scard-body">
                        	<form id="login" class="form-horizontal" <?= base_url('login#booking-my-taxi') ?> method="post">
                            
                            <div class="form-group">
                              <label class="col-md-3 control-label text-right" for="textinput">Email</label>
                              <div class="col-md-8">
                              <input id="Email" name="Email" type="text" placeholder="Email Address" class="form-control input-md">
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="col-md-3 control-label text-right" for="passwordinput">Password</label>
                              <div class="col-md-8">
                                <input id="Password" name="Password" type="password" placeholder="Password" class="form-control input-md">
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="passwordinput"></label>
                              <div class="col-md-8">
                            	<p><a href="<?php echo base_url('forgotpassword')?>" class="forgotpassword">Forgot password?</a></p>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <div class="col-md-8 col-md-offset-3">
                                <input type="submit" class="btn btn-yellow btn-block login-submit" value="Sign in">
                              </div>
                            </div>
                            
                            
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="passwordinput"></label>
                              <div class="col-md-8">
                            	<p>
                                <a href="<?php echo base_url('register')?>" class="forgotpassword">Don't have an account? Sign Up</a>
                                </p>
                              </div>
                            </div>
                           
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <h3 class="or-line"><span>OR</span></h3>
                                </div>
                            </div>
                                
                           	<div class="form-group">
                                <div class="col-md-5 col-md-offset-1">
                                    <a href="<?php echo $authUrl;?>" class="btn btn-fb btn-block"><i class="fa fa-facebook bt-icn" aria-hidden="true"></i>Login with Facebook</a>
                                </div>
                                <div class="col-md-5">
                                    <a href="<?php echo $authUrlGoogle; ?>" class="btn btn-gl btn-block"><i class="fa fa-google-plus bt-icn" aria-hidden="true"></i>Login with Google</a>
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
<script>
page = 'login';
</script>