function validateDate() {
    "use strict";
    
    //split string untuk tanggal
    var arrayOfDate = document.formPost.Tanggal.value;
    var parseDate = arrayOfDate.split("-");
    
    //mengambil data untuk waktu sekarang
    var date = new Date();
    var currentDate = date.getDate();
    var currentMonth = date.getMonth() + 1;
    var currentYear = date.getYear();
    
    //membandingkan tanggal masukan dengan tanggal sekarang
    if (parseDate[0] < currentDate) {
        document.getElementById("warning").innerHTML = "*Tanggal tidak valid, masukkan tanggal yang benar";
        return false;
    } else {
        if (parseDate[1] < currentMonth) {
            document.getElementById("warning").innerHTML = "*Tanggal tidak valid, masukkan tanggal yang benar";
            return false;
        } else {
            if (parseDate[2] < currentDate) {
                document.getElementById("warning").innerHTML = "*Tanggal tidak valid, masukkan tanggal yang benar";
                return false;
            } else {
                return true;
            }
        }
    }
}