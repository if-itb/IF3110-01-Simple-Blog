function deletePost(id){
	var answer = confirm("Apakah Anda yakin akan menghapus post ini?");
	if(answer){
		window.location.href= 'delete_post_process.php?id=' + id;
	}
}

function validation(form){
	var judul = form.Judul.value;
	var date_input = form.Tanggal.value;
	var konten = form.Konten.value;
	
	if(judul.length == 0 || date_input.length == 0 || konten.length == 0){
		alert("Form masih kosong");
		return false;
	}
	else{ // validasi tanggal
		var now = new Date();
        var date_now = parseInt(now.getDate());
        var month_now = parseInt(now.getMonth());
        month_now++;
        var year_now = parseInt(now.getFullYear());

        var pattern = /[0-9]{1,2} [A-Za-z]+ [0-9]{1,4}/g;
        var result = pattern.test(date_input);

        if(result){
            // 19 Juli 2014

            //tahun
            var pattern_year = /[0-9]{4}/g;
            var result_year = date_input.match(pattern_year);

            //bulan
            var pattern_month = /[A-Za-z]+/g;
            var result_month = date_input.match(pattern_month);
            
            //ngubah bulan menjadi angka (result_month_angka)
            var pattern_januari = /[J|j]{1}[A|a]{1}[N|n]{1}[U|u]{1}[A|a]{1}[R|r]{1}[I|i]{1}/g;
            var pattern_februari = /[F|f]{1}[E|e]{1}[B|b]{1}[R|r]{1}[U|u]{1}[A|a]{1}[R|r]{1}[I|i]{1}/g;
            var pattern_maret = /[M|m]{1}[A|a]{1}[R|r]{1}[E|e]{1}[T|t]{1}/g;
            var pattern_april = /[A|a]{1}[P|p]{1}[R|r]{1}[I|i]{1}[L|l]{1}/g;
            var pattern_mei = /[M|m]{1}[E|e]{1}[I|i]{1}/g;
            var pattern_juni = /[J|j]{1}[U|u]{1}[N|n]{1}[I|i]{1}/g;
            var pattern_juli = /[J|j]{1}[U|u]{1}[L|l]{1}[I|i]{1}/g;
            var pattern_agustus = /[A|a]{1}[G|g]{1}[U|u]{1}[S|s]{1}[T|t]{1}[U|u]{1}[S|s]{1}/g;
            var pattern_september = /[S|s]{1}[E|e]{1}[P|p]{1}[T|t]{1}[E|e]{1}[M|m]{1}[B|b]{1}[E|e]{1}[R|r]{1}/g;
            var pattern_oktober = /[O|o]{1}[K|k]{1}[T|t]{1}[O|o]{1}[B|b]{1}[E|e]{1}[R|r]{1}/g;
            var pattern_november = /[N|n]{1}[O|o]{1}[V|v]{1}[E|e]{1}[M|m]{1}[B|b]{1}[E|e]{1}[R|r]{1}/g;
            var pattern_desember = /[D|d]{1}[E|e]{1}[S|s]{1}[E|e]{1}[M|m]{1}[B|b]{1}[E|e]{1}[R|r]{1}/g;

            if(pattern_januari.test(result_month)){
                var result_month_angka = 1;
            }
            else if(pattern_februari.test(result_month)){
                var result_month_angka = 2;
            }
            else if(pattern_maret.test(result_month)){
                var result_month_angka = 3;
            }
            else if(pattern_april.test(result_month)){
                var result_month_angka = 4;
            }
            else if(pattern_mei.test(result_month)){
                var result_month_angka = 5;
            }
            else if(pattern_juni.test(result_month)){
                var result_month_angka = 6;
            }
            else if(pattern_juli.test(result_month)){
                var result_month_angka = 7;
            }
            else if(pattern_agustus.test(result_month)){
                var result_month_angka = 8;
            }
            else if(pattern_september.test(result_month)){
                var result_month_angka = 9;
            }
            else if(pattern_oktober.test(result_month)){
                var result_month_angka = 10;
            }
            else if(pattern_november.test(result_month)){
                var result_month_angka = 11;
            }
            else if(pattern_desember.test(result_month)){
                var result_month_angka = 12;
            }
            else{
                alert("Bulan yang Anda masukkan salah. Masukkan bulan dalam bahasa Indonesia");
                return false;
            }
            
            //tanggal
            var pattern_date = /[0-9]{0,2}/g;
            var result_date = pattern_date.exec(date_input)

            if(year_now > result_year){
                alert("Tanggal yang dimasukkan harus lebih besar atau sama dengan " + date_now + "/" + month_now + "/" + year_now);
                return false;
            }
            else{
                if((month_now > result_month_angka) && (year_now == result_year)){
                    alert("Tanggal yang dimasukkan harus lebih besar atau sama dengan " + date_now + "/" + month_now + "/" + year_now);
                    return false;
                }
                else{
                    if((date_now > result_date) && (month_now == result_month_angka) && (year_now == result_year)){
                        alert("Tanggal yang dimasukkan harus lebih besar atau sama dengan " + date_now + "/" + month_now + "/" + year_now);
                        return false;
                    }
                    else{
                        if(checkingDate(result_date,result_month_angka,result_year)){
                            return true;
                        }
                        else{
                            alert("Tanggal yang anda masukkan tidak valid");
                            return false;
                        }
                    }
                }
            }
            
        }
        else{
            alert("Format yang anda masukkan salah. Format: [tanggal] [bulan--huruf, bukan angka] [tahun]. Contoh: 1 Januari 2014");
            return false;
        }
	}
}

