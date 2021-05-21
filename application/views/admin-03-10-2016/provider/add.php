<?php echo validation_errors(); ?>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Company</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
	
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#basic_info">Basic Info</a></li>
    </ul>

<div class="tab-content">
<div id="basic_info" class="tab-pane fade in active">
	    <h3></h3>
        <?php echo form_open('admin/providers/add',array("class"=>"form-horizontal")); ?>
        <div class="form-group">
            <label for="CompanyName" class="col-md-2">Company Name <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="CompanyName" value="<?php echo $this->input->post('CompanyName'); ?>" class="form-control" id="CompanyName" required />
            </div>
        </div>
        <div class="form-group">
            <label for="StreetAddress" class="col-md-2">Street Address <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="StreetAddress" value="<?php echo $this->input->post('StreetAddress'); ?>" class="form-control" id="StreetAddress" required />
            </div>
        </div>
        <div class="form-group">
            <label for="PostCode" class="col-md-2">Post Code <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="PostCode" value="<?php echo $this->input->post('PostCode'); ?>" class="form-control" id="PostCode" pattern="\d+" oninvalid="setCustomValidity('Enter only Digits')" oninput="setCustomValidity('')" required />
            </div>
        </div>
       
    	<div class="form-group">
            <label for="City" class="col-md-2">City <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <select name="City" class="form-control" required>
                    <option value="">Select City</option>
                    <?php 
                    foreach($cities as $city)
                    {
                        echo '<option value="'.$city['ID'].'" '.$selected.'>'.$city['CityName'].'</option>';
                    } 
                    ?>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label for="ContactPerson" class="col-md-2">Contact Person <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="ContactPerson" value="<?php echo $this->input->post('ContactPerson'); ?>" class="form-control" id="ContactPerson" pattern="[A-Za-z]+" oninvalid="setCustomValidity('Enter only Alphabets')" oninput="setCustomValidity('')" required />
            </div>
        </div>
        <div class="form-group">
            <label for="ContactNumber" class="col-md-2">Mobile Number <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="ContactNumber" value="<?php echo $this->input->post('ContactNumber'); ?>" class="form-control" id="ContactNumber" pattern="\d+" oninvalid="setCustomValidity('Enter only Digits')" oninput="setCustomValidity('')" required />
            </div>
        </div>
        
        <div class="form-group">
            <label for="ContactNumber" class="col-md-2">Other Contact</label>
            <div class="col-md-4">
                <input type="text" name="OtherContact" value="<?php echo $this->input->post('OtherContact'); ?>" class="form-control" id="OtherContact" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="Email" class="col-md-2">Email <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="email" name="Email" value="<?php echo $this->input->post('Email'); ?>" class="form-control" id="Email" required />
            </div>
        </div>
        <div class="form-group">
            <label for="ContractStartDate" class="col-md-2">Contract Start Date</label>
            <div class="col-md-4">
                <input type="text" name="ContractStartDate" value="" class="form-control datepicker" id="ContractStartDate" placeholder="DD-MM-YYY" readonly="readonly" required  />
            </div>
        </div>
        <div class="form-group">
            <label for="ContractEndDate" class="col-md-2">Contract End Date</label>
            <div class="col-md-4">
                <input type="text" name="ContractEndDate" style="padding: 5px;" class="form-control datepicker2" id="ContractEndDate"  placeholder="DD-MM-YYY" readonly="readonly" required  />
            </div>
        </div>
        
        <div class="form-group">
            <label for="MileRange" class="col-md-2">Mile Range <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="MileRange" value="<?php echo $this->input->post('MileRange'); ?>" class="form-control" id="MileRange" pattern="\d+" oninvalid="setCustomValidity('Enter only Digits')" oninput="setCustomValidity('')" required />
            </div>
        </div>
        
        <div class="form-group">
            <label for="TotalVehicle" class="col-md-2">Total Vehicle <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="TotalVehicle" value="<?php echo $this->input->post('TotalVehicle'); ?>" class="form-control" id="TotalVehicle" pattern="\d+" oninvalid="setCustomValidity('Enter only Digits')" oninput="setCustomValidity('')" required />
            </div>
        </div>
        
        <div class="form-group">
                <label for="Status" class="col-md-2">Status <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <select name="Status" class="form-control" required>
                        <option value="Active">Active</option>
                        <option value="Deactive">Deactive</option>
                    </select>
                </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
       
</div>
<?php /*?>
<div id="banking_details" class="tab-pane fade">
    <h3></h3>
    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
<div id="pricing" class="tab-pane fade">
    <h3></h3>
    	<div class="form-group">
            <label for="HourlyRate" class="col-md-2">Rate per Hours</label>
            <div class="col-md-4">
                <input type="text" name="HourlyRate" value="<?php echo $this->input->post('HourlyRate'); ?>" class="form-control" id="HourlyRate"  />
            </div>
        </div>
        <div class="form-group">
            <label for="MileRate" class="col-md-2">Rate per Mile</label>
            <div class="col-md-4">
                <input type="text" name="MileRate" value="<?php echo $this->input->post('MileRate'); ?>" class="form-control" id="MileRate" />
            </div>
        </div>
</div>
<div id="Working_Days" class="tab-pane fade">
    <h3></h3>
   		<div class="form-group">
            <label for="OpenHour" class="col-md-2">Open Hour</label>
            <div class="col-md-4 bootstrap-timepicker timepicker">
                <input type="text" name="OpenHour" value="<?php echo $this->input->post('OpenHour'); ?>" class="form-control timepicker" id="OpenHour" required />
            </div>
        </div>
        
        <div class="form-group">
            <label for="CloseHour" class="col-md-2">Close Hour</label>
            <div class="col-md-4">
                <div class="bfh-timepicker" data-mode="12h">
                </div>
                <input type="text" name="CloseHour" value="<?php echo $this->input->post('CloseHour'); ?>" class="form-control timepicker" id="CloseHour" required />
            </div>
        </div>
        
        <div class="form-group">
            <label for="ClosedDays" class="col-md-2">Closed Days</label>
            <div class="col-md-4">
                <input type="text" name="ClosedDays" value="<?php echo $this->input->post('ClosedDays'); ?>" class="form-control" id="ClosedDays" required />
            </div>
        </div>
</div>
    <?php */?>
</div>

 		
</div>

<?php echo form_close(); ?>

<link href="<?= base_url()?>theme/vendor/wickedpicker/wickedpicker.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url()?>theme/vendor/wickedpicker/wickedpicker.min.js"></script>
<script>
$('.timepicker').wickedpicker();

$(".datepicker").change(function(){
    var date_input=$('.datepicker'); 
	var date_input2=$('.datepicker2');
	var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	var options={
		format: 'dd-mm-yyyy',
		container: container,
		todayHighlight: true,
		autoclose: true,
		startDate: date_input.datepicker("getDate"),
		todayBtn: "linked"
	};
	date_input2.datepicker(options);
});
	
</script>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
