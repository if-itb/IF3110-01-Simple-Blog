// JavaScript Document

function LoadCommentList(PostID){
	var xmlhttp;

	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}else{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("comment-list").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","loadcomments.php?ID=" + PostID,true);
	xmlhttp.send();	
}

function AddComment(PostID){
	if(!IsEmpty()){
		if(IsEmailValid()){
			var xmlhttp;
			if (window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById("comment-list").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","new_comment.php?ID=" +PostID + "&Name=" + document.getElementById("Nama").value + "&Email=" + document.getElementById("Email").value + "&Comment=" + document.getElementById("Komentar").value,true);
			xmlhttp.send();	
			return true;
		}else{
			return false;	
		}
	}else{
		return false;	
	}
}
	

function IsEmailValid(){
	var regex = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	var emailInput = document.getElementById("Email").value;
	
	if(!regex.test(emailInput)){
		alert("Email tidak valid");
		return false;	
	}else{
		return true;	
	}
}

function IsEmpty(){
	var InputName = document.getElementById("Nama").value;
	var InputEmail = document.getElementById("Email").value;
	var InputComment = document.getElementById("Komentar").value;
	
	if(InputName == "" || InputEmail == "" || InputComment == ""){
		alert("Masih ada field yang kosong");
		return true;	
	}else{
		return false;	
	}
}