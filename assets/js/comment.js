function SubmitComment(post_ID){
	if (VerifyEmail(document.getElementById('Email').value)) {
		 if (window.XMLHttpRequest) {
			xmlHttpObj = new XMLHttpRequest( );
		} else {
			try {
				xmlHttpObj = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					xmlHttpObj = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {
					xmlHttpObj = false;
				}
			}
		}

		
		var author = document.getElementById('Nama').value;
		var email = document.getElementById('Email').value;
		var comment = document.getElementById('Komentar').value;

		//submit
		xmlHttpObj.open("GET", "new_comm.php?post_ID=" + post_ID + "&author=" + author + "&email=" + email + "&comment=" + comment, true);
		xmlHttpObj.send(null);
		xmlHttpObj.onreadystatechange = function() {
			if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
				document.getElementById("yangmaudiajaks").innerHTML=xmlHttpObj.responseText;
			}
		}
	}
	else {
		alert("Invalid comment. Please fix~ :3");
	}
}

function VerifyEmail(email){
	var emailRegex = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/g;
	return (emailRegex.test(email));
}