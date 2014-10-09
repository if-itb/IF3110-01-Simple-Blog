function validateForm(){
	var titlePost = document.forms["inputanpos"]["Judul"].value;
	var contentPost = document.forms["inputanpos"]["Konten"].value;
	var datePost = document.forms["inputanpos"]["Tanggal"].value;
	var dateNow = new Date();
	if(titlePost == null || titlePost == ""){
		alert('Judul pos tidak boleh kosong');
		return false;
	}
	
	if(datePost == null || datePost == ""){
		alert('Tanggal pos tidak boleh kosong');
		return false;
	}
	else {
		datePost = new Date(document.forms["inputanpos"]["Tanggal"].value + " 23:59:59");
		if (datePost - dateNow < 0){
			alert('Tanggal pos tidak boleh kurang dari tanggal sekarang.');
			return false;
		}
	}
	
	if(contentPost == null || contentPost == ""){
		alert('Konten pos tidak boleh kosong');
		return false;
	}
	
	return true;
}

function validateEmail(email){
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}