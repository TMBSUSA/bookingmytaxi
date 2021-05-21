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
                  <strong>Success!</strong> Registration Successful.
                </div>	
                <?php 
				header( "refresh:2;url=".base_url('login') );
				} if(isset($error) && $error == '0' ){?>
                <div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Sorry!</strong> Email or Mobile already registered.
                </div>	
                <?php }?>
                </div>
            	<div class="col-md-6 col-md-offset-3">
                    <div class="scard">
                        <div class="row">
                            <div class="col-sm-12 text-left scard-header">
                                <h4>Register</h4>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-sm-12 text-left scard-body">
                        	<form id="register" class="form-horizontal" action="<?= base_url('register#booking-my-taxi') ?>" method="post">
                            
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="textinput">Name</label>
                              <div class="col-md-4">
                              <input id="FirstName" name="FirstName" type="text" placeholder="First Name" class="form-control input-md">
                              </div>
                              <div class="col-md-4">
                              <input id="LastName" name="LastName" type="text" placeholder="Last Name" class="form-control input-md">
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="passwordinput">Email</label>
                              <div class="col-md-8">
                              <input id="Email" name="Email" type="email" placeholder="Email Address" class="form-control input-md" >
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="passwordinput">Phone No</label>
                              <div class="col-md-8">
                              <input id="Contact" name="Contact" type="text" placeholder="Phone No" class="form-control input-md"  maxlength="17" onkeypress="return onlyNos(event,this);">
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="passwordinput">Password</label>
                              <div class="col-md-8">
                                <input id="Password" name="Password" type="password" placeholder="Password" class="form-control input-md"  >
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <div class="col-md-8 col-md-offset-3">
                                <input class="submit btn btn-yellow btn-block register-submit" type="submit" value="Submit" />
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="Login"></label>
                              <div class="col-md-8">
                            	<p><a href="<?php echo base_url('login')?>" class="forgotpassword">Already have an account? Sign in</a></p>
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
<script language="Javascript" type="text/javascript">
page = 'register';
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