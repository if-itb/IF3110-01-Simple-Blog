// adds comparator to date
Date.prototype.lessThan = function (b) {
	if (this.getFullYear() != b.getFullYear()) {
		return this.getFullYear() < b.getFullYear();
	}
	if (this.getMonth() != b.getMonth()) {
		return this.getMonth() < b.getMonth();
	}
	return this.getDate() < b.getDate();
}

document.addEventListener('DOMContentLoaded', function(){

	document.getElementById("form-post").onsubmit = function() {
		judul = document.getElementById("_judul");
		tanggal = document.getElementById("_tanggal");
		konten = document.getElementById("_konten");

		// check all field. If any of them is empty, return false
		if (!judul.value) {
			alert("Judul blog tidak boleh kosong!");
			judul.focus();
			return false;
		}
		if (!tanggal.value) {
			alert("Tanggal tidak boleh kosong!");
			tanggal.focus();
			return false;
		}
		if (!konten.value) {
			alert("Konten tidak boleh kosong!");
			konten.focus();
			return false;
		}

		// validate date
		dateInput = new Date(tanggal.value);
		if (dateInput.lessThan(new Date())) {
			alert("Tanggal yang dimasukkan tidak boleh sebelum sekarang!");
			tanggal.focus();
			return false;
		}
	}
});
