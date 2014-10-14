function addComment(id){
var xmlhttp;
var nama = document.getElementById("Nama").value;
var email = document.getElementById("Email").value;
var komentar = document.getElementById("Komentar").value;
var minDate = (new Date()).getDate();
var minMonth = (new Date()).getMonth()+1;
var minYear = (new Date()).getFullYear(); 
var today = minDate +"/" + minMonth + "/" + minYear;
if (emailValidation(email)){
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
    document.getElementById("Nama").value ="";
    document.getElementById("Email").value ="";
    document.getElementById("Komentar").value ="";
    document.getElementById("komentar").innerHTML=xmlhttp.responseText;
    }
  }
var url = "comment.php?id="+id+"&nama="+nama+"&email="+email+"&komentar="+komentar+"&tanggal="+today;
xmlhttp.open("GET",url,true);
xmlhttp.send();
}

}
function loadingComment(id){
var xmlhttp;
var nama = document.getElementById("Nama").value;
var email = document.getElementById("Email").value;
var komentar = document.getElementById("Komentar").value;
var minDate = (new Date()).getDate();
var minMonth = (new Date()).getMonth()+1;
var minYear = (new Date()).getFullYear(); 
var today = minDate +"/" + minMonth + "/" + minYear;
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
    document.getElementById("komentar").innerHTML=xmlhttp.responseText;
    }
  }
var url = "comment.php?id="+id+"&nama="+nama+"&email="+email+"&komentar="+komentar+"&tanggal="+today;
xmlhttp.open("GET",url,true);
xmlhttp.send();
}
function emailValidation(email){
  var re = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/g;
  var result = re.test(email);
  if (result){
    return true;
  }
  else{
    alert ("E-mail tidak valid");
    return false;
  }
}

