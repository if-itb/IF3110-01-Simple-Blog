function confirm_delete() {
  return confirm('Are you sure want to delete this post?');
}

function validateform() {
    var x = document.forms["myForm"]["Tanggal"].value;
    var y = document.forms["myForm"]["Judul"].value;
    var z = document.forms["myForm"]["Konten"].value;
    if (x == null || x == "" || y == null || y == "" || z == null || z == "") {
        alert("All input must be filled out");
        return false;
    }
    else
    {
	re = /^(\d{4})-(\d{1,2})-(\d{1,2})$/
	if(x != '' && !x.match(re)) {
	alert("Invalid date format: " + x +"\nDate must be in DD-MM-YYY format");
	return false;
	}
	else{
		var z = new Date(x.substr(0,4),x.substr(5,2)-1,x.substr(8,2),23,59,59,0);
		var y = new Date();
		if(z<y){
			alert("Date must be bigger than " + y);
			return false;
		}
	}
    }
}

function validateformajax() {
    var x = document.getElementById("Nama");
    var y = document.getElementById("Email");
    var z = document.getElementById("Komentar");
    if (x == null || x == "" || y == null || y == "" || z == null || z == "") {
        alert("All input must be filled out");
        return false;
    }
    else
    {
	re = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/
	if(!y.match(re)) {
	alert("Invalid email format.\nPlease insert a valid email adress");
	return false;
	}
	else{
		
	}
    }
}