function add(pid)
{
	var xmlhttp = new XMLHttpRequest();
	var Content = document.getElementById('useAjax');
	var Nama = document.getElementById('Nama').value;
	var Komentar = document.getElementById('Komentar').value;
	var Email = document.getElementById('Email').value;	

	
	
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById('Nama').value="";
			document.getElementById('Komentar').value="";
			document.getElementById('Email').value="";
			content.innerHTML = xmlhttp.responseText;
		}
	};



	xmlhttp.open("GET","insertComment.php?pid="+pid+"&Nama="+Nama+"&Komentar="+Komentar+"&Email="+Email,true);
	xmlhttp.send();
	
}

function loadpost(pid)
{
	var xmlhttp = new XMLHttpRequest();
	var content = document.getElementById('useAjax');
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			content.innerHTML=xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "getComment.php?pid=" + pid, true);
	xmlhttp.send();
}

function validate_comment(pid)
{
	var email = document.getElementById('Email').value;
	var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(email != "")
	{
		var valid = regex.test(email);
		var errormessage = document.getElementById('errormsg');
		
		if(valid)
		{
			errormessage.innerHTML="";
			add(pid);
		}
		else
		{
			errormessage.innerHTML="Format email tidak valid";
		}
	}
}

