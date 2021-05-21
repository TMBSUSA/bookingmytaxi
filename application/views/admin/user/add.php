
<?php echo form_open('admin/'.$this->comman_class.'/add',array("class"=>"form-horizontal")); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create <?= $this->title ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
	
	<div class="form-group">
		<label for="FirstName" class="col-md-2">First Name</label>
		<div class="col-md-4">
			<input type="text" name="FirstName" value="<?php echo $this->input->post('FirstName'); ?>" class="form-control" id="FirstName" />
		</div>
	</div>
	<div class="form-group">
		<label for="LastName" class="col-md-2">Last Name</label>
		<div class="col-md-4">
			<input type="text" name="LastName" value="<?php echo $this->input->post('LastName'); ?>" class="form-control" id="LastName" />
		</div>
	</div>
	<div class="form-group">
		<label for="Email" class="col-md-2">Email</label>
		<div class="col-md-4">
			<input type="text" name="Email" value="<?php echo $this->input->post('Email'); ?>" class="form-control" id="Email" />
		</div>
	</div>
	<div class="form-group">
		<label for="Contact" class="col-md-2">Contact</label>
		<div class="col-md-4">
			<input type="text" name="Contact" value="<?php echo $this->input->post('Contact'); ?>" class="form-control" id="Contact" />
		</div>
	</div>
	
	<div class="form-group">
		<label for="Password" class="col-md-2">Password</label>
		<div class="col-md-4">
			<input type="password" name="Password" value="<?php echo $this->input->post('Password'); ?>" class="form-control" id="Password" />
		</div>
	</div>
    
	<div class="form-group">
		<label for="Status" class="col-md-2">Status</label>
		<div class="col-md-4">
			<select name="Status" class="form-control" required>
                <option value="Active">Active</option>
                <option value="Deactive">Deactive</option>
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