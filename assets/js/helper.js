var type0_msg = '';

var type1_msg = 'Masukkan tanggal dengan format dd-mm-yyyy';

var type2_msg = 'Tidak boleh memasukkan tanggal yang sudah berlalu';

var type3_msg = 'Masukkan tanggal yang benar-benar ada';

var typed_msg = 'Terjadi kesalahan FATAL';

function isValidDate(str) {
    // code 1 = not a date
    // code 2 = past date
    // code 3 = invalid date

    var date_patt = /^\d{1,2}-\d{1,2}-\d{4}$/;
    if (date_patt.test(str)) {
        var day = +str.substring(0, 2);
        var month = str.substring(3, 5)-1;
        var year = +str.substring(6, 10);

        var given = new Date(year, month, day);
        if (!(day === given.getDate() && month === given.getMonth() && year === given.getFullYear()))
            return 3;

        now = new Date();

        if (year === now.getFullYear()) {
            if (month === now.getMonth()) {
                if (day < now.getDate()) {
                    return 2;
                }
            } else if (month < now.getMonth()) {
                return 2;
            }
        } else if (year < now.getFullYear()) {
            return 2;
        }

        return 0;

    } else {
        return 1;
    }
}

function isValidEmail(email) {
    var email_patt = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return email_patt.test(email);
}