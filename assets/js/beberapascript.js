function confirmation(id) {
  var answer = confirm("Apakah Anda yakin menghapus post ini?")
  if (answer){      
    document.location= "action/do_edit_post.php?id="+id;
    alert("Post berhasil dihapus");
  }else{
    alert("Post tidak dihapus. Terima kasih.");
  	}
}

function dateValidation(){
    console.log("kulit ketupat");
    var tanggal = new Date(document.getElementById('tanggal').value);
    var curDate = new Date();
    curDate.setHours(0,0,0,0);
    if (tanggal >= curDate){
        document.getElementById('konten').disabled = false;
    } else{
        document.getElementById('konten').disabled = true;
        alert("Masukkan tanggal yang lebih besar atau sama dengan tanggal hari ini.");
    }
}    

function validateEmail(){ 
	console.log("kulit ketupat"); 
	var email = document.getElementById('email').value;
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
	if (email.match(mailformat)){  
		document.getElementById('komentar').disabled = false;  
	}  
	else{  
		alert("You have entered an invalid email address!");  
		document.getElementById('komentar').disabled = true;  
	}  
}  

function loadkomentar(){
	var xmlhttp;
	console.log("kutil ketupat");

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
	   		document.getElementById("komen").innerHTML=xmlhttp.responseText;

	    }
	  }
	xmlhttp.open("POST","action/do_komen.php",true);
		console.log("kutil2 ketupat");
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	var id=document.getElementById('id').value; 
	var nama=document.getElementById('nama').value;	
	var email=document.getElementById('email').value;
	var komentar=document.getElementById('komentar').value;
		console.log(nama);
	xmlhttp.send("id="+id+"&nama="+nama+"&email="+email+"&komentar="+komentar+"");
		console.log("kutil3 ketupat");

}

function newpost(){
	var xmlhttp;
	console.log("kutil ketupat");

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
	   		document.getElementById("postbaru").innerHTML=xmlhttp.responseText;

	    }
	  }
	xmlhttp.open("POST","action/do_new_post.php",true);
		console.log("kutil2 ketupat");
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	var judul=document.getElementById('judul').value;	
	var tanggal=document.getElementById('tanggal').value;
	var konten=document.getElementById('konten').value;
		console.log(judul);
	xmlhttp.send("judul="+judul+"&tanggal="+tanggal+"&konten="+konten+"");
		console.log("tanggal");

}

function editpost(){
	var xmlhttp;
	console.log("kutil ketupat");

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
	   		document.getElementById("postbaru").innerHTML=xmlhttp.responseText;

	    }
	  }
	xmlhttp.open("POST","action/do_edit_post.php",true);
		console.log("kutil2 ketupat");
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	var id=document.getElementById('id').value;
		console.log(id);
	var user_option=document.getElementById('user_option').value;
		console.log(user_option);
	var judul=document.getElementById('judul').value;	
	var tanggal=document.getElementById('tanggal').value;
	var konten=document.getElementById('konten').value;
		console.log(judul);
	xmlhttp.send("id="+id+"&user_option="+user_option+"&judul="+judul+"&tanggal="+tanggal+"&konten="+konten+"");
		console.log(tanggal);

}

// $(document).ready(function() {       
// 	// initiate layout and plugins 
// 	$("#loaddata").click(function(){                
//     var nama=document.getElementById('nama').value;
//     var waktu=new Date();
//     var email=document.getElementById('email').value;
//     var komentar=document.getElementById('komentar').value;
//     $.post("action/doSummary.php",{ nama:nama, waktu: waktu }, function(ajaxresult){
//         $("#hasil").html(ajaxresult);               
//     });
// });
// });