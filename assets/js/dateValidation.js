function dateValidation() {
	var date = document.getElementById("Tanggal").value.split("/");
	var dd = parseInt(date[0]);
	var mm = parseInt(date[1]);
	var yyyy = parseInt(date[2]);

	var today = new Date();
	if (isDate(dd, mm, yyyy) && compare(dd, mm, yyyy, today.getDate(), today.getMonth() + 1, today.getFullYear()) >= 0) {
		document.getElementById("Tanggal").style.background = "white";
		//window.alert("Date is true!");
		return true;
	} else {
		document.getElementById("Tanggal").style.background = "rgb(255,105,97)";
		window.alert("Please enter a valid date!");
		return false;
	}
}

function isDate(day, month, year) {
	if (year >= 1900 && year <= 2100) {
		if (month == 1 || month == 3 || month == 5 || month == 7 || month == 8 || month == 10 || month == 12) {
			return day >= 1 && day <= 31;
		} else if (month == 4 || month == 6 || month == 9 || month == 11) {
			return day >= 1 && day <= 30;
		} else if (month == 2) {
			if (isLeap(year)) {
				return day >= 1 && day <= 29;
			} else {
				return day >= 1 && day <= 28;
			}
		}
	}

	return false;
}

function isLeap(yyyy) {
	return (yyyy % 4 == 0 && yyyy % 100 != 0 ) || yyyy % 400 == 0;
}

function compare(day1, month1, year1, day2, month2, year2) {
	if (year1 == year2) {
		if (month1 == month2) {
			if (day1 == day2) {
				return 0;
			} else if (day1 < day2) {
				return -1;
			} else {
				return 1;
			}
		} else if (month1 < month2) {
			return -1;
		} else {
			return 1;
		}
	} else if (year1 < year2) {
		return -1;
	} else {
		return 1;
	}
}
