/* script untuk mengecek tanggal dan konfirmasi saat
 * menghapus post
 */
function confirmDelete() {
	var retval = confirm("Anda yakin ingin menghapus post ini?");
	return retval;
}

function validateDate() {
	var d = new Date();
	var today = new Date(d.getFullYear(), d.getMonth(), d.getDate() + 1);
	var date = new Date(document.forms["post-input"]["Tanggal"].value);
	date.setDate(date.getDate() + 1);
	var title = document.forms["post-input"]["Judul"].value;
	
	if(title == "") { 
		alert("Masukkan Judul untuk post");
		return false;
	}
	
	if(document.forms["post-input"]["Tanggal"].value == "") {
		alert("Masukkan tanggal untuk post");
		return false;
	}
	
	if(date < today) {
		alert("Tanggal posting harus sama dengan atau lebih besar dari hari ini");
		return false;
	}
	
	return true;
}