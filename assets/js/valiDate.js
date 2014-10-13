var regex_ValidDate = /^\d{4}\/\d{2}\/\d{2}$/;
function checkValid(inputDate) {
	if (regex_ValidDate.test(inputDate.value)){
		var yearfield = inputDate.value.split("/")[0];
		var monthfield = inputDate.value.split("/")[1];
		var dayfield = inputDate.value.split("/")[2];
		
		if (checkValidValue(dayfield,monthfield,yearfield)){
			if (checkDate(dayfield,monthfield,yearfield)){
				alert('New post accepted. Page will reload.');
				form1.action = "new_post.php";
			}
			else {
				alert('Invalid Date! Please input with valid values of day, month and year.');
				form1.action = "#";
				return false;
			}
		}
		else {
			alert('Invalid past value! Please input the date of today or the future.');
			form1.action = "#";
			return false;
		}
		
	}
	else {
		alert('Invalid date input! Please input with the following format; yyyy/mm/dd');
		form1.action = "#";
		return false;
	}
}
function checkDate(dd,mm,yy){
	var currentDate = Date();
	var inputDate = Date(yy,mm-1,dd);
	return (inputDate >= currentDate);
}

function checkValidValue(dayfield,monthfield,yearfield){
	if (yearfield < 0 || dayfield < 1 || monthfield < 1){
		return false;
	}
	else if (monthfield > 12){
		return false;
	}
	else if (monthfield == 1 || monthfield == 3 || monthfield == 5 || monthfield == 7 || monthfield == 8 || monthfield == 10){
		return (dayfield <= 31);
	}
	else if (monthfield == 2){
		if (((!(yearfield % 4)) && yearfield % 100) || !(yearfield % 400)){ //kabisat
			return (dayfield <= 29);
		}  
	}
	else {
		return (dayfield <= 30);
	}
}