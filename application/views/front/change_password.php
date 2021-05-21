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
            	<div class="col-md-6 col-md-offset-3">
				<?php if(isset($error) && $error == '1' ){?>
                <div class="alert alert-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success!</strong> Password changed successfully.
                </div>	
                <?php }
				if(isset($error) && $error == '0' ){?>
                <div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Fail!</strong> Old Password doesn't match.
                </div>	
                <?php } ?>
                </div>
                <div class="col-md-6 col-md-offset-3">
                    <div class="scard">
                        <div class="row">
                            <div class="col-sm-12 text-left scard-header">
                                <h4>Change Password</h4>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-sm-12 text-left scard-body">
                        		<form class="form-horizontal change_pass" action="<?php echo base_url('user/change_password')?>" method="post">
                            
                            <!-- Password input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="passwordinput">Old Password</label>
                              <div class="col-md-7">
                                <input name="OldPassword" type="password" placeholder="Old Password" class="form-control input-md">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="passwordinput">New password</label>
                              <div class="col-md-7">
                                <input id="Password" name="Password" type="password" placeholder="New Password" class="form-control input-md">
                              </div>
                            </div>     
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="passwordinput">Confirm Password</label>
                              <div class="col-md-7">
                                <input name="ConPassword" type="password" placeholder="Confirm Password" class="form-control input-md">
                              </div>
                            </div>                        
                            <!-- Button -->
                            <div class="form-group">
                              <div class="col-md-7 col-md-offset-4">
                                <button type="submit" class="btn btn-yellow btn-block">Update</button>
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