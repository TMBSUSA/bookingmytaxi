$(document).ready(function() 
{	
	$(".edit-prof").validate({
		rules: {
			FirstName: "required",
			LastName: "required",
			Email: {
				required: true,
				validEmail: true
			},
			Contact:{
				required: true,
				number: true,
				minlength: 10,
				maxlength: 17
			}	
		},
		messages:{
			Contact:{
				minlength: "Please enter minimum 10 digits."
			}
		}
	});
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


