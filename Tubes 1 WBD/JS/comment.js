function getParam() {
    var s1 = location.search.substring(1, location.search.length).split('&'),
        r = {}, s2, i;
	s2 = s1[0].split('=');
    return s2[1]; //id of the post
};

function commentAjax() {
	var xmlhttp;
	var param = getParam(); //id of the post
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			var response = xmlhttp.responseText;
			if (response!="") {
				document.getElementById("commentList").innerHTML = response;
				document.getElementById("namePerson").value = "";
				document.getElementById("email").value = "";
				document.getElementById("comment").value = "";
			}
		}
	}
	xmlhttp.open("GET","../PHP/loadComment.php?id="+param,true);
	xmlhttp.send();
}

function addComment() {
/*	add new comment AJAX */
	var param = getParam();
	var x = document.getElementById("namePerson").value;
	var y = document.getElementById("email").value;
	var z = document.getElementById("comment").value;
	
	//date & time will be inserted from PHP
	var xmlhttp;
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			var response = xmlhttp.responseText;
			if (response=="ok") {
				commentAjax(); //display the comment
			}
		}
	}
	xmlhttp.open("GET","../PHP/addComment.php?id="+param+"&name="+x+"&email="+y+"&comment="+z,true);
	xmlhttp.send();
}

function validateForm() {
/* 	check comment form */
	var x = document.getElementById("namePerson").value;
	var y = document.getElementById("email").value;
	var z = document.getElementById("comment").value;
	var val = true;
	var errMessage = "";
	if (x==="") {
		val = false;
		errMessage += " Name must be filled!";
		document.getElementById("namePerson").style.borderColor="#FF0000";
	}
	if (y==="") {
		val = false;
		errMessage += " Email must be filled!";
		document.getElementById("email").style.borderColor="#FF0000";
	}
	else { //validate email format
		var pattern = /^(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
		if (!pattern.test(y)) {
			val = false;
			errMessage += " Wrong email format!";
		}
		//else no change
	}
	if (z==="") {
		val = false;
		errMessage += " Comment must be filled!";
		document.getElementById("comment").style.borderColor="#FF0000";
	}
	if (!val) {
		alert(errMessage);
	}
	
	return val;
}

function deleteComment(formID, commentID) {
/*	Deleteing Post in home.php using AJAX */
	var xmlhttp;
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			var response = xmlhttp.responseText;
			if (response=="ok") {
				document.getElementById("commentNumber"+formID).innerHTML = "";
			}
		}
	}
	xmlhttp.open("GET","../PHP/deleteComment.php?id="+commentID,true);
	xmlhttp.send();
}

function validateDeletion() {
/*	Post deletion confirmation */
	var answer = confirm ("Are you sure want to delete this comment?");
	if (answer) {
		return true;
	}
	else return false;
}