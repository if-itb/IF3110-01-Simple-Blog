function loadComment()
{
	var xmlhttp;
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
			document.getElementById("the_comment").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","comment.php?id_post=" + komen_form.ID_post.value,true);
	xmlhttp.send();
}


function load_post_comment()
{
	var xmlhttp;
	var IDPost = komen_form.ID_post.value;
	var NamaKomen = komen_form.Nama.value;
	var EmailKomen = komen_form.Email.value;
	var Komen = komen_form.Komentar.value;
	
	if(NamaKomen==null || NamaKomen=="")
	{
		NamaKomen = "Anonymous";
	}
	
	if (cekEmail()==false){
		komen_form.Email.select();
		return false;
	}
	
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
			document.getElementById("new_comment").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST","insert_comment.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("ID_post=" + IDPost + "&Nama=" + NamaKomen + "&Email=" + EmailKomen + "&Komentar=" + Komen);
	
	komen_form.Nama.value = "";
	komen_form.Email.value = "";
	komen_form.Komentar.value = "";
	
	loadComment();
}

function cekEmail()
{
   var cek = komen_form.Email.value;
   var atpos = cek.indexOf("@");
   var dotpos = cek.lastIndexOf(".");
	  if(atpos<1 || dotpos<atpos+2 || dotpos+2>=cek.length)
	  {
		alert("Alamat Email tidak lengkap !!!");
		return false;
	  }
}