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
				required: "Please enter a password.",
				minlength: "Please enter minimum 6 characters."
			},
			ConPassword: {
				required: "Please enter a password",
				minlength: "Please enter minimum 6 characters.",
				equalTo: "Confirm password does not match."
			}
		}	
	});
});




