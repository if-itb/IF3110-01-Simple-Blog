var date = new Date();
var day = date.getDate();
var month = date.getMonth()+1;
var yy = date.getYear();
var year = (yy < 1000) ? yy + 1900 : yy;

var date_now = year + "-" + month + "-" + day;

function validasiForm()
{
	if(form_posting.Judul.value==null || form_posting.Judul.value=="")
	{
		alert("Form "+form_posting.Judul.name+" harus di isi !!!");
		form_posting.Judul.select()
		return false;
	}
	
	if(form_posting.Tanggal.value==null || form_posting.Tanggal.value=="")
	{
		alert("Form "+form_posting.Tanggal.name+" harus di isi !!!");
		form_posting.Tanggal.select()
		return false;
	}
	
	if(form_posting.Konten.value==null || form_posting.Konten.value=="")
	{
		alert("Form "+form_posting.Konten.name+" harus di isi !!!");
		form_posting.Konten.select()
		return false;
	}
}

function validasiTanggal()
{
	if(validasiForm()==false)
	{
		return false;
	}
	
	if (checkdate()==true)
	{
		var tgl = form_posting.Tanggal.value;

		//var tanggal_posting = tgl[2] + '-' +tgl[1] + '-' + tgl[0];

		if(new Date(date_now) > new Date(tgl)) {
			alert("Tanggal posting salah !");
			form_posting.Tanggal.select()
			return false;
		}
	}
	else
	{
		return false;
	}
}

function checkdate()
{
	var validformat=/^\d{4}-\d{2}-\d{2}$/ //Basic check for format validity
	var returnval=false
	if (!validformat.test(form_posting.Tanggal.value))
		alert("Invalid Date Format. Please correct and submit again.")
	else 
	{ //Detailed check for valid date ranges
		var dayfield = form_posting.Tanggal.value.split("-")[2]
		var monthfield = form_posting.Tanggal.value.split("-")[1]
		var yearfield = form_posting.Tanggal.value.split("-")[0]
		var dayobj = new Date(yearfield, monthfield-1, dayfield)
		if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield))
			alert("Invalid Day, Month, or Year range detected. Please correct and submit again.")
		else
			returnval=true
	}
	if (returnval==false) form_posting.Tanggal.select()
	
	return returnval
}