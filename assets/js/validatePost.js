function savePost() {
	var tgl = document.getElementById("Tanggal");
	//regex to match required date format
	var re = /^\d{4}\-\d{1,2}\-\d{1,2}$/;
	var value = true;
	if(tgl.value == '' || !tgl.value.match(re)) {
      value = false;
      alert("Isi tanggal sesuai format");
	}
	return value;
}