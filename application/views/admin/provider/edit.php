<?php echo validation_errors(); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Company</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
	
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#basic_info">Basic Info</a></li>
        <li><a data-toggle="tab" href="#banking_details">Banking Details</a></li>
        <li><a data-toggle="tab" href="#pricing">Pricing</a></li>
        <li><a data-toggle="tab" href="#Working_Days">Working Days & Hours</a></li>
    </ul>
<div class="tab-content">
	<div id="basic_info" class="tab-pane fade in active">
	    <h3></h3>    
        <?php echo form_open_multipart('admin/providers/edit/'.$provider['ID'],array("class"=>"form-horizontal basicinfo")); ?>
        <div class="form-group">
            <label for="CompanyName" class="col-md-2">Company Name <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="CompanyName" value="<?php echo ($this->input->post('CompanyName') ? $this->input->post('CompanyName') : $provider['CompanyName']); ?>" class="form-control" id="CompanyName" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="StreetAddress" class="col-md-2">Company Address</label>
            <div class="col-md-4">
                <input type="text" name="StreetAddress" value="<?php echo ($this->input->post('StreetAddress') ? $this->input->post('StreetAddress') : $provider['StreetAddress']); ?>" class="form-control" id="StreetAddress" />
            </div>
        </div>
        <div class="form-group">
            <label for="PostCode" class="col-md-2">Postal Code <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="PostCode" value="<?php echo ($this->input->post('OwnersPostalCode') ? $this->input->post('OwnersPostalCode') : $provider['OwnersPostalCode']); ?>" class="form-control" id="OwnersPostalCode" />
            </div>
        </div>
            
        <div class="form-group">
            <label for="City" class="col-md-2">Company City <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <select name="City" class="form-control selectdrop">
                    <option value="">Select City</option>
                    <?php 
                    foreach($cities as $city)
                    {
                        $selected = ($city['ID'] == $provider['City']) ? ' selected="selected"' : null;
                        
                        echo '<option value="'.$city['ID'].'" '.$selected.'>'.$city['CityName'].'</option>';
                    } 
                    ?>
                </select>
            </div>
        </div>    
            
        <div class="form-group">
            <label for="ContactPerson" class="col-md-2">Contact Person <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="ContactPerson" value="<?php echo ($this->input->post('ContactPerson') ? $this->input->post('ContactPerson') : $provider['ContactPerson']); ?>" class="form-control" id="ContactPerson" />
            </div>
        </div>
        <div class="form-group">
            <label for="ContactNumber" class="col-md-2">Mobile Number <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="ContactNumber" value="<?php echo ($this->input->post('ContactNumber') ? $this->input->post('ContactNumber') : $provider['ContactNumber']); ?>" class="form-control" id="ContactNumber" maxlength="17" onkeypress="return onlyNos(event,this);" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="ContactNumber" class="col-md-2">Other Contacts</label>
            <div class="col-md-4">
                <input type="text" name="OtherContact" value="<?php echo ($this->input->post('OtherContact') ? $this->input->post('OtherContact') : $provider['ContactNumber']); ?>" class="form-control" id="OtherContact" maxlength="17" onkeypress="return onlyNos(event,this);" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="Email" class="col-md-2">Email <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="email" name="Email" value="<?php echo ($this->input->post('Email') ? $this->input->post('Email') : $provider['Email']); ?>" class="form-control" id="Email" />
            </div>
        </div>
        <div class="form-group">
            <label for="ContractStartDate" class="col-md-2">Contract Start Date</label>
            <div class="col-md-4">
                <input type="text" name="ContractStartDate" value="<?php echo date("d-m-Y", strtotime($provider['ContractStartDate'])) ; ?>" class="form-control datepicker3 selectdrop" id="ContractStartDate" readonly="readonly" />
            </div>
        </div>
        <div class="form-group">
            <label for="ContractEndDate" class="col-md-2">Contract End Date</label>
            <div class="col-md-4">
                <input type="text" name="ContractEndDate" value="<?php echo ($this->input->post('ContractEndDate') ? $this->input->post('ContractEndDate') : date("d-m-Y", strtotime($provider['ContractEndDate']))); ?>" class="form-control datepicker4 selectdrop" id="ContractEndDate" readonly="readonly" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="MileRange" class="col-md-2">Mile Range <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="MileRange" value="<?php echo ($this->input->post('MileRange') ? $this->input->post('MileRange') : $provider['MileRange']); ?>" class="form-control" id="MileRange" onkeypress="return onlyNos(event,this);" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="TotalVehicle" class="col-md-2">Total Vehicle <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="TotalVehicle" value="<?php echo ($this->input->post('TotalVehicle') ? $this->input->post('TotalVehicle') : $provider['TotalVehicle']); ?>" class="form-control" id="TotalVehicle" onkeypress="return onlyNos(event,this);" />
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
            <label for="Identity" class="col-md-2">Logo</label>
            <div class="col-md-4">
                <input type="file" id="ProfilePic" accept="image/*" class="upload" name="ProfilePic" onchange="CreateURL(this);" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="Identity" class="col-md-2">&nbsp;</label>
            <div class="col-md-4">
			<?php if($provider['Logo'] != ''){ ?>
                <img id="logo" alt="" height="100" src="<?= base_url('uploads/provider/logo/thumb/'.$provider['Logo']) ?>" />
			<?php } else{
                echo '<img id="logo" alt="" />';	
            }?> 
            </div>
        </div>
        
        <div class="form-group">
            <label for="Identity" class="col-md-2">&nbsp;</label>
            <div class="col-md-4">
            	<input type="hidden" id="lat" name="Lat" />
                <input type="hidden" id="lng" name="Lng" />
                <button type="button" class="btn btn-success submit btn-submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Saving">Save</button>
            </div>
        </div>
        <?php echo form_close(); ?>
	</div> 
     
    <div id="banking_details" class="tab-pane fade">
        <h3></h3>
        <?= form_open_multipart('admin/providers/banking/'.$provider['ID'],array("class"=>"form-horizontal", "id"=>"banking")); ?>
        
        <?php 	if($provider['StripeVerification'] == 'verified')
				{?>
                    <div class="alert alert-success fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Great!</strong> Stripe account is verified.
                    </div>	
		<?php 	}?>
		
		<?php 	if($provider['StripeVerification'] == 'pending')
				{?>
                    <div class="alert alert-warning fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Warning!</strong> Stripe account is under verification, Do not edit until verified.
                    </div>	
		<?php 	}?>
        
        <?php 	if($provider['StripeVerification'] == 'unverified')
				{
					$VerificationMsg = json_decode($provider['VerificationMsg']);
					$msg = implode(', ', $VerificationMsg->fields_needed);
				?>
                    <div class="alert alert-danger fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Fields Needed: </strong> <?= $msg;?>
                    </div>	
		<?php 	} ?>
        
        <div class="form-group">
            <label for="ContactPerson" class="col-md-2">First Name <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="FirstName" value="<?php echo ($this->input->post('FirstName') ? $this->input->post('FirstName') : $provider['FirstName']); ?>" class="form-control" id="FirstName" />
            </div>
        </div>
        <div class="form-group">
            <label for="ContactPerson" class="col-md-2">Last Name <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="LastName" value="<?php echo ($this->input->post('LastName') ? $this->input->post('LastName') : $provider['LastName']); ?>" class="form-control" id="LastName" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="Ownersdob" class="col-md-2">Date of Birth <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="Ownersdob" value="<?php echo date("d-m-Y", strtotime($provider['Ownersdob'])); ?>" class="form-control dobdatepickerjs selectdrop" id="Ownersdob" readonly="readonly"/>
            </div>
        </div>
        
        <div class="form-group">
            <label for="OwnersAddress" class="col-md-2">Address <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="OwnersAddress" value="<?php echo ($this->input->post('OwnersAddress') ? $this->input->post('OwnersAddress') : $provider['OwnersAddress']); ?>" class="form-control" id="OwnerAddress" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="OwnersCity" class="col-md-2">City <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <select name="OwnersCity" class="form-control selectdrop" id="OwnerCity">
                    <option value="">Select City</option>
                    <?php 
                    foreach($cities as $city)
                    {
                        $selected = ($city['ID'] == $provider['OwnersCity']) ? ' selected="selected"' : null;
                        
                        echo '<option value="'.$city['ID'].'" '.$selected.'>'.$city['CityName'].'</option>';
                    } 
                    ?>
                </select>
            </div>
        </div>    
        
        <div class="form-group">
            <label for="OwnersPostalCode" class="col-md-2">Postal Code <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="OwnersPostalCode" value="<?php echo ($this->input->post('PostCode') ? $this->input->post('PostCode') : $provider['PostCode']); ?>" class="form-control" id="PostCode" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="AdditionalOwners" class="col-md-2">Additional Owners</label>
            <div class="col-md-4">
                <input type="text" name="AdditionalOwners" value="<?php echo ($this->input->post('AdditionalOwners') ? $this->input->post('AdditionalOwners') : $provider['AdditionalOwners']); ?>" class="form-control" id="AdditionalOwners" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="BusinessName" class="col-md-2">Business Name <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="CompanyName" value="<?php echo ($this->input->post('CompanyName') ? $this->input->post('CompanyName') : $provider['CompanyName']); ?>" class="form-control" id="CompanyName1" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="BusinessTaxID" class="col-md-2">Business Tax ID <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="BusinessTaxID" value="<?php echo ($this->input->post('BusinessTaxID') ? $this->input->post('BusinessTaxID') : $provider['BusinessTaxID']); ?>" class="form-control" id="BusinessTaxID" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="ContactPerson" class="col-md-2">IBAN <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="IBAN" value="<?php echo ($this->input->post('IBAN') ? $this->input->post('IBAN') : $provider['IBAN']); ?>" class="form-control" id="IBAN" onkeypress="return onlyNos(event,this);" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="AccountNo" class="col-md-2">Account No <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="AccountNo" value="<?php echo ($this->input->post('AccountNo') ? $this->input->post('AccountNo') : $provider['AccountNo']); ?>" class="form-control" id="AccountNo" onkeypress="return onlyNos(event,this);" />
            </div>
        </div>
                
        <div class="form-group">
            <label for="Identity" class="col-md-2">Identity <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="file" accept="image/*" class="upload" id="Identity" name="ProfilePic" onchange="readURL(this);" <?php if($provider['Identity'] == ''){ echo "required"; } ?> />
            </div>
        </div>
        
        <div class="form-group">
            <label for="Identity" class="col-md-2">&nbsp;</label>
            <div class="col-md-4">
			<?php if($provider['Identity'] != ''){ ?>
                <img id="blah" alt="" height="100" src="<?= base_url('uploads/provider/identity/thumb/'.$provider['Identity']) ?>" />
			<?php } else{
                echo '<img id="blah" alt="" />';	
            }?> 
            </div>
        </div>
        
        <div class="form-group">
            <label for="Identity" class="col-md-2">&nbsp;</label>
            <div class="col-md-4">
                <button type="button" class="btn btn-success bank-submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Saving">Save</button>
            </div>
        </div>
        
        <?php echo form_close(); ?>
    </div>
    
    <div id="pricing" class="tab-pane fade">
        <h3></h3>
        <?php echo form_open('admin/providers/pricing/'.$provider['ID'],array("class"=>"form-horizontal pricingform")); ?>
        <div class="form-group">
            <label for="BaseCost" class="col-md-2">Base Cost <span class="text-danger">*</span></label>
            
            <div class="col-md-4 input-group ">
              <div class="input-group-addon"><?= CURRENCY ?></div>
              <input type="text" name="BaseCost" value="<?php echo ($this->input->post('BaseCost') ? $this->input->post('BaseCost') : $provider['BaseCost']); ?>" class="form-control decimal" id="BaseCost" required /> 
            </div>
        </div>
        <div class="form-group">
            <label for="HourlyRate" class="col-md-2">Rate Per Minute <span class="text-danger">*</span></label>
            
            <div class="col-md-4 input-group ">
              <div class="input-group-addon"><?= CURRENCY ?></div>
              <input type="text" name="RatePerMin" value="<?php echo ($this->input->post('RatePerMin') ? $this->input->post('RatePerMin') : $provider['RatePerMin']); ?>" class="form-control decimal" id="RatePerMin" required />
            </div>
        </div>
        <div class="form-group">
            <label for="MileRate" class="col-md-2">Rate Per Mile <span class="text-danger">*</span></label>
            <div class="col-md-4 input-group">
              <div class="input-group-addon"><?= CURRENCY ?></div>
              <input type="text" name="RatePerMile" value="<?php echo ($this->input->post('RatePerMile') ? $this->input->post('RatePerMile') : $provider['RatePerMile']); ?>" class="form-control decimal" id="RatePerMile" required />
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-success submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Saving">Save</button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    
    <div id="Working_Days" class="tab-pane fade">
       
        <?php echo form_open('admin/providers/workingdays/'.$provider['ID'],array("class"=>"form-horizontal")); ?>
        
        <div class="col-sm-6">
            <h3>Close Days in <?= date('Y')?></h3>
            <div class="input_fields_wrap">
                <?php 
					foreach($CloseDates as $date){?>
						<div class="form-group">
                            <label for="Date" class="col-md-3">Date</label>
                            <div class="col-md-6">
                                <input type="text" name="CloseDates[]" class="form-control datepickerjs" readonly="readonly" value="<?= date('d-m-Y',strtotime($date['Date'])); ?>" />
                            </div>
                            <button class="col-md-1 btn btn-danger remove_field">X</button>
                        </div>
					<?php }
				?>
                <div class="form-group">
                    <label for="Date" class="col-md-3">Date</label>
                    <div class="col-md-6">
                        <input type="text" name="CloseDates[]" readonly="readonly" class="form-control datepickerjs" />
                    </div>
                    <button class="col-md-1 btn btn-danger remove_field">X</button>
                </div>
                <div class="form-group">
                    <label for="Date" class="col-md-3">Date</label>
                    <div class="col-md-6">
                        <input type="text" name="CloseDates[]" readonly="readonly" class="form-control datepickerjs" />
                    </div>
                    <button class="col-md-1 btn btn-danger remove_field">X</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-5">
                    <button type="button" class="btn btn-primary add_field_button">Add More</button>
                </div>
            </div>
        </div>
       
        <div class="col-sm-6">
            <h3>Working Hours on Open Days </h3>
            <div class="form-group">
                <label for="OpenHour" class="col-md-4">Open Hour <span class="text-danger">*</span></label>
                <div class="col-md-8">
                    <input type="text" name="OpenHour" class="form-control timepicker" id="OpenHour" value="<?php echo $provider['OpenHour']; ?>" readonly="readonly" required />
                </div>
            </div>
            <div class="form-group">
                <label for="CloseHour" class="col-md-4">Close Hour <span class="text-danger">*</span></label>
                <div class="col-md-8">
                    <input type="text" name="CloseHour" class="form-control timepicker" id="CloseHour" value="<?php echo $provider['CloseHour']; ?>" readonly="readonly" required />
                </div>
            </div>
        </div>
       
        	<div class="form-group">
                <div class="col-sm-offset-5 col-sm-12">
                    <button type="submit" class="btn btn-success submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Saving">Save</button>
                </div>
            </div>
        
        <?php echo form_close(); ?>
    </div>    
