function savePost() {
	var tgl = document.getElementById("Tanggal");
	//regex to match required date format
	var re = /^\d{4}\-\d{1,2}\-\d{1,2}$/;
	console.log("TGL " + tgl.value);
	if(tgl.value == '' || !tgl.value.match(re)) {
      alert("Isi tanggal sesuai format");
      window.location="new_post.php";
      tgl.value.focus();
      return false;
	}
	else {
		console.log("ssshhh");
		window.location="save.php";
		return true;
	}
}

function validateForm() {
/* 	Form validation of post form for a new post or editing a aost */
	var x = document.getElementById("Judul").value;
	var y = document.getElementById("Tanggal").value;
	var	value = true;
	var pattern = /^([0-9]{4,4})-([0-9]{2,2})-([0-9]{2,2})$/;
	var errMessage = "";
	
	
	
	if (x==="") {
		errMessage += " Judul harus diisi";
		value = false;
		document.getElementById("Judul").style.borderColor="#FF0000";
	}
	if (y==="") {
		errMessage += " Tanggal harus diisi";
		value = false;
		document.getElementById("Tanggal").style.borderColor="#FF0000";
	}
	else {
		if (pattern.test(y)) {
			//compare with current date 
			
			var t = new Date();
			var m = t.getMonth()+1;
			var d = t.getDate();
			
			if (m < 10) {
				m = "0" + m; 
			}
			if (d < 10) {
				d = "0" + d;
			}
			var str = (1900+t.getYear()) + "-" + m + "-" + d;
			if (str > y) {
				errMessage = " Tanggal harus lebih besar atau sama dengan tanggal sekarang";
				value=false;
			}
			//else value still true
		}
		else {
			errMessage += " Penulisan tanggal salah";
			value = false;
			document.getElementById("Tanggal").style.borderColor="#FF0000";
		}
	}
	
	
	
	if (!value) {
		alert(errMessage);
	}
	return value
	;
}


function validateEmail() {
/* 	check comment form */
	var x = document.getElementById("Nama").value;
	var y = document.getElementById("Email").value;
	var z = document.getElementById("Komentar").value;
	var val = true;
	var errMessage = "";
	if (x==="") {
		val = false;
		errMessage += " Nama Harus Diisi !";
		document.getElementById("Nama").style.borderColor="#FF0000";
	}
	if (y==="") {
		val = false;
		errMessage += " Email Harus Diisi !";
		document.getElementById("Email").style.borderColor="#FF0000";
	}
	else { //validate email format
		var pattern = /^(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
		if (!pattern.test(y)) {
			val = false;
			errMessage += " Wrong email format!";
		}
		//else no change
	}
	if (z==="") {
		val = false;
		errMessage += " Komentar harus diisi!";
		document.getElementById("Komentar").style.borderColor="#FF0000";
	}
	if (!val) {
		alert(errMessage);
	}
	
	return val;
}

function confirmDelete(id_post) 
{
   var x;
   if(confirm("Apakah Anda yakin menghapus post ini?")==true) {
  window.location="delete.php?Id="+id_post;
   }
   else {
  x = "no";
   }
} 