function PostKomentar(dom){
	document.getElementById(dom).innerHTML="Loading...";
	var xmlhttp=GetXmlHttpObject();
	if(xmlhttp==null){
		alert("Silahkan gunakan browser yang mendukung AJAX");
		return;
	}
	var date=new Date();
	var timestamp = date.getTime();
	var url	=	"post_komentar.php";

}