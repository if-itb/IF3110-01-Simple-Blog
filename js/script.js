'use strict';

function confirm_delete() {
	return confirm("Are you sure you want to delete the post?");
}

function validate_create() {

	var dateString = document.forms["post-create"]["date"].value;
	var dateToday = new Date().toDateString();
	var messageElement = document.getElementById("message-datenotvalid");
	
	if (new Date(dateString).getTime() < new Date(dateToday).getTime()) {
		if (messageElement.classList.contains("edit-hidden")) {
			messageElement.classList.remove("edit-hidden");
		}
		document.forms["post-create"]["date"].focus();
		return false;
	} else {
		return true;
	}
}