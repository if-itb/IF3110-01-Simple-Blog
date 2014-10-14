function deletePostAjax(param, id) {
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
				document.getElementById("PostId"+param).innerHTML = "";
			}
		}
	}
	xmlhttp.open("GET","../PHP/DeletePost.php?hidden="+id,true);
	xmlhttp.send();
}

function validateDeletion() {
/*	Post deletion confirmation */
	var answer = confirm ("Are you sure want to delete this post?");
	if (answer) {
		return true;
	}
	else return false;
}