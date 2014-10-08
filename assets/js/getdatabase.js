function addcomment(id)
{
	var xmlhttp = new XMLHttpRequest();
	var content = document.getElementById('ajaxcontent');
	var nama = document.getElementById('nama').value;
	var komentar = document.getElementById('komentar').value;
	var email = document.getElementById('email').value;	
	
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			content.innerHTML = xmlhttp.responseText;
		}
	};

	xmlhttp.open("GET","addcomment.php?id="+id+"&nama="+nama+"&komentar="+komentar+"&email="+email,true);
	xmlhttp.send();
}

function loadpost(id)
{
	var xmlhttp = new XMLHttpRequest();
	var content = document.getElementById('ajaxcontent');
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			content.innerHTML=xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "getdatabase.php?id=" + id, true);
	xmlhttp.send();
}

function validate(id)
{
	var email = document.getElementById('email').value;
	var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(email != "")
	{
		var valid = regex.test(email);
		var errormessage = document.getElementById('errormsg');
		
		if(valid)
		{
			errormessage.innerHTML="";
			addcomment(id);
		}
		else
		{
			errormessage.innerHTML="Format email tidak valid";
		}
	}
}

