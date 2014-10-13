function requestAjax(){
   var ajaxRequest;
   try{
      //Opera 8.0+, Firefox, Safari
      ajaxRequest = new XMLHttpRequest();
   }catch(e){
      //Internet Explorer
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch(e){
         alert("Problem with browser");
         return false
      }
   }
   return ajaxRequest;
}

function add_comment(){
   var ajaxRequest = requestAjax();
   if(ajaxRequest){
      ajaxRequest.onreadystatechange = function(){
         if(ajaxRequest.readyState==4 && ajaxRequest.status>=400){
            alert("Send comment fail, please try again later "+ajaxRequest.status);
         }
      }
      ajaxRequest.open("POST","add_comment.php",false);
      ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      var nama = encodeURIComponent(document.getElementById("Nama").value);
      var email = encodeURIComponent(document.getElementById("Email").value);
      var kode = encodeURIComponent(document.getElementById("Kode").value);     
      var komentar = encodeURIComponent(document.getElementById("Komentar").value);
      ajaxRequest.send("Nama="+nama+"&Email="+email+"&Komentar="+komentar+"&Kode="+kode);
   }
}

function update_comment(){
   var ajaxRequest = requestAjax();
   if(ajaxRequest){
      ajaxRequest.onreadystatechange = function(){
         if(ajaxRequest.readyState==4){    
            document.getElementById("comment_pool").innerHTML = ajaxRequest.responseText;
         }
      }
      var kode = document.getElementById("Kode").value;
      ajaxRequest.open("GET","show_comment.php?Kode="+ kode,false);
      ajaxRequest.send();
   }
}

function comment_updater(){
   add_comment();
   update_comment();
   return false;
}

function emailValidation(){
   var x = document.getElementById("Email").value;
   var atpos = x.indexOf("@");
   var dotpos = x.lastIndexOf(".");
   if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
      alert("Not a valid e-mail address");
      return false;
   }
   return true;
}

function validateAndSendComment(){
   if(emailValidation()){
      comment_updater();
   }
   return false;
}

