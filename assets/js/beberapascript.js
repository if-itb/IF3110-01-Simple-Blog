function dateValidation(){
    console.log("kulit ketupat");
    var tanggal = new Date(document.getElementById('tanggal').value);
    var curDate = new Date();
    curDate.setHours(0,0,0,0);
    if (tanggal >= curDate){
        document.getElementById('konten').disabled = false;
    } else{
        document.getElementById('konten').disabled = true;
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
	var waktu=new Date();
	var email=document.getElementById('email').value;
	var komentar=document.getElementById('komentar').value;
		console.log(nama);
	xmlhttp.send("id="+id+"&nama="+nama+"&waktu="+waktu+"&email="+email+"&komentar="+komentar+"");
		console.log("kutil3 ketupat");

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