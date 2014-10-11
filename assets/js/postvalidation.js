function checkDate(field) { 
	var allowBlank = true; 
	var minDate = (new Date()).getDate();
	var minMonth = (new Date()).getMonth();
	var minYear = (new Date()).getFullYear(); 
	var today = new Date();
	var errorMsg = ""; 

	// regular expression to match required date format
 	re = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/; 
 	if(field.value != '') { 
 		if(regs = field.value.match(re)) { 
 			if(regs[1] < 1 || regs[1] > 31 || regs[1] < minDate) { 
 				errorMsg = "Invalid value for day: " + regs[1]; 
 				if (regs[1] < minDate)
 				{
 					errorMsg = errorMsg+". Value is smaller than today" + today;
 				}
 			} 
 			else if(regs[2] < 1 || regs[2] > 12 ) { 
 				errorMsg = "Invalid value for month: " + regs[2]; 
 			} 
 			else if(regs[3] < minYear || regs[3] > maxYear) { 
 				errorMsg = "Invalid value for year: " + regs[3] + " - must be between " + minYear + " and " + maxYear; } 
 			} 
 		else { errorMsg = "Invalid date format: " + field.value; } 
 	} 
 	else if(!allowBlank) { errorMsg = "Empty date not allowed!"; 
 	} 
 	if(errorMsg != "") { 
 		alert(errorMsg); 
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