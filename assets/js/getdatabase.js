function updatedb(id)
{
	var content = document.getElementById("ajaxcontent");
	content.innerHTML="Coba";
	return false;
}

function loadpost(id)
{
	var xmlhttp = new XMLHttpRequest();
	var content;
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			content = document.getElementById('ajaxcontent');
			content.innerHTML=xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "getdatabase.php?id=" + id, true);
	xmlhttp.send();
}

function coba()
{
	alert("coba");
}

