function validasi(){
	var date = document.getElementById("tanggal").value.split("-");
	var yy = parseInt(date[0]);
	var mm = parseInt(date[1]);
	var dd = parseInt(date[2]);
	var today = new Date();
	var dt = today.getDate();
	var mt = today.getMonth()+1;
	var yt = today.getFullYear();
	if(IsTanggal(dd,mm,yy)){
		if (!compare(dd,mm,yy,dt,mt,yt)){
			document.getElementById("tanggal").value = yy+"-"+mm+"-"+dd;
			return true;
		}
		else{
			alert("Tanggal yang dimasukkan sudah berlalu");
			return false;
		}
	}
	else{
		alert("Format tanggal yang benar adalah (yyyy-mm-dd)");
		return false;
	}
}

function IsKabisat(yy){
	return ((yy % 4 == 0) && (yy % 100 != 0)) || (yy % 400 == 0);
}

function IsTanggal(dd,mm,yy){
	if(yy > 0 && mm>=1 && mm<=12 && dd>=1 && dd<=31){
		if(dd == 31){
			if(mm == 1 || mm == 3 || mm == 5 || mm == 7 || mm == 8 || mm == 10 || mm == 12){
				return true;
			}
			else{
				return false;
			}
		}
		else if(dd == 30){
			if (mm != 2){
				return true;
			}
			else{
				return false;
			}
		}
		else if(dd == 29 && mm == 2){
			if (IsKabisat(yy)){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return true;
		}
	}
	else{
		return false;
	}
}

function compare(d1,m1,y1,d2,m2,y2){
	if(y2>y1){
		return true;
	}
	else if (y2 == y1){
		if(m2 > m1){
			return true;
		}
		else if(m2 == m1){
			if(d2 > d1){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	else{
		return false;
	}
}