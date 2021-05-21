<?php echo validation_errors(); ?>
<?php echo form_open('admin/'.$this->comman_class.'/edit/'.$user['ID'],array("class"=>"form-horizontal")); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit <?= $this->title ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    
	<div class="form-group">
		<label for="FirstName" class="col-md-2">First Name </label>
		<div class="col-md-4">
			<input type="text" name="FirstName" value="<?php echo ($this->input->post('FirstName') ? $this->input->post('FirstName') : $user['FirstName']); ?>" class="form-control" id="FirstName" pattern="[A-Za-z]+" oninvalid="setCustomValidity('Enter only Alphabets')" oninput="setCustomValidity('')" />
		</div>
	</div>
	<div class="form-group">
		<label for="LastName" class="col-md-2">Last Name</label>
		<div class="col-md-4">
			<input type="text" name="LastName" value="<?php echo ($this->input->post('LastName') ? $this->input->post('LastName') : $user['LastName']); ?>" class="form-control" id="LastName" pattern="[A-Za-z]+" oninvalid="setCustomValidity('Enter only Alphabets')" oninput="setCustomValidity('')" />
		</div>
	</div>
	<div class="form-group">
		<label for="Email" class="col-md-2">Email <span class="text-danger">*</span></label>
		<div class="col-md-4">
			<input type="email" name="Email" value="<?php echo ($this->input->post('Email') ? $this->input->post('Email') : $user['Email']); ?>" class="form-control" id="Email" required />
		</div>
	</div>
	<div class="form-group">
		<label for="Contact" class="col-md-2">Contact</label>
		<div class="col-md-4">
			<input type="text" name="Contact" value="<?php echo ($this->input->post('Contact') ? $this->input->post('Contact') : $user['Contact']); ?>" class="form-control" id="Contact" pattern="\d+" oninvalid="setCustomValidity('Enter only Digits')" oninput="setCustomValidity('')" />
		</div>
	</div>
	
	<div class="form-group">
		<label for="Password" class="col-md-2">Password <span class="text-danger">*</span></label>
		<div class="col-md-4">
			<input type="password" name="Password" value="<?php echo ($this->input->post('Password') ? $this->input->post('Password') : $user['Password']); ?>" class="form-control" id="Password" required />
		</div>
	</div>
	<div class="form-group">
		<label for="Status" class="col-md-2">Status <span class="text-danger">*</span></label>
		<div class="col-md-4">
        	<select name="Status" class="form-control" required>
                <option <?php if($user['Status'] == 'Active'){ echo "selected"; } ?> value="Active">Active</option>
                <option <?php if($user['Status'] == 'Inactive'){ echo "selected"; } ?> value="Inactive">Inactive</option>
            </select>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-4">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
</div>	
<?php echo form_close(); ?>
