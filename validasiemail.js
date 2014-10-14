function validateemail(input)
{
	//var validformat = /^\w+@[a-zA-Z_]{1,}+(\.[a-zA-Z]{1,6}){1,6}$/;
	document.form1.email.focus();  
	//var email = document.getElementById("email");
	var returnval = false; 
	alert(email);
	if(input.value.match(/^\w+@[a-zA-Z_]{1,}+(\.[a-zA-Z]{1,6}){1,6}$/))
	{
		returnval = true;
		alert("Email valid");
	}
	else {
		alert("Email tidak valid");
	}
	return returnval;
}