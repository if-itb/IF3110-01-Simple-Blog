function addComment() {
/*	add new comment AJAX */
	var id = getId();
	var x = document.getElementById("Nama").value;
	var y = document.getElementById("Email").value;
	var z = document.getElementById("Komentar").value;
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
			if (response!="") {
				commentAjax(); //display the comment
			}
		}
	}
	xmlhttp.open("GET","komentar.php?Id="+id+"&Nama="+x+"&Email="+y+"&Komentar="+z,true);
	xmlhttp.send();
}

function commentAjax() {
	var xmlhttp;
	var id = getId(); //id of the post
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
				document.getElementById("semuaKomentar").innerHTML = response;
			}
		}
	}
	xmlhttp.open("GET","loadKomentar.php?Id="+id,true);
	xmlhttp.send();
}

function getId() {
    var s1 = location.search.substring(1, location.search.length).split('&'),
        r = {}, s2, i;
	s2 = s1[0].split('=');
    return s2[1]; //id of the post
};