</div>        
</div>

<!-- Modal -->
<?php	if(isset($error) && $error != "")
		{ ?>
        <div id="modal-content" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                       <div class="alert alert-danger fade in">
                            <strong>Errors: </strong> <?= urldecode($error); ?>
                        </div>	
                    </div>
                </div>
            </div>
        </div>
<?php 	} ?>

<style>
.selectdrop{ padding-left: 8px !important; }
.datepicker{ padding-left: 12px !important; }
</style>

<link rel='stylesheet' href='<?php echo base_url('front/css/jquery-ui.css') ?>' />
<link rel='stylesheet' href='<?php echo base_url('front/css/jquery-ui-timepicker-addon.css') ?>' />
<script src='<?php echo base_url('front/js/jquery-ui.min.js')?>'></script>
<script src='<?php echo base_url('front/js/jquery-ui-timepicker-addon.js') ?>'></script>
<script>
$('.timepicker').timepicker({
	timeFormat: "HH:mm",
	showButtonPanel:  false,
	controlType: 'select',
	oneLine: true
});
</script>

<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
-->
<!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<script>
var startDateTextBox = $('.datepicker3');
var endDateTextBox = $('.datepicker4');

startDateTextBox.datepicker({ 
	dateFormat: 'dd-mm-yy',
	minDate: new Date(),
	onClose: function(dateText, inst) {
		if (endDateTextBox.val() != '') {
			var testStartDate = startDateTextBox.datetimepicker('getDate');
			var testEndDate = endDateTextBox.datetimepicker('getDate');
			if (testStartDate > testEndDate)
				endDateTextBox.datetimepicker('setDate', testStartDate);
		}
		else {
			endDateTextBox.val(dateText);
		}
	},
	onSelect: function (selectedDateTime){
		endDateTextBox.datetimepicker('option', 'minDate', startDateTextBox.datetimepicker('getDate') );
	}
});
endDateTextBox.datepicker({ 
	dateFormat: 'dd-mm-yy',
	minDate: new Date()
});

