function showkomentar(id) {
	  if (window.XMLHttpRequest) {
	    // code for IE7+, Firefox, Chrome, Opera, Safari
	    xmlhttp=new XMLHttpRequest();
	  } else { // code for IE6, IE5
	    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
	    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	      document.getElementById("ajaxcontent").innerHTML=xmlhttp.responseText;
	    }
	  }
	  xmlhttp.open("GET","showkomentar-ajax.php?id="+id,true);
	  xmlhttp.send();
	}
	
	function addcomment(id) {
	  var nama = document.getElementById("Nama").value;
	  var email = document.getElementById("Email").value;
	  var komentar = document.getElementById("Komentar").value;
	    if (nama == null || nama == "" || email == null || email == "" || komentar == null || komentar == "") {
		alert("All input must be filled out");
		return false;
	    }
	    else
	    {
		re = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/
		if(!email.match(re)) {
		alert("Invalid email format.\nPlease insert a valid email adress");
		return false;
		}
		else
		{
			 if (window.XMLHttpRequest) {
			    // code for IE7+, Firefox, Chrome, Opera, Safari
			    xmlhttp=new XMLHttpRequest();
			  } else { // code for IE6, IE5
			    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			  xmlhttp.onreadystatechange=function() {
			    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			      document.getElementById("ajaxcontent").innerHTML=xmlhttp.responseText;
			    }
			  }
			  xmlhttp.open("GET","updatekomentar-ajax.php?nama="+nama+"&email="+email+"&komentar="+komentar+"&id="+id,true);
			  xmlhttp.send();
		}
	    }
	 
	}