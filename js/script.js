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

function load_comments() {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState==4 && xhr.status==200) {
			document.getElementById("comments").innerHTML = xhr.responseText;
		}
	}
	xhr.open("GET", url_load_comments, true);
	xhr.send();
}
if (typeof url_load_comments !== "undefined") {
	load_comments();
}

if (typeof url_add_comments !== "undefined") {
	var comment_form = document.forms["comment"];
	comment_form.addEventListener("submit", function(e) {
		var form_data = new FormData(document.forms["comment"]);
		var xhr = new XMLHttpRequest();
		xhr.open("POST", url_add_comments, true);
		xhr.onload = function(e) {
			if (xhr.status == 200) {
				if (xhr.responseText.search("SUCCESS") != -1) {
					alert("Comment successfully added.");
					load_comments();
				} else {
					alert("Failed to add comment.");
				}
			} else {
				alert("Failed to add comment.");
			}
		};
		xhr.send(form_data);
		e.preventDefault();
	});
}