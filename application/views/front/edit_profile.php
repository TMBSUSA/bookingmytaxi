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
            	<div class="col-md-8 col-md-offset-2">
				<?php if(isset($error) && $error == '1' ){?>
                <div class="alert alert-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success!</strong> Profile Updated Successfully.
                </div>	
                <?php 
				}
				if(isset($error) && $error == '0' ){?>
                <div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Fail!</strong> Email or Contact exist already.
                </div>	
                <?php } ?>
                </div>
                <div class="col-md-8 col-md-offset-2 col-xs-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-sm-12 text-left card-header">
                                <h4>Edit profile</h4>
                            </div>
                        </div>
                    <form class="form-horizontal edit-prof" action="<?php echo base_url('user/profile')?>" method="post">
                    <fieldset class="edit-prof">
                    <div class="form-group">
                    <div class="row error-msg">
                    <div class="col-md-6">
                    	<p><strong>First Name</strong></p>
	                      <input name="FirstName" type="text" value="<?php echo $user['FirstName']?>" class="form-control input-md">
                     </div>
                     <div class="col-md-6">
                    	<p><strong>Last Name</strong></p>
                     	 <input name="LastName" type="text" value="<?php echo $user['LastName']?>" class="form-control input-md">
                     </div>
                    </div>
                    <div class="row error-msg">
                    <div class="col-md-6">
                    	<p><strong>Email</strong></p>
	                      <input name="Email" type="text" value="<?php echo $user['Email']?>" class="form-control input-md">
                     </div>
                     <div class="col-md-6">
                    	<p><strong>Phone No</strong></p>
                     	 <input name="Contact" type="text" value="<?php echo $user['Contact']?>" class="form-control input-md" maxlength="17" onkeypress="return onlyNos(event,this);" >
                     </div>
                      </div>
                      
                    </div>
                    
                    <div class="form-group">
                      <div class="col-md-4 col-md-offset-4">
                        <button class="btn btn-yellow btn-block">Update</button>
                      </div>
                    </div>
                    </fieldset>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<script language="Javascript" type="text/javascript">
 
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