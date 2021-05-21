//google map // home
var options = {
  	componentRestrictions: {country: 'GB'}, 
	//types: ['geocode']
};
var from_loc_flag = false;
var to_loc_flag = false;
var via_flag = true;
var is_first_step = false;

google.maps.event.addDomListener(window, 'load', function () {
	var places = new google.maps.places.Autocomplete(document.getElementById('from_loc'), options);
	google.maps.event.addListener(places, 'place_changed', function () {
		var place = places.getPlace();
		var address = place.formatted_address;
		var latitude = place.geometry.location.lat();
		var longitude = place.geometry.location.lng();
		from_loc_flag = true;
		$('#from_lat').val(latitude);
		$('#from_lng').val(longitude);
		$("#from_loc").blur(); 
	});
});


google.maps.event.addDomListener(window, 'load', function () {
	//debugger;
	var places = new google.maps.places.Autocomplete(document.getElementById('to_loc'), options);
	google.maps.event.addListener(places, 'place_changed', function () {
		var place = places.getPlace();
		var address = place.formatted_address;
		var latitude = place.geometry.location.lat();
		var longitude = place.geometry.location.lng();
		to_loc_flag = true;
		$('#to_lat').val(latitude);
		$('#to_lng').val(longitude);
		$("#to_loc").blur();
	});
});

google.maps.event.addDomListener(window, 'load', function () {
	var places = new google.maps.places.Autocomplete(document.getElementById('via'), options);
	google.maps.event.addListener(places, 'place_changed', function () {
		var place = places.getPlace();
		var address = place.formatted_address;
		var latitude = place.geometry.location.lat();
		var longitude = place.geometry.location.lng();
		via_flag = true;
		$('#via_lat').val(latitude);
		$('#via_lng').val(longitude);
		$("#via").blur();
	});
});

$("#from_loc").keydown(function () {
	from_loc_flag = false;
});
$("#to_loc").keydown(function () {
	to_loc_flag = false;
});
$("#via").keydown(function () {
	via_flag = false;
});

function doFromGeocode(addr){
	if(addr.value != '')
	{
		var geocoder = new google.maps.Geocoder();
		// Geocode the address
		geocoder.geocode({'address': addr.value}, function(results, status){
			if (status === google.maps.GeocoderStatus.OK && results.length > 0) {
				return true;
			// show an error if it's not
			}else {
				addr.value = '';	
				addr.focus();
				alert("Invalid address");
				return false;
			}
		});
		
	}
}
function doToGeocode(addr){
	if(addr.value != '')
	{
		var geocoder = new google.maps.Geocoder();
		// Geocode the address
		geocoder.geocode({'address': addr.value}, function(results, status){
			if (status === google.maps.GeocoderStatus.OK && results.length > 0) {
				return true;
			// show an error if it's not
			}else {
				addr.value = '';	
				addr.focus();
				alert("Invalid address");
				return false;
			}
		});
		
	}
}
/*$("#from_loc").blur(function () {
	if (!from_loc_flag){
		return false;		
	} 	
});
$("#to_loc").blur(function () {
	if (!to_loc_flag){
		return false;		
	} 	
});
*/// check for valid place enter from google place to from & to

function ValidationEvent() 
{
	if ($('input[name=trip]:checked').val() == 'round') 
	{
		var totime = $('.dropdatetimepicker').datetimepicker('getDate').getTime();
		var fixeddate = $('#MinEndDate').val();
		if(totime < parseInt(fixeddate)){
			alert("Please select valid drop time");	
			return false;	
		}	
		
		var startt = toDate($('.datetimepicker').val());
		var date = $('.dropdatetimepicker').val();
		var endt = toDate(date);
		
		if (startt > endt) 
		{
			alert("Please select greater return pickup time");	
			return false;
		}
    }
	
	if($("#from_loc").val() == $("#to_loc").val())
	{
		alert("Pick up & Drop off location should not be same");	
		$("#to_loc").focus();
		return false;
	}
	if($("#via").val() != '')
	{
		if($("#from_loc").val() == $("#via").val())
		{
			alert("Pick up & Via location should not be same");	
			$("#via").focus();
			return false;
		}   
		if($("#to_loc").val() == $("#via").val())
		{
			alert("Drop off & Via location should not be same");	
			$("#via").focus();
			return false;
		}
	}
	
	if (from_loc_flag == false) 
	{
		alert("Please enter valid from location");	
		return false;
	}
	else if (to_loc_flag == false) 
	{
		alert("Please enter valid to location");	
		return false;
	}
	else if (via_flag == false) 
	{ 
		alert("Please enter valid via location");	
		return false;
	}
	else{
		return true; 	
	}
}

