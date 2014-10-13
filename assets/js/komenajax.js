function submitcomment() {
	if(emailvalidator()) {
		comment_add();
		load_comment();
		return true;
	} else {
	return false;
	}
}

function initAjax(){
	var initAjax;
	if (window.XMLHttpRequest) {
		initAjax = new XMLHttpRequest();
	} else {
		initAjax = new ActiveXObject("Microsoft.XMLHTTP");
	}
	return initAjax;
}

function comment_add() {
	var ajax = initAjax();
	if(ajax) {
		
		ajax.open("POST","comment_processor.php",false);
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		var nama = encodeURIComponent(document.getElementById("Nama"));
		var email = encodeURIComponent(document.getElementById("Email"));
		var komentar = encodeURIComponent(document.getElementById("Komentar"));
		var id = encodeURIComponent(document.getElementById("id"));
		ajax.send("mode=add&id="+id+"&nama="+nama+"&komentar="+komentar+"&email="+email);
	}
}

function load_comment() {
	var ajax = initAjax();
	if(ajax) {
		ajax.onreadystatechange = function() {
			if(ajax.readyState == 4) {
				document.getElementById("comments").innerHTML = ajax.responseText;
			}
		};
		var id = document.getElementById("id").value;
		ajax.open("GET","comment_processor.php?mode=retrieve&id="+id,false);
		ajax.send();
	}
}	

function emailvalidator() {
	var email = document.getElementById("Email").value;
	var at = email.indexOf("@");
	var dot = email.lastIndexOf(".");
	if (at< 1 || dot<at+2 || dot+2>=email.length) {
	return false;
	}
	return true;
}

