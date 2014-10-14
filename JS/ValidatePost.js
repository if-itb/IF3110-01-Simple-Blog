function validateForm() {
/* 	Form validation of post form for a new post or editing a aost */
	var x = document.getElementById("Title").value;
	var y = document.getElementById("Date").value;
	var	value = true;
	var pattern = /^([0-9]{4,4})-([0-9]{2,2})-([0-9]{2,2})$/;
	var errMessage = "";
	
	if (x==="") {
		errMessage += " Title must be filled!";
		value = false;
		document.getElementById("Title").style.borderColor="#FF0000";
	}
	if (y==="") {
		errMessage += " Date must be filled!";
		value = false;
		document.getElementById("Date").style.borderColor="#FF0000";
	}
	else {
		if (pattern.test(y)) {
			//compare with current date 
			
			var t = new Date();
			var mon = t.getMonth()+1;
			var day = t.getDate();
			
			if (mon < 10) {
				mon = "0" + mon; 
			}
			if (d < 10) {
				day = "0" + day;
			}
			var str = (1900+t.getYear()) + "-" + mon + "-" + day;
			if (str > y) {
				errMessage = " Date must be later or equal to current date";
				value=false;
			}
		}
		else {
			errMessage += " Date format wrong!";
			value = false;
			document.getElementById("Date").style.borderColor="#FF0000";
		}
	}
	
	if (!value) {
		alert(errMessage);
	}
	return value;
}