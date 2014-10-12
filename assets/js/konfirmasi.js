function konfirmasi(){
	var conf=document.forms["deleteconfirm"]["submit"].value;
	if (conf=="Ya"){
		return true;
	} else if (conf=="Tidak") {
		return false;
	}
}