var xmlhttp;
function loadXMLDoc(url,cfunc)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=cfunc;
xmlhttp.open("GET",url,true);
xmlhttp.send();
}
function myFunction(postId)
{
	var nama = document.getElementById("Nama").value;
	var email = document.getElementById("Email").value;
	var komen = document.getElementById("Komentar").value;

loadXMLDoc("exec_comment.php?name="+nama+"&email="+email+"&comment="+komen+"&pid="+postId,function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    	document.getElementById("daftarKomentar").innerHTML = xmlhttp.responseText + document.getElementById("daftarKomentar").innerHTML;
      document.getElementById("Nama").value="";
      document.getElementById("Email").value="";
      document.getElementById("Komentar").value="";
    }
  });
}