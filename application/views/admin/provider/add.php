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
        <?php echo form_open('admin/providers/add',array("class"=>"form-horizontal submitform")); ?>
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
                <input type="text" name="PostCode" value="<?php echo $this->input->post('PostCode'); ?>" class="form-control" id="PostCode" />
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
                <input type="text" name="ContactPerson" value="<?php echo $this->input->post('ContactPerson'); ?>" class="form-control" id="ContactPerson" />
            </div>
        </div>
        <div class="form-group">
            <label for="ContactNumber" class="col-md-2">Mobile Number <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="ContactNumber" value="<?php echo $this->input->post('ContactNumber'); ?>" class="form-control" id="ContactNumber" maxlength="17" onkeypress="return onlyNos(event,this);" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="ContactNumber" class="col-md-2">Other Contact</label>
            <div class="col-md-4">
                <input type="text" name="OtherContact" value="<?php echo $this->input->post('OtherContact'); ?>" class="form-control" id="OtherContact" maxlength="17" onkeypress="return onlyNos(event,this);" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="Email" class="col-md-2">Email <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="email" name="Email" value="<?php echo $this->input->post('Email'); ?>" class="form-control" id="Email" />
            </div>
        </div>
        <div class="form-group">
            <label for="ContractStartDate" class="col-md-2">Contract Start Date</label>
            <div class="col-md-4">
                <input type="text" name="ContractStartDate" value="" class="form-control datepicker3" id="ContractStartDate" placeholder="DD-MM-YYY" readonly="readonly" />
            </div>
        </div>
        <div class="form-group">
            <label for="ContractEndDate" class="col-md-2">Contract End Date</label>
            <div class="col-md-4">
                <input type="text" name="ContractEndDate" class="form-control datepicker4" id="ContractEndDate"  placeholder="DD-MM-YYY" readonly="readonly" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="MileRange" class="col-md-2">Mile Range <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="MileRange" value="<?php echo $this->input->post('MileRange'); ?>" class="form-control" id="MileRange" onkeypress="return onlyNos(event,this);" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="TotalVehicle" class="col-md-2">Total Vehicle <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" name="TotalVehicle" value="<?php echo $this->input->post('TotalVehicle'); ?>" class="form-control" id="TotalVehicle" onkeypress="return onlyNos(event,this);" />
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
                <input type="hidden" id="lat" name="Lat" />
                <input type="hidden" id="lng" name="Lng" />
                <button type="button" class="btn btn-success btn-submit">Save</button>
            </div>
        </div>
       
</div>
</div>

 		
</div>

<?php echo form_close(); ?>
<script src='http://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLE_PLACE ?>&libraries=places'></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
 
 
<link rel='stylesheet' href='<?php echo base_url('front/css/jquery-ui.css') ?>' />
<link rel='stylesheet' href='<?php echo base_url('front/css/jquery-ui-timepicker-addon.css') ?>' />
<script src='<?php echo base_url('front/js/jquery-ui.min.js')?>'></script>
<script src='<?php echo base_url('front/js/jquery-ui-timepicker-addon.js') ?>'></script> 
<!-- Include Date Range Picker -->
<!--<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
-->
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

/*$('.datepicker1').daterangepicker(
{
    locale: {
      format: 'DD-MM-YYYY'
    }
});
*/</script>

<script>

var loc_flag = false;	
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
	else{
		$('.submitform').submit();	
	}	
});
</script>
<script src='<?php echo base_url('front/js/jquery.validate.min.js') ?>'></script>
<script>
$(".submitform").validate({
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
</script>


<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>-->