function checkingDate(tanggal,bulan,tahun){
	switch(bulan){
		case 1:
			return ((tanggal >= 1) && (tanggal <= 31));
			break;
		case 2:
			if (isKabisat(tahun)) {
				return ((tanggal >= 1) && (tanggal <= 29));
			}
			else {
				return ((tanggal >= 1) && (tanggal <= 28));
			}
			break;
		case 3:
			return ((tanggal >= 1) && (tanggal <= 31));
			break;
		case 4:
			return ((tanggal >= 1) && (tanggal <= 30));
				break;
		case 5:
			return ((tanggal >= 1) && (tanggal <= 31));
			break;
		case 6:
			return ((tanggal >= 1) && (tanggal <= 30));
			break;
		case 7:
			return ((tanggal >= 1) && (tanggal <= 31));
			break;
		case 8:
			return ((tanggal >= 1) && (tanggal <= 31));
			break;
		case 9:
			return ((tanggal >= 1) && (tanggal <= 30));
			break;
		case 10:
			return ((tanggal >= 1) && (tanggal <= 31));
			break;
		case 11:
			return ((tanggal >= 1) && (tanggal <= 30));
			break;
		case 12:
			return ((tanggal >= 1) && (tanggal <= 31));
			break;
        }
}

function isKabisat(tahun){
    return ((tahun % 400 == 0) || (tahun % 4 == 0 && tahun % 100 != 0));
}

/* AJAX PROCESSING */
function getXMLHttpRequest(){
	var xmlhttp=null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlhttp = new XMLHttpRequest();
    }
    catch (e) {
        // Internet Explorer
        try {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlhttp;
}

function addComment(id){
	var ajx = getXMLHttpRequest();
	var nama = document.getElementById('Nama').value;
	var email = document.getElementById('Email').value;
	var komentar = document.getElementById('Komentar').value;
	
	if(nama != "" && emailValidation(email) && komentar != ""){
		var url = "add_comment_process.php";
		url = url + "?id_post=" + id;
		url = url + "&nama=" + nama;
		url = url + "&email=" + email;
		url = url + "&komentar=" + komentar;
		
		ajx.onreadystatechange = function(){
            loaderAppear();
			if (ajx.readyState==4 && ajx.status==200){
				document.getElementById("commentList").innerHTML = ajx.responseText;
                document.getElementById('Nama').value ="";
                document.getElementById('Email').value ="";
                document.getElementById('Komentar').value ="";
                loadComment(id);
			}
		}
        
		ajx.open("GET",url,true);
		ajx.send(null);
	}
	else{
		alert("Form yang anda isi belum benar atau masih ada form yang kosong");
	}
}

function emailValidation(email){
	var pattern = /[\w.-]+@[\w.-]+\.\w+/g;
	var result = pattern.test(email);
	if(result){
		return true;
	}
	else{
		return false;
	}
}

function loadComment(id){
	var ajx = getXMLHttpRequest();
	
	var url = "load_comment_process.php";
	url = url + "?id=" + id;
	
	var comment = document.getElementById('commentList');
	ajx.onreadystatechange = function(){
        loaderAppear();
		if(ajx.readyState==4 && ajx.status==200){
			document.getElementById("commentList").innerHTML = ajx.responseText;
		}
	}
	
	ajx.open("GET",url,true);
	ajx.send(null);
}

function loaderAppear(){
    document.getElementById("commentList").innerHTML = "<center><img src='assets/img/loader.gif'></center>";
}
