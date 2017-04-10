function validate()
{
	if(document.forms['details']['fullname'].value == "")
	{
		var x;
		x = "This field cannot be left blank!"
		document.getElementById("span1").innerHTML = x;
		document.forms['details']['fullname'].focus();
		return false;
	}	

	if(document.forms['details']['fullname'].value == "")
	{
		var x;
		x = "This field cannot be left blank!"
		document.getElementById("span1").innerHTML = x;
		document.forms['details']['fullname'].focus();
		return false;
	}
	if(document.forms['details']['address'].value == "")
	{
		var x;
		x = "Address cannot be left blank!";
		document.getElementById("span2").innerHTML = x;
		document.forms['details']['address'].focus();
		return false;
	}
	
	if(document.forms['details']['citylist'].value == "-1" || document.forms['details']['citylist'].value == "0")
	{
		var x;
		x = "Please select a valid city or the City you have selected is not supported yet.";
		document.getElementById("span3").innerHTML = x;
		document.forms['details']['citylist'].focus();
		return false;
	}
	
	if(document.forms['details']['pincode'].value == "")
	{
		var x;
		x = "Invalid Pin Code."
		document.getElementById("span4").innerHTML = x;
		document.forms['details']['pincode'].focus();
		return false;
	}
	if(document.forms['details']['email'].value != "")
	{
		var x = document.forms['details']['email'].value;
		var atpos = x.indexOf("@");
		var dotpos = x.lastIndexOf(".");
		if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) 
		{
			document.getElementById("span6").innerHTML = "Invalid Email Address";
			document.forms['details']['email'].focus();
			return false;
		}
	}
	else if(document.forms['details']['email'].value == "")
	{
		document.getElementById("span6").innerHTML = "This Field cannot be left blank.";
		document.forms['details']['email'].focus();
		return false;
	}
	
	if(document.forms['details']['number'].value == "")
	{
		document.getElementById("span5").innerHTML = "Invalid Phone Number";
		document.forms['details']['number'].focus();
		return false;
	}
	
	else if(document.forms['details']['number'].value != "")
	{
		if(document.forms['details']['number'].length == 10)
		{
			var p = /^\(?([7-9]{1})\)?[-. ]?([0-9]{9})$/;
			if(document.forms['details']['number'].value.match(p))
			{}
			else
			{
				document.getElementById("span5").innerHTML = "Wrong number added, please enter valid number.";
				document.forms['details']['number'].focus();
				return false;
			}
			if(document.forms['details']['number'].length != 10)
			{
					document.getElementById("span5").innerHTML = "A number must be of 10 digits only!";
					document.forms['details']['number'].focus();
					return false;
			}
		}
	}
}// JavaScript Document