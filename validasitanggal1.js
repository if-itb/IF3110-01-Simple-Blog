function validatedate(inputText)
{
	var date=new Date();

	var validformat= /^\d{4}-\d{1,2}-\d{1,2}$/
	
	document.form1.tanggal.focus();  
	var returnval = false;
	if(!inputText.value.match(validformat))
	{
		alert("Tanggal tidak valid (format penulisan)");
	}
	else
	{
		var year = inputText.value.split("-")[0];
		var month = inputText.value.split("-")[1];
		var day = inputText.value.split("-")[2];		

		if(month > 0 && month <= 12 && day <= 31)
		{
			if(year >= date.getFullYear())
			{
				if(year == date.getFullYear())
				{
					if(month > date.getMonth()) //tahun sama, bulan sama atau sama dengan
					{ 
						if(month == date.getMonth()) //tahun sama, bulan sama
						{
							if(date < date.getFullDay())
								alert("Tanggal tidak valid");
							
							else
							{
								if((month==1 || month==3 || month==5 || month==7 || month==8|| month==10 ||month==12) && day<=31)
									returnval = true;
								else if((month==4 || month==6 || month==9 || month==11) && day<=30)
										returnval = true;
									else if(month==2 && year%4==0 && day<=29)
										returnval = true;
										else if(month==2 && year%4!=0 && day<=28)
											returnval = true;
												else
													alert("Tanggal tidak valid");
							}
						}
						else //year sama, month lebih besar
						{
							if((month==1 || month==3 || month==5 || month==7 || month==8|| month==10 ||month==12) && day<=31)
									returnval = true;
								else if((month==4 || month==6 || month==9 || month==11) && day<=30)
										returnval = true;
									else if(month==2 && year%4==0 && day<=29)
										returnval = true;
										else if(month==2 && year%4!=0 && day<=28)
											returnval = true;
												else
													alert("Tanggal tidak valid");
						}
					}
					else
					{
						alert("Tanggal tidak valid");
					}
				}
				else //year lebih besar
				{
					if((month==1 || month==3 || month==5 || month==7 || month==8|| month==10 ||month==12) && day<=31)
						returnval = true;
							else if((month==4 || month==6 || month==9 || month==11) && day<=30)
									returnval = true;
								else if(month==2 && year%4==0 && day<=29)
									returnval = true;
									else if(month==2 && year%4!=0 && day<=28)
										returnval = true;
											else
												alert("Tanggal tidak valid");
				}
			}
			else
			{
				alert ("Tanggal tidak valid");
			}
		}
		else
		{
			alert("Tanggal tidak valid");
		}
	}
		
	document.form1.tanggal.focus();  
	return returnval;
}