function load_comment()
{
	var id_post= encodeURIComponent(document.getElementById("id_post").value);
	
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("isi_komentar").innerHTML=xmlhttp.responseText;
		}
	}
	
	var param = id_post;
	xmlhttp.open("GET", "load_comment.php?id="+param, true);
	xmlhttp.send(null);
}
function isEmpty(teks)
{
	if (teks.length<=0 || teks==null)
	{
		return true;
	}
	return false;
}
function validate_comment(nama, email, komentar)
{
	if (isEmpty(nama)){
		alert('Kolom nama tidak boleh kosong!');
		return false;
	}
	 if (isEmpty(email)){
		alert('Kolom email tidak boleh kosong!');
		return false;
	} 
	if (isEmpty(komentar)){
		alert('Kolom komentar tidak boleh kosong!');
		return false;
	} 
	/* if (!validateEmail()){
		alert('Format email salah!');
		return false;
	} */ 
	return true;
}
function save_comment()
{
	var nama = encodeURIComponent(document.getElementById("Nama").value);
	var id_post= encodeURIComponent(document.getElementById("id_post").value);
	var email= encodeURIComponent(document.getElementById("Email").value);
	var komentar= encodeURIComponent(document.getElementById("Komentar").value);
	
	//alert(email);
	if (validate_comment(nama, email, komentar)==true)
	{//return false;}
	//alert(nama);
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function()
	{
	//alert ("status"+xmlhttp.status);
	//alert ("ready state"+xmlhttp.readyState);

		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			
			savedComments = document.getElementById("isi_komentar").innerHTML;
			document.getElementById("isi_komentar").innerHTML = savedComments + xmlhttp.responseText;
			
			document.getElementById("Nama").value='';
			document.getElementById("Email").value='';
			document.getElementById("Komentar").value='';
		}
	}
	var param = "id=" + id_post + "&nama=" + nama + "&email=" + email + "&komentar=" + komentar;
	xmlhttp.open("POST", "save_comment.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(param);
	//alert("ready");
	}//else{return false;}
}

function validateEmail(teks)
{
	var email = document.getElementById("Email").value;
	var format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if (teks.value.match(format))
	{
		document.form2.Email.focus();
		//document.getElementById("submit").disabled=false;
		return true;
	}
	else
	{
		document.form2.Email.focus();
		alert('Format email salah!');
		document.getElementById("submit").disabled=true;
		return false;
	}
}

function komen()
{
	var nama = encodeURIComponent(document.getElementById("Nama").value);
	var id_post= encodeURIComponent(document.getElementById("id_post").value);
	var email= encodeURIComponent(document.getElementById("Email").value);
	var komentar= encodeURIComponent(document.getElementById("Komentar").value);
	
	if (validate_comment(nama, email, komentar))
	{
		save_comment();
		return true;
	}else{return false;}
}