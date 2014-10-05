function validateDate(inputDate) {
    // regular expression format tanggal yang valid
    var re = /^\d{4}\-\d{1,2}\-\d{1,2}$/;

    if(inputDate.value != '' && !inputDate.value.match(re)) {
     	alert("Format tanggal salah: " + inputDate.value +"\nFormat tanggal yang benar: YYYY-MM-DD");
      	document.addPost.Tanggal.focus();
      	return false;
    } else if(isDate(inputDate)) {
    	var today = new Date();
      	if(!isDateTrue(inputDate, today)){
      		alert("Tanggal harus lebih besar atau sama dengan " + today.getFullYear() + "-" + (today.getMonth()+1) + "-" + today.getDate());
      		document.addPost.Tanggal.focus();
      		return false;  
      	}
    } else {
    	alert("Tanggal tidak logis");
      	document.addPost.Tanggal.focus();
      	return false;
    }
}

function isDate(inputDate){
	//Pekondisi: Format tanggal pasti benar
	var date = inputDate.value.split("-");
	if ((parseInt(date[0]) > 0) && (parseInt(date[1]) > 0) && (parseInt(date[2]) > 0)){
		if (parseInt(date[1]) == 2){
			if (parseInt(date[0])%4 == 0){
				return (parseInt(date[2]) <= 29);
			} else {
				return (parseInt(date[2]) <= 28);
			}
		} else if((parseInt(date[1]) == 1) || (parseInt(date[1]) == 3) || (parseInt(date[1]) == 5) || (parseInt(date[1]) == 7) || (parseInt(date[1]) == 8) || (parseInt(date[1]) == 10) || (parseInt(date[1]) == 12)){
			return (parseInt(date[2]) <= 31); 
		} else {
			return (parseInt(date[2]) <= 30);
		}
	} else {
		return false;
	}
}

function isDateTrue(inputDate, today){
	//Pekondisi: Format tanggal pasti benar
	var date = inputDate.value.split("-");
    if (parseInt(date[0]) > parseInt(today.getFullYear())){
    	return true;
    } else if (parseInt(date[0]) < parseInt(today.getFullYear())){
    	return false;
    } else {
    	if (parseInt(date[1]) > parseInt(today.getMonth()+1)){
    		return true;
    	} else if (parseInt(date[1]) < parseInt(today.getMonth()+1)){
    		return false;
    	} else {
    		if (parseInt(date[2]) < parseInt(today.getDate())){
	    		return false;
	    	} else {
	    		return true;
	    	}
    	}
    }

}