function getId() {
    var s1 = location.search.substring(1, location.search.length).split('&'),
        r = {}, s2, i;
	s2 = s1[0].split('=');
    return s2[1]; //id of the post
};

function comment() {
	var xmlhttp;
	var id_post=getId();
	if (window.XMLHttpRequest)
  		{// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    	var response = 	xmlhttp.responseText;
	    	if(response !="") {
	    		document.getElementById("commentList").innerHTML=response;
	    	}
	    }
	  }
	xmlhttp.open("GET","loadComment.php?id="+id_post,true);
	xmlhttp.send();
}

function validateComment() {
	console.log("masuk validate");
	var check = true;
	var errorMsg="";
	var commenter = document.getElementById("Nama").value;
	var email = document.getElementById("Email").value;
	var isi = document.getElementById("Komentar").value;
	//validasi form
	if(commenter==="")
	{
		check =false;
		errorMsg = "Isi nama anda";
	}
	if(email==="") {
		check = false;
		errorMsg="Isi email anda";
	}
	else {
			var pattern = /^(?:[a-z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
			if(!email.match(pattern)) {
			check = false;
			errorMsg += " Wrong email format!";
			}
	}
	if(isi===""){
		check=false;
		errorMsg="Isi komentar anda";
	}
	if(!check) {
		alert(errorMsg);
	}
	return check;
}

function addComment() {
/*	add new comment AJAX */
	var param = getId();
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
			if (response=="ok") {
				//comment(); //display the comment
			}
		}
	}
	xmlhttp.open("GET","saveComment.php?id="+param+"&Nama="+x+"&Email="+y+"&Konten="+z,true);
	xmlhttp.send();
}