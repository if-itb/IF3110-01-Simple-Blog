 //fungsi untuk request komentar dari php
 function req_komentar(id)
 {
 	var xmlhttp;
 	if (window.XMLHttpRequest)
	  {
	  	xmlhttp=new XMLHttpRequest();	//untuk browser IE7+, Firefox, Chrome, Opera, Safari
	  }
	else
	  {
	  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");	//untuk browser IE6, IE5
	  }
	
	xmlhttp.onreadystatechange=function()
	{
  		if (xmlhttp.readyState==4 && xmlhttp.status==200)	//jika sudah selesai load dan status OK
    	{
    		document.getElementById("comment_here").innerHTML=xmlhttp.responseText;	//masukan respon ke id "comment_here"
    	}
  	}
	xmlhttp.open("GET","loadcomment.php?id="+id,true);
	xmlhttp.send();
 }

 function checkemail(id){
 	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var email=document.getElementById("Email").value;
	if(!email.match(re)){
		document.getElementById("email_comment").innerHTML="Email not Valid!";
  		document.getElementById("email_comment").style.color="red";
		return false;
	}
	else{
		ins_komentar(document.getElementById(id).value);
	}
 }

 //fungsi mengirim komentar dari use ke php
 function ins_komentar(id){
 	alert("masuk");
  	var tanggal = "2014-11-10";//new Date().getDate();
 	//var bulan = new Date().getMonth();
 	//var tahun = new Date().getYear();
 	
 	//ajax
 	var xmlhttp;
 	var nama = document.getElementById("Nama").value;
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
 			document.getElementById("Nama").value="";
 			document.getElementById("Komentar").value="";
 			document.getElementById("Email").value="";
 			document.getElementById("comment_here").innerHTML=xmlhttp.responseText;	//masukan respon ke id "comment_here"
 		}
 	}
 	xmlhttp.open("POST","add_comment.php",true);
 	xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
 	xmlhttp.send("id="+id+"&nama="+nama+"&komentar="+komentar+"&tanggal="+tanggal);
 }