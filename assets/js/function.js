function Confirm_Delete(id) {
    if (confirm("Apakah Anda yakin menghapus post ini?")) {
        window.location = "hapus_post.php?id="+id; 
    } else {
    }
}

 function checkemail(email){
 	var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(!email.match(regex)){
		return false;
	}
	else{
		return true;
	}
 }

 function load_komentar(idpost){
     var xmlhttp;
     if (window.XMLHttpRequest)
     {
         xmlhttp=new XMLHttpRequest();
     }
     else
     {
         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
     }
     xmlhttp.onreadystatechange=function()
     {
	 		if (xmlhttp.readyState==4 && xmlhttp.status==200)
	 		{	
                document.getElementById("comment_here").innerHTML=xmlhttp.responseText;    	 		
            }
	 }
     xmlhttp.open("GET","load_comment.php?id="+idpost,true);
     xmlhttp.send();
 }

 function insert_komentar(idpost){
 	var email = document.getElementById("Email").value;
    if (checkemail(email)){
	 	
	 	var xmlhttp;
	 	var nama = document.getElementById("Nama").value;
        
        if(nama==""){
	 		nama="anonymous";
	 	}
		
        var komentar = document.getElementById("Komentar").value;
        if (window.XMLHttpRequest)
	 	{
	 		xmlhttp=new XMLHttpRequest();
	 	}
	 	else
	 	{
	 		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	 	}

	 	xmlhttp.onreadystatechange=function()
	 	{
	 		if (xmlhttp.readyState==4 && xmlhttp.status==200)
	 		{
	 			//document.getElementById("komentar_email").innerHTML="";
	 			document.getElementById("Nama").value="";
	 			document.getElementById("Komentar").value="";
	 			document.getElementById("Email").value="";
                document.getElementById("comment_here").innerHTML=xmlhttp.responseText;	
                load_komentar(idpost);
	 		}
	 	}
	 	xmlhttp.open("POST","add_comment.php",true);
	 	xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	 	xmlhttp.send("id="+idpost+"&nama="+nama+"&komentar="+komentar+"&email="+email);
        
 	}
 	else{
        alert("Email yang anda masukkan salah. Coba Lagi");
 	}
 }

function IsValidDate()
{
    var dateEntered = document.getElementById("Tanggal").value;

    var day = dateEntered.substr(8,2);
    var month = dateEntered.substr(5,2);
    var year = dateEntered.substring(0,4);
    
    var dateToCompare = new Date(year, month - 1, day);
    
    var currentDate = new Date();
    currentDate.setHours(0,0,0,0);
    
    if (dateToCompare - currentDate >= 0) {
        document.getElementById("form_new_post").action = "new_post.php";
        alert("New Post berhasil di posting");
        return true;
    }
    else {
        alert("Tanggal yang anda masukkan salah");
        return false;
    }
}

//Validasi date untuk form edit post
function IsValidDateEdit(idpost)
{
    var dateEntered = document.getElementById("Tanggal").value;
    
    var day = dateEntered.substr(8,2);
    var month = dateEntered.substr(5,2);
    var year = dateEntered.substring(0,4);
    
    var dateToCompare = new Date(year, month - 1, day);
    
    var currentDate = new Date();
    currentDate.setHours(0,0,0,0);
    
    if (dateToCompare - currentDate >= 0) {
        document.getElementById("form_edit_post").action = "edit_post_call_function.php?id="+idpost;
        alert("Edit Post berhasil");
        return true;
    }
    else {
        alert("Tanggal yang anda masukkan salah");
        return false;
    }
}