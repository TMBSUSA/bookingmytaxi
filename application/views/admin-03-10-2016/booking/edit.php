<?php echo validation_errors(); ?>
<?php echo form_open('admin/'.$this->comman_class.'/edit/'.$booking['ID'],array("class"=>"form-horizontal")); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit <?= $this->title ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    
	<div class="form-group">
		<label for="UserID" class="col-md-2">User <span class="text-danger">*</span></label>
		<div class="col-md-4">
			<?php $user = $this->db->select('FirstName, LastName, Contact')->where('ID', $booking['UserID'])->get('User')->row_array() ?>
            <select name="UserID" class="form-control" style="text-transform:capitalize" required>
                <option value="<?php echo $booking['UserID']; ?>"><?= $user['FirstName'] .' '. $user['LastName'] .' '.$user['Contact'] ?></option>
            </select>
		</div>
	</div>
	<div class="form-group">
		<label for="ProviderID" class="col-md-2">Provider <span class="text-danger">*</span></label>
		<div class="col-md-4">
			<?php $user = $this->db->select('CompanyName, ContactNumber')->where('ID', $booking['ProviderID'])->get('provider')->row_array() ?>
            <select name="ProviderID" class="form-control" style="text-transform:capitalize" required>
                <option value="<?php echo $booking['ProviderID']; ?>"><?= $user['CompanyName'] .' '. $user['ContactNumber'] ?></option>
            </select>
		</div>
	</div>
	<div class="form-group">
		<label for="IsRound" class="col-md-2">IsRound</label>
		<div class="col-md-4">
			<input type="checkbox" name="IsRound" value="1" <?php echo ($booking['IsRound']==1 ? 'checked="checked"' : ''); ?> id='IsRound' />
		</div>
	</div>
	<div class="form-group">
		<label for="StartDate" class="col-md-2">StartDate <span class="text-danger">*</span></label>
		<div class="col-md-4">
			<input type="text" name="StartDate" value="<?php echo ($this->input->post('StartDate') ? $this->input->post('StartDate') : convert_date($booking['StartDate'])); ?>" class="form-control datepicker" id="StartDate" required />
		</div>
	</div>
	<div class="form-group">
		<label for="EndDate" class="col-md-2">EndDate <span class="text-danger">*</span></label>
		<div class="col-md-4">
			<input type="text" name="EndDate" value="<?php echo ($this->input->post('EndDate') ? $this->input->post('EndDate') : convert_date($booking['EndDate'])); ?>" class="form-control datepicker" id="EndDate" required />
		</div>
	</div>
	<div class="form-group">
		<label for="StartTime" class="col-md-2">StartTime <span class="text-danger">*</span></label>
		<div class="col-md-4">
			<input type="text" name="StartTime" value="<?php echo ($this->input->post('StartTime') ? $this->input->post('StartTime') : $booking['StartTime']); ?>" class="form-control timepicker" id="StartTime" required />
		</div>
	</div>
	<div class="form-group">
		<label for="EndTime" class="col-md-2">EndTime <span class="text-danger">*</span></label>
		<div class="col-md-4">
			<input type="text" name="EndTime" value="<?php echo ($this->input->post('EndTime') ? $this->input->post('EndTime') : $booking['EndTime']); ?>" class="form-control timepicker" id="EndTime" required />
		</div>
	</div>
	<div class="form-group">
		<label for="Luggage" class="col-md-2">Luggage <span class="text-danger">*</span></label>
		<div class="col-md-4">
			<input type="text" name="Luggage" value="<?php echo ($this->input->post('Luggage') ? $this->input->post('Luggage') : $booking['Luggage']); ?>" class="form-control" id="Luggage" pattern="\d+" oninvalid="setCustomValidity('Enter only Digits')" required />
		</div>
	</div>
	<div class="form-group">
		<label for="TotalFare" class="col-md-2">TotalFare <span class="text-danger">*</span></label>
		<div class="col-md-4">
			<input type="text" name="TotalFare" value="<?php echo ($this->input->post('TotalFare') ? $this->input->post('TotalFare') : $booking['TotalFare']); ?>" class="form-control" id="TotalFare" pattern="\d+" oninvalid="setCustomValidity('Enter only Digits')" required />
		</div>
	</div>
	<div class="form-group">
		<label for="Rating" class="col-md-2">Rating</label>
		<div class="col-md-4">
			<input type="text" name="Rating" value="<?php echo ($this->input->post('Rating') ? $this->input->post('Rating') : $booking['Rating']); ?>" class="form-control" id="Rating" pattern="\d+" oninvalid="setCustomValidity('Enter only Digits')" />
		</div>
	</div>
	<div class="form-group">
		<label for="Status" class="col-md-2">Status <span class="text-danger">*</span></label>
		<div class="col-md-4">
			<select name="Status" class="form-control">
                <option <?php if($booking['Status'] =='Completed'){ echo 'selected'; } ?> value="Completed">Completed</option>
                <option <?php if($booking['Status'] =='Pending'){ echo 'selected'; } ?> value="Pending">Pending</option>
                <option <?php if($booking['Status'] =='Failed'){ echo 'selected'; } ?> value="Failed">Failed</option>
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


<link href="<?= base_url()?>theme/vendor/wickedpicker/wickedpicker.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url()?>theme/vendor/wickedpicker/wickedpicker.min.js"></script>
<script>
$('.timepicker').wickedpicker();
</script>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function(){
      var date_input=$('.datepicker'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd-mm-yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
		todayBtn: "linked"
      };
      date_input.datepicker(options);
	  
    })
</script>