function validasitanggal(inputText)
{
	if (validatedate(inputText)==true)
	{
		document.getElementById("simpan").disabled = false;
	}
}

function validatedate(inputText)  
  {
  //var dateformat = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;  
  var dateformat = /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/;
	var r=true;
	
  // Match the date format through regular expression  
  if(inputText.value.match(dateformat))  
  {  
  document.form1.Tanggal.focus();  
  //Test which seperator is used '/' or '-'  
  var opera1 = inputText.value.split('/');  
  var opera2 = inputText.value.split('-');  
  lopera1 = opera1.length;  
  lopera2 = opera2.length;  
  // Extract the string into month, date and year  
  if (lopera1>1)  
  {  
  var pdate = inputText.value.split('/');  
  }  
  else if (lopera2>1)  
  {  
  var pdate = inputText.value.split('-');  
  }  
  var yy = parseInt(pdate[0]);  
  var mm  = parseInt(pdate[1]);  
  var dd = parseInt(pdate[2]);  
  // Create list of days of a month [assume there is no leap year by default]  
  var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];  
  d = new Date();
  if (yy<d.getFullYear())
  {
	alert('Tanggal salah!');  
	r=false;
  }else{
	if (yy==d.getFullYear())
	{
		if ( mm<d.getMonth()+1)
		{
		alert('Tanggal salah!');  
		r=false;
		}else
		{
		if (mm==getMonth()+1)
		{
			if (dd<d.getDate())
			{
			alert('Tanggal salah!');  
			r=false;
			}
		}
	}
  }
  }
  if (mm==1 || mm>2)  
  {  
	if (dd>ListofDays[mm-1])  
		{  
			alert('Tanggal salah!');  
			r=false;  
		}  
  }  
  if (mm==2)  
	{  
		var lyear = false;
		if ( (!(yy % 4) && yy % 100) || !(yy % 400))   
		{  
			lyear = true;  
		}  
		if ((lyear==false) && (dd>=29))  
		{  
			alert('Tanggal salah!');  
			r=false;  
		}  
		if ((lyear==true) && (dd>29))  
		{  
			alert('Tanggal salah!');  
			r=false;  
		}
	}  
  }  
  else  
  {  
  alert("Tanggal salah!");
  document.form1.Tanggal.focus();  
  r=false;  
  }
  return r;
  }

function invalid_button()
{
	//if (validatedate(document.form1.Tanggal)==false)
	//{
	document.getElementById("simpan").disabled = true;
	//}else{document.getElementById("simpan").disabled = false;}
}