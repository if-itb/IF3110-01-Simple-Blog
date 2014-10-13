var ncomment = 0;
var isloading = false;
var stoploading = false;

document.addEventListener("wheel", loadComment);

function validateEmail() {
	var email = document.forms["comment-form"]["Email"].value;
	var name = document.forms["comment-form"]["Nama"].value;
	
	if(name == "") {
		alert("Masukkan nama");
		return false;
	}
	
	if(email == "") {
		alert("Masukkan alamat e-mail");
		return false;
	}
	
	var atpos = email.indexOf("@");
	var dotpos = email.lastIndexOf(".");
	var eval = atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length;
	
	if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
		alert("Alamat e-mail tidak valid");
		return false;
	}
	
	return true;
}

function getHttpRequestObject() {
	var xmlhttp;
	if(window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	return xmlhttp;
}

function sendComment() {
	
	var xmlhttp = getHttpRequestObject();
	var d = new Date();
	var mon = d.getUTCMonth() + 1;
	var param = "title=" + document.getElementById("title").innerHTML +
				"&sender=" + document.forms["comment-form"]["Nama"].value +
				"&email=" + document.forms["comment-form"]["Email"].value +
				"&date=" + d.getUTCFullYear() + "/" + mon + "/" + d.getUTCDate() +
				"&comment=" + document.forms["comment-form"]["Komentar"].value;
	var encoded = encodeURI(param);
	xmlhttp.open("POST", "load_comment.php", false);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function () {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			if(xmlhttp.responseText != null) {
				response(xmlhttp.responseText);
			}
		}
	};
	xmlhttp.send(encoded);
}

function loadComment() {
	var pageheight = document.documentElement.scrollHeight;
	var scrollpos = (window.pageYOffset) ? window.pageYOffset : document.documentElement.scrollTop;
	var clientheight = document.documentElement.clientHeight;
	if((pageheight - (scrollpos + clientheight) < 100) && !isloading && !stoploading) {
		
		isloading = true;
		ncomment++;
		
		var xmlhttp = getHttpRequestObject();
		var d = new Date();
		var mon = d.getUTCMonth + 1;
		var param = "title=" + document.getElementById("title").innerHTML +
					"&date=" + document.getElementById("date").innerHTML +
					"&count=" + ncomment;
		var encoded = encodeURI(param);
		xmlhttp.open("GET", "load_comment.php?" + encoded, false);
		//xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.onreadystatechange = function() {
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				if(xmlhttp.responseText != null) {
					response(xmlhttp.responseText);
					isloading = false;
				}
				if(xmlhttp.responseText === null || xmlhttp.responseText === "") {
					stoploading = true;
				}
			}
		};
		xmlhttp.send();
	}
	return;
}

function response(jsontext) {
	var data = JSON.parse(jsontext);
	
	if(data instanceof Array) {
		for(var i = 0; i < data.length; i++) {
			makeMarkup(data[i].sender, data[i].date, data[i].comment);
		}
	} else {
		makeMarkup(data.sender, data.date, data.comment);
	}
}

function makeMarkup(sender, date, comment) {
	//create list item
	var li = document.createElement("LI");
	li.setAttribute("class", "art-list-item");
	
	//create div
	var div = document.createElement("DIV");
	div.setAttribute("class", "art-list-item-title-and-time");
	
	//create sender name
	var h2 = document.createElement("H2");
	h2.setAttribute("class", "art-list-title");
	var sender = document.createTextNode(sender);
	h2.appendChild(sender);
	
	//create date
	var div2 = document.createElement("DIV");
	div2.setAttribute("class", "art-list-time");
	var date = document.createTextNode(date);
	div2.appendChild(date);
	
	div.appendChild(h2);
	div.appendChild(div2);
	
	var comment = document.createTextNode(comment);
	
	div.appendChild(comment);
	li.appendChild(div);
	document.getElementById("comment-list").appendChild(li);
}

/*function loadCommentResponse() {
	if(this.readyState == 4 && this.status == 200) {
		if(this.responseText != null) {
			var data = json_parse(this.responseText);
		
			for(var i = 0; i < data.length; i++) {
				//create list item
				var li = document.createElement("LI");
				li.setAttribute("class", "art-list-item");
				
				//create div
				var div = document.createElement("DIV");
				div.setAttribute("class", "art-list-item-title-and-time");
				
				//create sender name
				var h2 = document.createElement("H2");
				h2.setAttribute("class", "art-list-title");
				var sender = document.createTextNode(data[i].sender);
				h2.appendChild(sender);
				
				//create date
				var div2 = document.createElement("DIV");
				div2.setAttribute("class", "art-list-time");
				var date = document.createTextNode(data[i].date);
				div2.appendChild(date);
				
				div.appendChild(h2);
				div.appendChild(div2);
				
				var comment = document.createTextNode(data[i].comment);
				
				div.appendChild(comment);
				li.appendChild(div);
				document.getElementById("comment-list").appendChild(li);
			}
		}
	}
}
*/