function getXMLHTTPrequest(id){
    var xmlHTTPobj;
    if(window.XMLHttpRequest){
        xmlHTTPobj = new XMLHttpRequest(); 
    } else{
        try{
            xmlHTTPobj = new ActiveXObject("Msxml2.XMLHTTP");
        } catch(e){
            try{
                xmlHTTPobj = new ActiveXObject("Microsoft.XMLHTTP");
            } catch(e){
                xmlHTTPobj = false;
            }
        }
    }
    var id_post = id;
    var Nama = encodeURIComponent(document.getElementById('Nama').value);
    var Email = encodeURIComponent(document.getElementById('Email').value);
    var Komentar = encodeURIComponent(document.getElementById('Komentar').value);    
    if(Nama!="" && Email!="" && Komentar!=""){
        if(!IsEmailValid(Email)){
            alert("Masukan email tidak valid.");
        }
        else{
            xmlHTTPobj.open("GET", "comment_post.php?id="+ id_post + "&Nama=" + Nama + "&Email=" + Email + "&Komentar=" + Komentar, true);
            xmlHTTPobj.send(null);
            xmlHTTPobj.onreadystatechange = function(){
                if (xmlHTTPobj.readyState == 4 && xmlHTTPobj.status == 200){
                    document.getElementById("comments").innerHTML = xmlHTTPobj.responseText;
                }
            }
            document.getElementById('Nama').value = "";
            document.getElementById('Email').value = "";
            document.getElementById('Komentar').value = "";
        }
    } else{
        alert("Semua form harus diisi.");
    }
}

function AJAXLoad(id){
    var xmlHTTPobj;
    if(window.XMLHttpRequest){
        xmlHTTPobj = new XMLHttpRequest(); 
    } else{
        try{
            xmlHTTPobj = new ActiveXObject("Msxml2.XMLHTTP");
        } catch(e){
            try{
                xmlHTTPobj = new ActiveXObject("Microsoft.XMLHTTP");
            } catch(e){
                xmlHTTPobj = false;
            }
        }
    }
    xmlHTTPobj.open("GET", "load_comment.php?id="+ id, true);
    xmlHTTPobj.send(null);
    xmlHTTPobj.onreadystatechange = function(){
        if (xmlHTTPobj.readyState == 4 && xmlHTTPobj.status == 200){
            document.getElementById("comments").innerHTML = xmlHTTPobj.responseText;
        }
    }
}

function IsEmailValid(email){
    var matcher1 = /^[A-Za-z0-9]+[\._A-Za-z0-9]*(\%40|@)[A-Za-z0-9]+\.[a-z]{2,3}$/g;
    var matcher2 = /^[A-Za-z0-9]+[\._A-Za-z0-9]*(\%40|@)[A-Za-z0-9]+\.[a-z]{2,3}\.[a-z]{2}$/g;
    var hasil1 = matcher1.test(email);
    var hasil2 = matcher2.test(email);
    if(hasil1 || hasil2){
        return true;
    } else{
        return false;
    }
}