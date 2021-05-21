
<?php echo form_open('admin/'.$this->comman_class.'/add',array("class"=>"form-horizontal")); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create <?= $this->title ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
	
	<div class="form-group">
		<label for="UserID" class="col-md-2">User</label>
		<div class="col-md-4">
			<input type="text" name="UserID" value="<?php echo $this->input->post('UserID'); ?>" class="form-control" id="UserID" />
		</div>
	</div>
	<div class="form-group">
		<label for="ProviderID" class="col-md-2">Provider</label>
		<div class="col-md-4">
			<input type="text" name="ProviderID" value="<?php echo $this->input->post('ProviderID'); ?>" class="form-control" id="ProviderID" />
		</div>
	</div>
	<div class="form-group">
		<label for="IsRound" class="col-md-2">IsRound</label>
		<div class="col-md-4">
			<input type="checkbox" name="IsRound" value="1" value="<?php echo $this->input->post('IsRound'); ?>" id="IsRound" />
		</div>
	</div>
	<div class="form-group">
		<label for="StartDate" class="col-md-2">StartDate</label>
		<div class="col-md-4">
			<input type="text" name="StartDate" value="<?php echo $this->input->post('StartDate'); ?>" class="form-control" id="StartDate" />
		</div>
	</div>
	<div class="form-group">
		<label for="EndDate" class="col-md-2">EndDate</label>
		<div class="col-md-4">
			<input type="text" name="EndDate" value="<?php echo $this->input->post('EndDate'); ?>" class="form-control" id="EndDate" />
		</div>
	</div>
	<div class="form-group">
		<label for="StartTime" class="col-md-2">StartTime</label>
		<div class="col-md-4">
			<input type="text" name="StartTime" value="<?php echo $this->input->post('StartTime'); ?>" class="form-control" id="StartTime" />
		</div>
	</div>
	<div class="form-group">
		<label for="EndTime" class="col-md-2">EndTime</label>
		<div class="col-md-4">
			<input type="text" name="EndTime" value="<?php echo $this->input->post('EndTime'); ?>" class="form-control" id="EndTime" />
		</div>
	</div>
	<div class="form-group">
		<label for="Luggage" class="col-md-2">Luggage</label>
		<div class="col-md-4">
			<input type="text" name="Luggage" value="<?php echo $this->input->post('Luggage'); ?>" class="form-control" id="Luggage" />
		</div>
	</div>
	<div class="form-group">
		<label for="TotalFare" class="col-md-2">TotalFare</label>
		<div class="col-md-4">
			<input type="text" name="TotalFare" value="<?php echo $this->input->post('TotalFare'); ?>" class="form-control" id="TotalFare" />
		</div>
	</div>
	<div class="form-group">
		<label for="Rating" class="col-md-2">Rating</label>
		<div class="col-md-4">
			<input type="text" name="Rating" value="<?php echo $this->input->post('Rating'); ?>" class="form-control" id="Rating" />
		</div>
	</div>
	<div class="form-group">
		<label for="Status" class="col-md-2">Status</label>
		<div class="col-md-4">
			<input type="text" name="Status" value="<?php echo $this->input->post('Status'); ?>" class="form-control" id="Status" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-4">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
</div>
<?php echo form_close(); ?>