document.onkeydown=function(){
    if(window.event.keyCode=='13')
	{		
		debugger;
		if(page != '' ){
			if (page == 'login'){
				$('.login-submit').click();	
			}
			if (page == 'register'){
				$('.register-submit').click();	
			}
			return false;
		}
		
		if ($('input[name=trip]:checked').val() == 'round') 
		{
			var totime = $('.dropdatetimepicker').datetimepicker('getDate').getTime();
			var fixeddate = $('#MinEndDate').val();
			if(totime < parseInt(fixeddate)){
				alert("Please select valid drop time");	
				return false;	
			}	
			
			var startt = toDate($('.datetimepicker').val());
			var date = $('.dropdatetimepicker').val();
			var endt = toDate(date);
			
			if (startt > endt) 
			{
				alert("Please select greater return pickup time");	
				return false;
			}
		}
		
		if($("#from_loc").val() == $("#to_loc").val())
		{
			alert("Pick up & Drop off location should not be same");	
			$("#to_loc").focus();
			return false;
		}
		if($("#via").val() != '')
		{
			if($("#from_loc").val() == $("#via").val())
			{
				alert("Pick up & Via location should not be same");	
				$("#via").focus();
				return false;
			}   
			if($("#to_loc").val() == $("#via").val())
			{
				alert("Drop off & Via location should not be same");	
				$("#via").focus();
				return false;
			}
		}
		
		if (from_loc_flag == false) 
		{
			return false;
		}
		else if (to_loc_flag == false) 
		{
			return false;
		}
		else if (via_flag == false) 
		{ 
			return false;
		}
		else{
			$('#booking').submit(); 	
		}
    }
}
// convert string to date
function toDate(dateStr) {
    var part = dateStr.split(" ");
	var parts = part[0].split("-");
    return new Date(parts[2] +"-"+ parts[1] +"-"+ parts[0] +" "+part[1] +" "+part[2]).getTime();
}

// On Page load
$(document).ready(function() 
{
	$('.drop_time').hide();	
	$(".alert-next").hide();
	$(".user-contact-div").hide();
	
	// for less UI
	$('.extra_fields').hide();
	$('#to_loc').blur(function(){
		$('.extra_fields').fadeIn(2000);		
	});
	//http://trentrichardson.com/examples/timepicker/
	var startDateTextBox = $('.datetimepicker');
	var endDateTextBox = $('.dropdatetimepicker');
	
	currentTime = new Date();
	currentTime.setMinutes(currentTime.getMinutes() + 30);
	$('.datetimepicker').datetimepicker({
		dateFormat: "dd-mm-yy",
		timeFormat: "hh:mm tt",
		minDate: currentTime,
		showButtonPanel:  false,
		autoclose: true,
		controlType: 'select',
		oneLine: true,
		onSelect: function (selectedDateTime)
		{
			var finalduration = $('#finalduration').val();	
			if (finalduration)
			{
				var finalduration = finalduration.split(" ");
				var startdatetime = startDateTextBox.datetimepicker('getDate');
				
				if(finalduration[2]){
					var extratime = (finalduration[0] * 3600000) + (finalduration[2] * 60000);
				}
				else{
					var extratime = (finalduration[0] * 60000);
				}
				
				startdatetime.setTime(startdatetime.getTime() + extratime);
				select_startdatetime = startdatetime.getTime();
				$('#MinEndDate').val(select_startdatetime);
				endDateTextBox.datetimepicker('option', 'minDate', startdatetime);
				endDateTextBox.datetimepicker('option', 'hourMin', startdatetime.getHours());
				endDateTextBox.datetimepicker('option', 'minuteMin', startdatetime.getMinutes());	
				
			}	
		}
	});
	
	$('.dropdatetimepicker').datetimepicker({
		dateFormat: "dd-mm-yy",
		timeFormat: "hh:mm tt",
		showButtonPanel:  false,
		autoclose: true,
		controlType: 'select',
		oneLine: true,
		minDate: currentTime		
	});
		
	
    $('.distance-icon').hide();
	$('.duration-icon').hide();
	
	// for single & round trip & drop date time //home & search
	$('input:radio[name=trip]').change(function() {
        if (this.value == 'single') {
            //$('.pickup_time').fadeOut();
			$('.drop_time').fadeOut();
        }
        else if (this.value == 'round') { 
			$('.pickup_time').fadeIn();
			$('.drop_time').fadeIn();
        }
    });
	
	//<via> btn & text box
	$('.via').hide();
	if($('#via').val() != ''){
		$('.via').show();
		$('.via_btn').hide();
	}
	$('.via_btn').click(function(){
		$(this).hide();
		$('.via').fadeIn(1000);	
		via_flag = false;
	});
		
	$('.via_close').click(function(){
		$('#via').val('');
		$('.via_btn').fadeIn();
		$('.via').fadeOut();
		via_flag = true;	
	});
	//</via>
		
	$("#search").click(function(){
		$('.extra_fields').fadeIn(2000);
	});
	// submit when click on stripe btn
	$(".pay").click(function(){
		$('#passenger').submit();	
	});
	
	$("#booking").validate({
		rules: {
			trip: "required",
			from_loc: {
				required: true,
			},
			to_loc: {
				required: true,
			},
			passenger: "required",
			luggage: "required",
			pickup: "required",
			drop: {
				required: function(element) {
					return $('.isround').is(':checked')
				}
			}
		}
	});
	
	$("#passenger").validate({
		rules: {
			FirstName: "required",
			LastName: "required",
			Email: "required",
			Contact: "required",
		}
	});
	
	// get distance & time when drop place is choossen // Home & search
	$("#to_loc").blur(function()
	{
		$('.distance').empty();
		$('.duration').empty();	
		var fromLoc = $("#from_loc").val();
		var toLoc = $("#to_loc").val();
		var departure_time = new Date().getTime();
		
		$.post(base_url+"home/gettimedistance/",
		{
			fromLoc: fromLoc,
			toLoc: toLoc,
			departure_time: departure_time
		},
		function(data, status){
			var arr2 = jQuery.parseJSON(data);
	
			if(arr2.distance != null){
				$('#finaldistance').val(arr2.distance);	
			}
			if(arr2.duration != null){
				$('#finalduration').val(arr2.duration);	
			}
		});
	});
});
// check going out provicer selected or not when click on return tab 
$('.step_two').click(function()
{
	if(is_first_step == false)
	{
		alert("Please select going out cab first");
		return false;
	}
});
// when click on return tab for cab selection
function next_step(id)
{
	is_first_step = true;
	$('.tab2').click();
	//$(".alert-next").fadeIn();
	$('.set-hidden').html($('.hidden-value-'+id).html());
}
//ajax get user if already loged in
function get_user()
{
	$.get(base_url+"user/ajax_get_user/", function(data, status)
	{
        var arr = jQuery.parseJSON(data);
		$(".user-name").append(arr.FirstName +" "+ arr.LastName);
		$(".user-details").show();
		
		if(arr.Email != null)
		{
			$(".user-email").append(arr.Email);
			$(".user-email-div").show();
		}
		else
		{
			$(".user-email-div").hide();	
		}
		 
		if(arr.Contact != null)
		{
			$(".user-contact").append(arr.Contact);
			$(".user-contact-div").show();
		}
		else
		{
			$(".user-contact-div").hide();	
		}
    });
}

