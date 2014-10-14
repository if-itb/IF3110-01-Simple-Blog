function submitcomment(ID){
	var name = document.getElementById('Nama').value;
	var email = document.getElementById('Email').value;
	var comment = document.getElementById('Komentar').value;
	
	if (valcomment(name, email, comment)){
		if (window.XMLHttpRequest){			//kode untuk IE7+, Firefox, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		}
		else{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
				document.getElementById("kom").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","submit_comm.php?ID="+ID +"&Nama="+name +"&Komentar="+comment, true);
		xmlhttp.send();
	}
	else{
		return false;
	}
}

function listcomment(ID){
	if (window.XMLHttpRequest){			//kode untuk IE7+, Firefox, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById("kom").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","show_comment.php?ID="+ID, true);
	xmlhttp.send();
}

function valcomment(name, email, comment){	
	if(name == null || name == "" || email == null || email == "" || comment == "" || comment == null){
		alert('Semua data harus diisi dengan benar!');
		return false;
	}
	else if(email != null || email != ""){
		var surel =/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if(surel.test(email) == false){
			alert('Email yang dimasukkan tidak valid!');
			return false;
		}
		else{
			document.forms["comment-area"].reset();
			return true;
		}
	}
	else{
		document.forms["comment-area"].reset();
		return true;
	}
}
