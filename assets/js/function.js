function Confirm_Delete(id) {
    if (confirm("Apakah Anda yakin menghapus post ini?")) {
        window.location = "hapus_post.php?id="+id; 
    } else {
    }
}

 function checkemail(email){
 	var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(!email.match(regex)){
		//document.getElementById("komentar_email").innerHTML="Email tidak valid!";
  		//document.getElementById("komentar_email").style.color="red";
		return false;
	}
	else{
		return true;
	}
 }

 function insert_komentar(idpost){
 	var email = document.getElementById("Email").value;
    if (checkemail(email)){
	 	//ajax
	 	var xmlhttp;
	 	var nama = document.getElementById("Nama").value;
        
        if(nama==""){
	 		nama="anonymous";
	 	}
		
        var komentar = document.getElementById("Komentar").value;
        if (window.XMLHttpRequest)
	 	{
	 		xmlhttp=new XMLHttpRequest();
	 	}
	 	else
	 	{
	 		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	 	}

	 	xmlhttp.onreadystatechange=function()
	 	{
	 		if (xmlhttp.readyState==4 && xmlhttp.status==200)
	 		{
	 			document.getElementById("komentar_email").innerHTML="";
	 			document.getElementById("Nama").value="";
	 			document.getElementById("Komentar").value="";
	 			document.getElementById("Email").value="";
                document.getElementById("comment_here").innerHTML=xmlhttp.responseText;	
	 		}
	 	}
	 	xmlhttp.open("POST","add_comment.php",true);
	 	xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	 	xmlhttp.send("id="+idpost+"&nama="+nama+"&komentar="+komentar+"&email="+email);
 	}
 	else{
        //return false;
 		alert("Email yang anda masukkan salah. Coba Lagi");
 	}
 }