//ajax login
/*$(".btn-login").click(function()
{
	var Email = $(".login-email").val();
	var Password = $(".login-password").val();
	
	if(Email != '' && Password != '')
	{
		waitingDialog.show('Please Wait');
		$.post(base_url+"user/ajax_login/",
		{
			Email: Email,
			Password: Password,
		},
		function(data, status)
		{
			if(data == 1)
			{
				$(".passanger").hide();
				$(".payment").fadeIn();
				$(".alert-login-success").fadeIn();
				get_user();
				location.reload();
			}	
			else
			{
				$(".alert-login-fail").fadeIn();
			}
		});	
	} 
	else
	{
		$(".alert-login-fail").fadeIn();
	}
});
//ajax register
$(".btn-register").click(function()
{
	var FirstName 	= $(".register-firstname").val();
	var LastName 	= $(".register-lastname").val();
	var Email 		= $(".register-email").val();
	var Contact 	= $(".register-phone").val();
	var Password 	= $(".register-password").val();
	
	if(FirstName == ''){
		alert('Please Enter FirstName');	
		$(".register-firstname").focus();
		return false;
	}
	if(LastName == ''){
		alert('Please Enter LastName');	
		$(".register-lastname").focus();
		return false;
	}
	if(Email == ''){
		alert('Please Enter Email');	
		$(".register-email").focus();
		return false;
	}
	else
	{
		if (!validateEmail(Email)) {
			alert('Please Enter valid Email');
			$(".register-email").focus();
			return false;
		}
	}
	if(Contact == ''){
		alert('Please Enter Contact');	
		$(".register-phone").focus();
		return false;
	}
	else
	{
		if (!validatePhone(Contact)) {
			alert('Please Enter valid Contact');
			$(".register-phone").focus();
			return false;
		}
	}
	if(Password == ''){
		alert('Please Enter Password');	
		$(".register-password").focus();
		return false;
	}
	else
	{
		if (Password.length < 6) {
			alert('Please enter at least 6 characters.');
			$(".register-password").focus();
			return false;
		}
	}
	waitingDialog.show('Please Wait');
	$.post(base_url+"user/ajax_register/",
    {
		FirstName: FirstName,
		LastName: LastName,
		Email: Email,
		Contact: Contact,
        Password: Password,
    },
    function(data, status)
	{
		if(data == 1)
		{
			$(".passanger").hide();
			$(".payment").fadeIn();
			$(".alert-register-success").fadeIn();
			get_user();
			location.reload();
		}
		else if(data == 2)
		{
			waitingDialog.hide();
			$(".alert-register-exist").fadeIn();
		}	
		else
		{
			waitingDialog.hide();
			$(".alert-register-fail").fadeIn();
		}
	});
});
*/
function validatePhone(field) {
    if (field.match(/^\d{10}/)) {
         return true;
    } 
    return false;
}

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

