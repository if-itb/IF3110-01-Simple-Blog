// JavaScript Document

function IsDateValid(){
	var InputDate = new Date(document.getElementById("Tanggal").value);
	var DateNow = new Date();
	DateNow.setHours(0,0,0,0);
	if(InputDate < DateNow) {
		alert("Tanggal tidak valid");
		return false;
	}else{
		return true;	
	}
}

function IsInputValid(){
	var InputTitle = document.getElementById("Judul").value;
	var InputContent = document.getElementById("Konten").value;
	var InputDate = new Date(document.getElementById("Tanggal").value);
	
	if((InputTitle == null || InputTitle === "") || (InputContent == null || InputContent === "") || !Date.parse(InputDate)){
		alert("Masih ada field yang kosong");
		return false;	
	}else{
		return true;	
	}
}

function ValidateForm(){
	if(IsInputValid()){
		if(IsDateValid()){
			return true;	
		}else{
			return false;	
		}
	}else{
		return false;	
	}
}


