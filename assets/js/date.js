function validateForm()
{
	var f = document.formPost;
	var t = f.Tanggal;
	var a = t.value.split("/");
	if(isDateValid(a) && isDateRight(a))
	{
		return true;
	}
	else
	{
		alert("Wrong time value");
		return false;
	}
}
function isDateRight(a)
{
	var t = new Date();
	var dd = t.getDate();
	var mm = t.getMonth() + 1;
	var yy = t.getFullYear();
	if(a[2] < yy){
		return false;
	}else{
		if(a[1] < mm){
			return false;
		}else{
			if(a[0] < dd){
				return false;
			}else{
				return true;
			}
		}
	}
}
function isDateValid(a)
{
	if(a.lenght<3)
		return false;
	var d = parseInt(a[0]);
	var m = parseInt(a[1]);
	var y = parseInt(a[2]);
	if(y>0)
	{
		switch(m)
		{
			case 1 :
			case 3 :
			case 5 :
			case 7 :
			case 8 :
			case 10 :
			case 12 :
				if(d>0 && d<=31)
					return true;
				else
					return false;
				break;

			case 4 :
			case 6 :
			case 9 :
			case 11 :
				if(d>0 && d<=30)
					return true;
				else
					return false;
				break;

			case 2 :
				if(isKabisat(y))
				{
					if(d>0 && d<=29)
						return true;
					else
						return false;
				}else{
					if(d>0 && d<=28)
						return true;
					else
						return false;
				}
				break;
			default :
				return false;
				break;
		}
	}else{
		return false;
	}
}
function isKabisat(y)
{
	if((y%400==0) || (y%100!=0 && y%4==0))
		return true;
	else
		return false;
}