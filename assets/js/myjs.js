function validateEmail() {
	var email = document.getElementById("Email").value;
	var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var result = pattern.test(email);   
	
	if (!result) {      
		document.getElementById("Email").style["background-color"] = "#ffaaaa";
		document.getElementById("SubmitKomentar").disabled = true;
	} else {
		document.getElementById("Email").style["background-color"] = "#aaffaa";
		document.getElementById("SubmitKomentar").disabled = false;
	}
	return result;
}

function sendComment() {
	var idPost = encodeURIComponent(document.getElementById("IdPost").value);
	var nama = encodeURIComponent(document.getElementById("Nama").value);
	var email = encodeURIComponent(document.getElementById("Email").value);
	var komentar = encodeURIComponent(document.getElementById("Komentar").value);   
	
	if (!validateKomentar(nama, email, komentar)) {
		return false;
	}

	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			existingComment = document.getElementById("komentar-placeholder").innerHTML;
			document.getElementById("komentar-placeholder").innerHTML = xmlhttp.responseText + existingComment;
			
			document.getElementById("Nama").value = '';
			document.getElementById("Email").value = '';
			document.getElementById("Komentar").value = '';
		}
	}
					
	var parameters = "idpost=" + idPost + "&nama=" + nama + "&email=" + email + "&komentar=" + komentar;
	xmlhttp.open("POST", "send_comment.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");    
	xmlhttp.send(parameters);
}

window.onload = loadComment();

function loadComment() {
	var idPost = encodeURIComponent(document.getElementById("IdPost").value);

	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("komentar-placeholder").innerHTML = xmlhttp.responseText;
		}
	}
					
	var parameters = "idpost=" + idPost;
	xmlhttp.open("GET", "load_comment.php?" + parameters, true);    
	xmlhttp.send(null);
}

function validateKomentar(nama, email, komentar) {
	if (isEmpty(nama)) {
		alert('Kolom nama tidak boleh kosong');
		return false;
	}
	if (isEmpty(email)) {
		alert('Kolom email tidak boleh kosong');
		return false;
	}
	if (isEmpty(komentar)) {
		alert('Kolom komentar tidak boleh kosong');
		return false;
	}
	if (!validateEmail()) {
		alert('Email tidak valid');
		return false; 
	}
	
	return true;
}

function confirmDeletion(postId) {
	var confirm = window.confirm("Apakah Anda yakin menghapus post ini?");
	if (confirm == true) {
		window.location = "delete_post.php?p=" + postId;
	} else {
		return false;
	}
}

function validate() {
	var judul = document.getElementById("Judul").value;        
	var content = document.getElementById("Konten").value;
	var validDateFormat = true;
	var rawDate, tanggal;
	try {
		rawDate = document.getElementById("Tanggal").value.split("/");
		if (rawDate[2] < 1990 || rawDate[2] > 2099 || rawDate[0] < 0 || rawDate[0] > 12 || rawDate[1] < 0 || rawDate[1] > 31) {
			validDateFormat = false;
		} else {
			tanggal = new Date(rawDate[2], rawDate[0] - 1, rawDate[1]);
		}
	} catch(exception) {
		validDateFormat = false;
	}
	var today = new Date();

	if (isEmpty(judul)) {
		alert("Judul tidak boleh kosong");
		return false;            
	}
	if (validDateFormat) {            
		if (!compareDate(tanggal, today)) {
			alert("Format tanggal tidak valid");
			return false;
		}
	} else {
		alert("Format tanggal tidak valid");        
		return false;
	}
	if (isEmpty(content)) {
		alert("Konten tidak boleh kosong");  
		return false;
	}

	return true;
}

function compareDate(tanggal, today) {        
	if (tanggal.getFullYear() > today.getFullYear())
		return true;
	if (tanggal.getFullYear() < today.getFullYear())
		return false;
	if (tanggal.getMonth() > today.getMonth())
		return true;
	if (tanggal.getMonth() < today.getMonth())
		return false;
	if (tanggal.getDate() >= today.getDate())
		return true;
	if (tanggal.getDate() < today.getDate())
		return false;
}

function isEmpty(val){
	return (val === undefined || val == null || val.length <= 0) ? true : false;
}