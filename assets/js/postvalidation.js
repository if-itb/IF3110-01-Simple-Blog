function checkDate(field) { 
	var allowBlank = true; 
	var minDate = (new Date()).getDate();
	var minMonth = (new Date()).getMonth()+1;
	var minYear = (new Date()).getFullYear(); 
	var today = minDate +"/" + minMonth + "/" + minYear;
	var errorMsg = ""; 

	// regular expression to match required date format
 	re = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/; 
 	if(field.value != '') { 
 		if(regs = field.value.match(re)) { 
 			var isNotKabisat = (regs[3] % 400 != 0) || (regs[3] % 100 == 0 && regs[3] % 400 != 0) || (regs[3] % 4 != 0);
 			if (regs[3] < minYear){
 				errorMsg = errorMsg + "- Year is smaller than today(" + today +").\n";
 			}
 			else //the year is true
 			{
 				if (regs[2] < 1 || regs[2] > 12){
 					errorMsg = errorMsg + "- Month is not valid " + regs[2];
 				}
 				else
 				{
 					if (regs[2] < minMonth && regs[3] == minYear){
 						errorMsg = errorMsg + "- Month is smaller than today(" + today +").\n";
 					}
 					else
 					{
 						//31-days month
 						if (regs[2] == 1 || regs[2] == 3 || regs[2] == 5 || regs[2] == 7 || regs[2] == 8 || regs[2] == 10 || regs[2] == 12 ){
 							if (regs[1] < 1 || regs[1] > 31){
 								errorMsg = errorMsg +"- Date is not valid " + regs[1];
 							}
 							else
 							{
 								if (regs[1] < minDate && regs[2] == minMonth){
 									errorMsg = errorMsg + "- Date is smaller than today(" + today +").\n";
 								}
 							}
 						}
 						if (regs[2] == 2)
 						{
 							if (isNotKabisat)
 							{
 								if (regs[1] < 1 || regs[1] > 28){
	 								errorMsg = errorMsg +"- Date is not valid " + regs[1];
	 							}
	 							else
	 							{
	 								if (regs[1] < minDate && regs[2] == minMonth){
	 									errorMsg = errorMsg + "- Date is smaller than today(" + today +").\n";
	 								}
	 							}
 							}
 							else
 							{
 								if (regs[1] < 1 || regs[1] > 28){
	 								errorMsg = errorMsg +"- Date is not valid " + regs[1];
	 							}
	 							else
	 							{
	 								if (regs[1] < minDate && regs[2] == minMonth){
	 									errorMsg = errorMsg + "- Date is smaller than today(" + today +").\n";
	 								}
	 							}
 							}
 						}
 						else
 						{
 							if (regs[1] < 1 || regs[1] > 30){
 								errorMsg = errorMsg +"- Date is not valid " + regs[1];
 							}
 							else
 							{
 								if (regs[1] < minDate && regs[2] == minMonth){
 									errorMsg = errorMsg + "- Date is smaller than today(" + today +").\n";
 								}
 							}
 						}
 					}
 				}
 				
 			}
 		} 
 		else { errorMsg = "- Invalid date format: " + field.value; } 
 	} 
 	else if(!allowBlank) { errorMsg = "Empty date not allowed!"; 
 	} 
 	if(errorMsg != "") { 
 		alert("Date is not valid for some reason :\n" +errorMsg); 
 		field.focus(); 
 		return false; 
 			} 
 	return true; 
 }

 function checkForm(form){
 	var errorMsg = "";
 	if (form.Judul.value == ''){
 		errorMsg = errorMsg + "Judul ";
 	}
 	if (form.Tanggal.value == ''){
 		errorMsg = errorMsg + "Tanggal ";
 	}
 	if (form.Konten.value == ''){
 		errorMsg = errorMsg + "Konten ";
 	}
 	if (errorMsg != ""){
 		alert(errorMsg + "field is empty. Please fill it, then submit your post");
 		return false;
 	}
 	return checkDate(form.Tanggal);
 }