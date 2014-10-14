function checkdate(){
	var valid;
	var tgl = document.getElementById("Tanggal").value;
	if((tgl.length==10)&&(tgl.match(/^\d{4}-\d{1,2}-\d{1,2}$/))){
		var now = new Date();
		var date=new Date(tgl);
		now.setDate(now.getDate()-1);
		if (now < date){
			valid=true;}
		else {
			alert("Tanggal salah.\n\nFormat valid : yyyy-mm-dd\nTanggal harus lebih besar atau sama dengan tanggal hari ini.");
			valid=false;}
		}
	else {
		alert("Tanggal salah.\n\nFormat valid : yyyy-mm-dd\nTanggal harus lebih besar atau sama dengan tanggal hari ini.");
		valid=false;}
	return valid;
}

function checkemail(){
	 var filter = new RegExp("^([a-zA-Z0-9_\.\-])+([a-zA-Z0-9])+\@" +"(([a-zA-Z0-9\-])+\)+(.)" +"([a-zA-Z0-9]{2,4})+$");      
	 if (!filter.test(document.getElementById("Email").value))      
	 {  
		alert("Format Email salah.\nSilahkan masukkan kembali email anda.");                 
		return false;      
	} 
	else         
		return true;
}
