function savePost() {
	var tgl = document.getElementById("Tanggal").value;
	//regex to match required date format
	var re = /^([0-9]{4,4})-([0-9]{2,2})-([0-9]{2,2})$/;
	var value = true;
	if(tgl == '' || !tgl.match(re)) {
      value = false;
      alert("Isi tanggal sesuai format");
	}
	else {
		console.log(tgl);
		date = new Date();
		tahun = 1900 + date.getYear();
		bulan = date.getMonth()+1;
		tanggal = date.getDate();
		var year=""+ tgl[0] + tgl[1] + tgl[2] + tgl[3];
		if(tgl[6] != '-') {
			var month = "" + tgl[5] + tgl[6];
		}
		else {
			value = false;
			alert("Isi tanggal sesuai format");
		}
		var day = ""+tgl[8]+tgl[9];
		console.log(year);
		//cek tanggal,bulan, dan tahun di dalam batasan
		console.log(tgl[1]);
		if(year <= 0) {
			value=false;
			alert("tahun harus lebih besar dari 0");
		}

		else {
			if(month == 2) {
				if(year  % 4 == 0) {
					if(day < 1 || day > 29) {
						value = false;
						alert("input tanggal yang benar a");
					}
				}
				else {
					if(day < 1 || day > 28) {
						value = false;
						alert("input tanggal yang benar b");
					}
				}
			}
			if(month % 2 == 0 && month != 8) {
				if(day < 1 || day > 30) {
					value = false;
					alert("input tanggal yang benar c");
				}
			}
			else { //bulan ganjil
				if (day < 1 || day > 31) {
					value=false;
					alert('input tanggal yang benar d');
				}
			}
		}
		if(bulan<10) {
			bulan = "0"+bulan;
		}
		if(tanggal<10) {
			tanggal = "0"+tanggal;
		}
		var temp= tahun + "-" + bulan + "-" + tanggal;
		if(tgl < temp) {
			value=false;
			alert("isi tanggal sekarang atau lebih besar");
		}
	}
	return value;
}