function ValidasiJudulKosong() {
    var x = document.forms["Tulis"]["Judul"].value;
    if (x == null || x == "") {
        alert("Judul harus diisi!!");
        return false;
    }
}

function ValidasiTanggalKosong() {
    var x = document.forms["Tulis"]["Tanggal"].value;
    if (x == null || x == "") {
        alert("Tanggal harus diisi!!");
        return false;
    }
}

function ValidasiKontenKosong() {
    var x = document.forms["Tulis"]["Konten"].value;
    if (x == null || x == "") {
        alert("Konten harus diisi!!");
        return false;
    }
}

