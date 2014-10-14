function valid()
{
	var tanggal = document.getElementById("Tanggal").value;
	var date_format = /^ *\d{2}-\d{2}-\d{4} *$/;
	if(date_format.test(tanggal)) {
		var comp = tanggal.split('-');
		var d = comp[0];
		var m = comp[1];
		var y = comp[2];
		if(isValidDate(d,m,y) && dateValidator(d,m,y)) {
			document.getElementById("date-validation").innerHTML = "";
			return true;
		} else {
			document.getElementById("date-validation").innerHTML = "Tanggal tidak valid";
			return false;
		}
	} else {
			document.getElementById("date-validation").innerHTML = "Tanggal tidak valid";
			return false;
	}
}

function isValidDate(d,m,y)
{
	var input = new Date(y,m,d);
	var now = new Date();
	if(input >= now) return true;
	else return false;
}

function dateValidator(d,m,y)
{
	if((m==1)||(m==3)||(m==5)||(m==7)||(m==8)||(m==10)||(m==12)){
		return (d<=31);
	}else if((m==4)||(m==6)||(m==9)||(m==11)){
		return (d<=30);
	}else if(m==2){
		if((y%4==0) && (y%100!=0)) return (d<=29);
		else return (d<=28);
	}else
		return false;
}