function get_komentar()
{
    alert("po");
    var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    document.write("aaaa");
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("Komentar").innerHTML=xmlhttp.responseText;
            document.getElementById("Komentar").innerHTML="komentar";
        }
    }
    xmlhttp.open("GET","get_komentar.php?id="<?php echo $_GET['id']; ?>" ",true);

            document.write("aaaa");
    xmlhttp.send();
}

function post_komentar()
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
           // document.getElementById("komentar").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","post_komentar.php?id="<?php echo $_GET['id']; ?> ",true);
    xmlhttp.send("Nama="" <?php echo $_POST['Nama']; ?> " & Email=" <?php echo $_POST['Email']; ?>" & Komentar= "<?php echo $_POST['Komentar']; ?> " ");
}
