 function onSubmitClick(){
        var nama = document.getElementById("Nama").value;
        var email = document.getElementById("Email").value;
        var komentar = document.getElementById("Komentar").value;
        var today = new Date();
        var parts = window.location.search.substr(1).split("&");
        var temp = parts[0].split("=");
         var xmlhttp;
        if (window.XMLHttpRequest) {
            xmlhttp=new XMLHttpRequest();
        }
        else{
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            document.getElementById("Nama").value = "";
            document.getElementById("Email").value = "";
            document.getElementById("Komentar").value = "";
              loadComment();
        }
        xmlhttp.open("POST","assets/php/comment_handler.php",true);
        var sendString = "name="+nama+"&email="+email+"&comment="+komentar+"&time="+today.getSeconds()+"&postID="+temp[1];
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send(sendString);

        return false;
    }
    
    function loadComment() {
        var xmlhttp;
        if (window.XMLHttpRequest) {
            xmlhttp=new XMLHttpRequest();
        }
        else{
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
            {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
              {
              document.getElementById("komentar").innerHTML=xmlhttp.responseText;
              }
            }
        var parts = window.location.search.substr(1).split("&");
        var temp = parts[0].split("=");
        xmlhttp.open("POST","assets/php/comment_loader.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("postID="+temp[1]);
    }
    
    loadComment();