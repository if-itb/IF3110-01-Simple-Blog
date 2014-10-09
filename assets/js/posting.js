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

 //fungsi mengirim komentar dari use ke php
 function ins_komentar(id){
 	var xmlhttp;
 	var nama = document.getElementById("Nama").value;
 	var komentar = document.getElementById("Komentar").value;
 	var tanggal = "2014-10-08";
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