$('.datepicker1').daterangepicker(
{
    locale: {
      format: 'DD-MM-YYYY'
    }
});
</script>

<script src='http://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLE_PLACE ?>&libraries=places'></script>
<script src='<?php echo base_url('front/js/jquery.validate.min.js') ?>'></script>
<script>

   function readURL(input) 
   {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
		
			reader.onload = function (e) {
				$('#blah')
					.attr('src', e.target.result)
					.height(100);
			};
			reader.readAsDataURL(input.files[0]);
		}
    }
	function CreateURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#logo')
                    .attr('src', e.target.result)
                    .height(100);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
var loc_flag = true;	
$("#StreetAddress").keydown(function () {
	loc_flag = false;
});
var options = {
  	componentRestrictions: {country: 'GB'}, 
};	
google.maps.event.addDomListener(window, 'load', function () {
	var places = new google.maps.places.Autocomplete(document.getElementById('StreetAddress'), options);
	google.maps.event.addListener(places, 'place_changed', function () {
		var place = places.getPlace();
		var address = place.formatted_address;
		var latitude = place.geometry.location.lat();
		var longitude = place.geometry.location.lng();
		loc_flag = true;
		$('#lat').val(latitude);
		$('#lng').val(longitude);
	});
});	

$(".btn-submit").click(function () 
{
	if (loc_flag == false) 
	{
		$("#StreetAddress").val('');
		$("#StreetAddress").focus();
		alert("Please enter valid location");	
		return false;
	}
	
	if ($('#ProfilePic').val() != ''){
		var ext = $('#ProfilePic').val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
			alert('Please upload valid image');
			return false;
		}
	}
	$('.basicinfo').submit();	
});

