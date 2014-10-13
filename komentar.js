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
    console.log("showComent");
    xmlhttp.open("GET","komentar.php?state=1&id="+id,true);
    xmlhttp.send();
}

function addComment(id){
    var Nama = document.getElementById("Nama").value;
    var Email = document.getElementById("Email").value;
    var Komentar = document.getElementById("Komentar").value;
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
    
    if (Nama && Email && Komentar){
        if (validateForm(Email)){ 
            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    if (xmlhttp.responseText.localeCompare("submitted")) {
                        showComment(id);
                        document.getElementById("comment_form").reset();
                    }
                }
            }
            xmlhttp.open("GET","komentar.php?state=2&id="+id+"&nama="+Nama+"&email="+Email+"&komentar="+Komentar,true);
            xmlhttp.send();
        }
        else {
            alert("Format Email Salah");
        }
    }
    else 
        alert("Semua form harus diisi");

}

function validateForm(email) {
    console.log("email: " + email);
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    console.log(re.test(email));
    return re.test(email);
}