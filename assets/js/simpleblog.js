function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 



function showComment(id) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("Comment").innerHTML=xmlhttp.responseText + document.getElementById("Comment").innerHTML;
    }
  }
  var nama = document.getElementById("Nama").value;
  var email = document.getElementById("Email").value;
  var konten = document.getElementById("Komentar").value;

  var str="Nama="+nama+"&Email="+email+"&Konten="+konten+"&PostID="+id;
  if(validateEmail(email))
  {
  xmlhttp.open("GET","addcoment.php?"+str,true);
  xmlhttp.send();  
  }
  else
  {
    alert("Email anda salah!");
  }
  
}

 function checkDate() {
            var EnteredDate = document.getElementById("Tanggal").value; 

            var myDate = new Date(EnteredDate);

            var today = new Date();
            if(myDate>=today){
              document.getElementById('myForm').submit();
            }
        }

document.getElementById('submitbtn').onclick = function (){
  checkDate();
};
