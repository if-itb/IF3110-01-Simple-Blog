function validateCreate() {
    var x = document.forms["CreatePost"]["Judul"].value;
	var y = document.forms["CreatePost"]["Tanggal"].value;
	var z = document.forms["CreatePost"]["Konten"].value;
    if (x == null || x == "") {
        alert("Post harus memiliki judul");
        return false;
    }
}