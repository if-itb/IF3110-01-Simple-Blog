function showComment(id)
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
            document.getElementById("komentar").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","komentar.php?state=1&id="+id,true);
    xmlhttp.send();
}

function addComment(id){
    var Nama = document.getElementById("Nama").value();
    var Email = document.getElementById("Email").value();
    var Komentar = document.getElementById("Komentar").value();
    console.log("Nama: " + Nama);
    console.log("Email: " + Email);
    console.log("Komentar: " + Komentar);
    
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
            var text = xmlhttp.responseText;
            if (text == "submitted") {
                showComment();
            }
        }
    }
    xmlhttp.open("GET","komentar.php?state=2&id="+id+"&nama="+Nama+"&email="+Email+"&komentar="+Komentar,true);
    xmlhttp.send();
}

function validateForm() {
    return true;
}