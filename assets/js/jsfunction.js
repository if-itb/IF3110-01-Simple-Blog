function ValidasiForm(input){
    var judul = input.Judul.value;
    var tanggal = input.Tanggal.value;
    var konten = input.Konten.value;
    if (judul.length == 0 || tanggal.length == 0 || konten.length == 0){
        alert("Semua form harus diisi.");
        return false;
    } else if (!ValidasiTanggal(tanggal)){
        return false;
    } else{
        alert("Post berhasil ditambahkan.");
        return true;
    }
}

function ValidasiFormEdit(input){
    var judul = input.Judul.value;
    var tanggal = input.Tanggal.value;
    var konten = input.Konten.value;
    if (judul.length == 0 || tanggal.length == 0 || konten.length == 0){
        alert("Semua form harus diisi.");
        return false;
    } else if (!ValidasiTanggal(tanggal)){
        return false;
    } else{
        alert("Post berhasil diedit.");
        return true;
    }
}

function ValidasiTanggal(input){
    var valid;
    var pat = /[0-9]{1,4}-[0-9]{1,2}-[0-9]{1,2}/g;
    var result = pat.test(input);
    if (!result){
        alert ("Format tanggal harus (YYYY-MM-DD)");
        return false;
    } else{
        var today = new Date();
        var tdate = parseInt(today.getDate());
        var tmonth = parseInt(today.getMonth()) + 1;
        var tyear = parseInt(today.getFullYear());
        
        //memisahkan tanggal
        var dpat = /[0-9]{1,2}$/g;
        var date = input.match(dpat);
        
        //memisahkan bulan
        var mpat = /-[0-9]{1,2}-/g;
        var month = input.match(mpat);
        month = "" + month;
        month = month.substr(1);
        month = month.substring(0, month.length-1);
        month = parseInt(month);
        //memisahkan tahun
        var ypat = /^[0-9]{1,4}/g;
        var year = input.match(ypat);

        if (!IsTanggalValid(month, date, year)){
            alert("Masukan tanggal tidak valid.");
            return false;
        } else{
            if(year<tyear){
                alert("Masukan tanggal harus lebih besar dari tanggal hari ini.");
                return false;
            } else{
                if(year>tyear){
                    return true;
                } else{
                    if(month>tmonth){
                        return true;
                    } else if(month==tmonth){
                        if(date<tdate){
                            alert("Masukan tanggal harus lebih besar dari tanggal hari ini.");
                            return false;
                        } else{
                            return true;
                        }
                    } else{
                        alert("Masukan tanggal harus lebih besar dari tanggal hari ini.");
                        return false;
                    }
                }
            }
        }
    }
    return valid;
}

function IsTanggalValid(month, date, year){
    if(month>12 || month<1 || date>31 || date<1 || year>9999 || year<1){
        return false;
    } else if(month==1 || month==3 || month==5 || month==7 || month==8 || month==10 || month==12){
        if(date<=31){
            return true;
        } else{
            return false;
        }
    } else if(month==4 || month==6 || month==9 || month==11){
        if(date<=30){
            return true;
        } else{
            return false;
        }
    } else{
        if(((year % 400 == 0) || (year % 4 == 0 && year % 100 != 0)) && date<=29){
            return true;
        } else if(date<=28){
            return true;
        } else{
            return false;
        }
    }
}

function delete_post(delURL){
  var del = confirm("Apakah Anda yakin menghapus post ini?");
  if (del == true)
    document.location = delURL;
  else
    alert("Perintah hapus dibatalkan.");
  return del;
}