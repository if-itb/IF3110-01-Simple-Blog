function hapus(id){
var r = confirm("Are you sure?");
var link= document.getElementById("p"+id);
if (r) {
link.href= "hapus.php?postid="+id;
} else {
link.href= "index.php";
} 
}

function validasiTanggal(){
var validate;
var tgl = document.getElementById("Tanggal").value;
if((tgl.length==10)&&(tgl.match(/^\d{4}-\d{1,2}-\d{1,2}$/))){
	var now = new Date();
	var tanggal=new Date(tgl);
	now.setHours(0000);
	if (tanggal>= now){
	validate=true;}
	else {
	validate=false;}
	}
else {validate=false;}
return validate;
}

function validasiEmail(mail){
if(mail.match(/^[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]+)$/g))
{return true;}
else{
alert ("Salah Email");
return false;}}
