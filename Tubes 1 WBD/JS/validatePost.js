function validateForm() {
/* 	Form validation of post form for a new post or editing a aost */
	var x = document.getElementById("postTitle").value;
	var y = document.getElementById("postDate").value;
	var	value = true;
	var pattern = /^([0-9]{4,4})-([0-9]{2,2})-([0-9]{2,2})$/;
	var errMessage = "";
	
	if (x==="") {
		errMessage += " Title must be filled!";
		value = false;
		document.getElementById("postTitle").style.borderColor="#FF0000";
	}
	if (y==="") {
		errMessage += " Date must be filled!";
		value = false;
		document.getElementById("postDate").style.borderColor="#FF0000";
	}
	else {
		if (pattern.test(y) && isMDOk(y) ) {
			//compare with current date 
			
			var t = new Date();
			var m = t.getMonth()+1;
			var d = t.getDate();
			
			if (m < 10) {
				m = "0" + m; 
			}
			if (d < 10) {
				d = "0" + d;
			}
			var str = (1900+t.getYear()) + "-" + m + "-" + d;
			if ((str > y)) {
				errMessage = " Date must be later or equal to current date";
				value=false;
			}
			//else value still true
		}
		else {
			errMessage += " Date format wrong!";
			value = false;
			document.getElementById("postDate").style.borderColor="#FF0000";
		}
	}
	
	if (!value) {
		alert(errMessage);
	}
	return value;
}

function isMDOk(txt) {
/*	Validate month and day number */
	if (((txt[5]=='0' && txt[6]!='0') || (txt[5]=='1' && txt[6]<'3')) && (txt[8]+txt[9] < "32")) {
		return true;
	}
	else return false;
}