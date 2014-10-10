function PostKomentar(){

	var isi_nama = document.getElementById("Nama").value;
	var isi_email = document.getElementById("Email").value;
	var isi_pesan = document.getElementById("Pesan").value;
	var isi_id = document.getElementById("Id").value;
	var xmlhttp=GetXmlHttpObject();
	if(xmlhttp==null){
		alert("Silahkan gunakan browser yang mendukung AJAX");
		return false;
	}
	document.getElementById("terbaru").innerHTML = "Sedang memproses komentar";
	
	var url	=	"post_komentar.php";
    var param="nama="+isi_nama+"&email="+isi_email+"&pesan="+isi_pesan+"&id="+_isi_id;
	document.getElementById("terbaru").innerHTML = "Sedang memproses komentar";
	var message = "<div id="+ "unit-komentar align=center><br/>" + name + "<br/>" + email + "</br>" + pesan "</div>";
	
	document.getElementById("terbaru").innerHTML = message;
    xmlhttp.open("POST",url,true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.setRequestHeader("Content-length", param.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(param);
}

function GetXmlHttpObject() {
    var xmlhttp=null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlhttp=new XMLHttpRequest();
    }
    catch (e) {
        // Internet Explorer
        try {
            xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlhttp;
}
function validateForm() {
    var x = document.getElementById('Email').value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }else{
		PostKomentar();
	}
}