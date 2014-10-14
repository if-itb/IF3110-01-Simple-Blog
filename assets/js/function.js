function isTanggalValid()
{
	var validasi;
	var hasil = document.getElementById("Tanggal").value;
	var now = new Date();
	if((hasil.length==10)&&(hasil.match(/^\d{4}-\d{1,2}-\d{1,2}$/)))
	{
		var tanggal = new Date(hasil);
		if(tanggal >= now)
		{
			validasi =  true;
		}
		else
		{
			alert("Tanggal sudah lewat !");
			validasi = false;
		}
	}
	else
	{
		alert("Format tanggal salah !");
		validasi = false;
	}
	return validasi;
}

function isEmailValid(email){
	var pattern = /^[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]+)$/g;
	var result = pattern.test(email);
	if(result){
		return true;
	}
	else{
		alert ("Email tidak valid");
		return false;
	}
}

function deletePost(id) {
	var hasil = confirm("Apakah anda yakin ingin menghapus post ini ?");
	if(hasil) {
		document.location = "deletepost.php?id="+id;
	}
	return hasil;
}

function Comment(id) { 
	var xmlHttpObj;
	if (window.XMLHttpRequest) {
		xmlHttpObj = new XMLHttpRequest( );
	} 
	else {
		try {
			xmlHttpObj = new ActiveXObject("Msxml2.XMLHTTP");
		} 
		catch (e) {
			try {
				xmlHttpObj = new ActiveXObject("Microsoft.XMLHTTP");
			} 
			catch (e) {
				xmlHttpObj = false;
			}
		}
	}
	var nama = document.getElementById('Nama').value;
	var email = document.getElementById('Email').value;
	var komentar = document.getElementById('Komentar').value;
	if(nama.length !=0 && email.length !=0 && komentar.length !=0){
		if(isEmailValid(email)){
			xmlHttpObj.open("GET","addcomment.php?nama="+nama+"&email="+email+"&komentar="+komentar+"&id="+id,true);
			//LoadCommentAjax(id_post);
			xmlHttpObj.send();
			xmlHttpObj.onreadystatechange= function(){
				if(xmlHttpObj.readyState==4 && xmlHttpObj.status==200){
					document.getElementById("komentar").innerHTML=xmlHttpObj.responseText;
				}
			}
			document.getElementById('Nama').value = "";
			document.getElementById('Email').value = "";
			document.getElementById('Komentar').value = "";
		}
	}
	else{
		alert ("Form tidak boleh ada yang kosong");
	}
}

function LoadCommentAjax(id){
	var xmlHttpObj;
	if (window.XMLHttpRequest) {
		xmlHttpObj = new XMLHttpRequest( );
	} 
	else {
		try {
			xmlHttpObj = new ActiveXObject("Msxml2.XMLHTTP");
		} 
		catch (e) {
			try {
				xmlHttpObj = new ActiveXObject("Microsoft.XMLHTTP");
			} 
			catch (e) {
				xmlHttpObj = false;
			}
		}
	}
	xmlHttpObj.open("GET","listcomment.php?id=" + id,true);
	xmlHttpObj.send();
	xmlHttpObj.onreadystatechange= function(){
		if(xmlHttpObj.readyState==4 && xmlHttpObj.status==200){
			document.getElementById("comments").innerHTML=xmlHttpObj.responseText;
		}
	}
}