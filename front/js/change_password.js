$(document).ready(function() 
{	
	$(".change_pass").validate({
		rules: {
			OldPassword: {
				required: true,
				minlength: 6
			},
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
			OldPassword: {
				minlength: "Please enter minimum 6 characters."
			},
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




