	function loadComment(){
		var xmlhttp;
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function()
		{	if(xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("loadkomen").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","loadkomen.php?id=" + myForm.id.value ,true);
		xmlhttp.send();
	}
	function insertComment(){
		var xmlhttp;
		var nama = myForm.Nama.value;
		var email = myForm.Email.value;
		var komentar = myForm.Komentar.value;
		var id = myForm.id.value;
		
		if(validateForm()==false){
			return false;
		}
		
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function()
		{	if(xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("inputkomentar").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("POST","inputkomentar.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("Nama_komen="+nama+"&Email="+email+"&Komentar="+komentar+"&id="+id);
	}
function validateForm(){
	var x = myForm.Email.value;
	//var x = document.forms.myForm.Email.value;	
	var atpos = x.indexOf("@");
	var dotpos = x.lastIndexOf(".");
	if(atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length){
		alert("Not a valid e-mail address");
		//document.myForm.Email.focus();
		return false;
	}
}

function checkdate(){
	var validformat = /^\d{4}-\d{2}-\d{2}$/;
	if(!validformat.test(formTes.Tanggal.value))
	{
		alert("invalid format tanggal.");
		//input.select();
		return false;
	}
	else{
		/*var dayfield = input.Tanggal.value.split("-")[2];
		var monthfield = input.Tanggal.value.split("-")[1];
		var yearfield = input.Tanggal.value.split("-")[0]; 
		var dayobj = new Date(yearfield, monthfield-1, dayfield); */
		var my_date = formTes.Tanggal.value;
		
		var parts = my_date.split('-');
		var result = new Date(parts[0],parts[1]-1,parts[2]); 
		
		/*if((dayobj.getMonth()+1!=monthfield) || (dayobj.getDate()!=dayfield) || (dayobj.getFullYear()!=yearfield)){
			alert("invalid date format!");
			input.select();
			return false;
		}
		else{
			alert("cek ulang");
			alert(Date(input));
			return cekTanggal(input);
		} */ 	
		return cekTanggal(result);
	}
	
}

function cekTanggal(tanggal){
	var x = new Date()
	
	if(x.setHours(0,0,0,0) > tanggal.setHours(0,0,0,0)){
		alert("Masukan tanggal harus lebih besar sama hari ini");
		return false;
	}
	else{
		return true;
	}
}