$(".bank-submit").click(function () 
{
	if ($('#Identity').val() != ''){
		var ext = $('#Identity').val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
			alert('Please upload valid image');
			return false;
		}
	}
	$('#banking').submit();	
});
	
	
$(document).ready(function() {
    
	$('.datepickerjs').datepicker({dateFormat: 'dd-mm-yy', 'minDate': new Date()});
	$('.dobdatepickerjs').datepicker({
		dateFormat: 'dd-mm-yy',
		changeMonth: true,
		changeYear: true,
		maxDate: new Date(),
		yearRange: "1950:"+ new Date().getFullYear() 
	});
	
	$('#modal-content').modal({
		show: true
	});
	
	var max_fields      = 100; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="form-group"><label for="Date" class="col-md-3">Date</label><div class="col-md-6"><input type="text" name="CloseDates[]" readonly="readonly" class="form-control datepickerjs" /></div><button class="col-md-1 btn btn-danger remove_field">X</button></div>'); //add input box
        }
		$('.datepickerjs').datepicker({dateFormat: 'dd-mm-yy', 'minDate': new Date()});
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

$(".basicinfo").validate({
	rules: {
		CompanyName: "required",
		StreetAddress: "required",
		PostCode: "required",
		City: "required",
		ContactPerson: "required",
		ContactNumber:{
			required: true,
			number: true,
			minlength: 10,
			maxlength: 17	
		},
		Email: {
			required: true,
			validEmail: true
		},
		ContractStartDate: "required",
		ContractEndDate: "required",
		MileRange:{
			required: true,
			number: true,	
		},
		TotalVehicle:{
			required: true,
			number: true,	
		},
		Status: "required",
	},
	messages:{
		Contact:{
			minlength: "Please enter minimum 10 digits."
		}
	}
});

$("#banking").validate({
	rules: {
		FirstName: "required",
		LastName: "required",
		Ownersdob: "required",
		OwnersAddress: "required",
		OwnersCity: "required",
		OwnersPostalCode: "required",
		CompanyName: "required",
		BusinessTaxID: "required",
		IBAN:{
			required: true,
			number: true,
		},
		AccountNo:{
			required: true,
			number: true,
		},
	}
});
$(".pricingfo").validate({
	rules: {
		BaseCost:{
			required: true,
			number: true,
		},
		RatePerMin:{
			required: true,
			number: true,
		},
		RatePerMile:{
			required: true,
			number: true,
		}
	}
});

jQuery.validator.addMethod("validEmail", function(value, element) 
{
    if(value == '') 
        return true;
    var temp1;
    temp1 = true;
    var ind = value.indexOf('@');
    var str2=value.substr(ind+1);
    var str3=str2.substr(0,str2.indexOf('.'));
    if(str3.lastIndexOf('-')==(str3.length-1)||(str3.indexOf('-')!=str3.lastIndexOf('-')))
        return false;
    var str1=value.substr(0,ind);
    if((str1.lastIndexOf('_')==(str1.length-1))||(str1.lastIndexOf('.')==(str1.length-1))||(str1.lastIndexOf('-')==(str1.length-1)))
        return false;
    str = /(^[a-zA-Z0-9]+[\._-]{0,1})+([a-zA-Z0-9]+[_]{0,1})*@([a-zA-Z0-9]+[-]{0,1})+(\.[a-zA-Z0-9]+)*(\.[a-zA-Z]{2,3})$/;
    temp1 = str.test(value);
    return temp1;
}, "Please enter a valid email address.");


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
$('.decimal').keyup(function(){
    var val = $(this).val();
    if(isNaN(val)){
         val = val.replace(/[^0-9\.]/g,'');
         if(val.split('.').length>2) 
             val =val.replace(/\.+$/,"");
    }
    $(this).val(val); 
});

</script>


