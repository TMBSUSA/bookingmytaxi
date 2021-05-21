$(document).ready(function() 
{
	$("#resetpassword").validate({
		rules: {
			Password: {
				required: true,
				minlength: 6
			},
			ConPassword: {
				required: true,
				minlength: 6,
				equalTo: "#Password"
			}
		},
		messages: {
			Password: {
				minlength: "Please enter minimum 6 characters."
			},
			ConPassword: {
				minlength: "Please enter minimum 6 characters.",
				equalTo: "Confirm Password doesn't match."
			}
		}	
	});
});




