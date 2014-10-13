function submitComment(pid,nama,email,komentar) {
	removeFormFields(); 
	komentar = komentar.replace(/(\r\n|\n|\r)/gm, '%0A');
	if(pid == ""){
		alert('error, post id tidak didefinisi');
		return false;
	}
	
	// validasi nama
	if(nama == ""){
		alert('isi nama anda untuk berkomentar');
		return false;
	}
	
	// validasi komentar
	if(komentar != ""){
		// validasi email tidak kosong
		if(email == ""){
			alert('isi email anda untuk berkomentar');
			return false;
		}
		// validasi email sesuai kaidah
		else if(validateEmail(email)){
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
				xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					document.getElementById("comments").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","comment_processor.php?pid="+pid+"&nama="+nama+"&email="+email+"&komentar="+komentar,true);
			xmlhttp.send();
			return false;
		}
		else{
			alert("alamat email tidak valid");
			return false;
		}
	}
	else{
		alert('komentar tidak boleh kosong');
		return false;
	}
}

function showComments(pid) {
  if (window.XMLHttpRequest) {
	// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	  document.getElementById("comments").innerHTML=xmlhttp.responseText;
	}
  }
  xmlhttp.open("GET","comment_processor.php?pid="+pid,true);
  xmlhttp.send();
}

function removeFormFields(){
	document.forms["CommentForm"]["Nama"].value = "";
	document.forms["CommentForm"]["Email"].value = "";
	document.forms["CommentForm"]["Komentar"].value = "";
}