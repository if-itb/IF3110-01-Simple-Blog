/*script untuk modul comment
 */

var ncomment = 0; 			//jumlah comment yang sudah di load
var isloading = false; 		//flag untuk mengecek apakah comment sedang di load
var stoploading = false;	//flag untuk berhenti mengirim request

//tambah listener untuk loading comment
document.addEventListener("wheel", loadComment);

//fungsi validasi email
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

//fungsi untuk mengirim comment
function sendComment() {
	
	var xmlhttp = getHttpRequestObject();
	
	//buat timestamp tanggal untuk comment yang dikirim
	var d = new Date();
	var mon = d.getUTCMonth() + 1;
	
	//konstruksi parameter post
	var param = "title=" + document.getElementById("title").innerHTML +
				"&sender=" + document.forms["comment-form"]["Nama"].value +
				"&email=" + document.forms["comment-form"]["Email"].value +
				"&date=" + d.getUTCFullYear() + "/" + mon + "/" + d.getUTCDate() +
				"&comment=" + document.forms["comment-form"]["Komentar"].value;
	var encoded = encodeURI(param);
	
	xmlhttp.open("POST", "load_comment.php", true);
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

//fungsi untuk load comment (fungsi listener)
function loadComment() {
	/*variabel yang digunakan untuk mengecek apakah
	 * pengguna sudah menggulung halaman sampai bawah
	 */
	var pageheight = document.documentElement.scrollHeight;
	var scrollpos = (window.pageYOffset) ? window.pageYOffset : document.documentElement.scrollTop;
	var clientheight = document.documentElement.clientHeight;
	
	//load comment jika sudah hampir menjapai bawah halaman
	if((pageheight - (scrollpos + clientheight) < 100) && !isloading && !stoploading) {
		
		/*set flag isloading untuk memberi kesempatan
		 *pada script agar bisa memroses response
		 */
		isloading = true;
		
		/*update jumlah comment yang sudah di load
		 */
		ncomment++;
		
		var xmlhttp = getHttpRequestObject();
		
		/*buat dan kirimkan id yang digunakan untuk
		 * mendapatkan comment dari sebuah post
		 * (judul dan tanggal)
		 */
		var d = new Date();
		var mon = d.getUTCMonth + 1;
		var param = "title=" + document.getElementById("title").innerHTML +
					"&date=" + document.getElementById("date").innerHTML +
					"&count=" + ncomment;
		var encoded = encodeURI(param);
		
		xmlhttp.open("GET", "load_comment.php?" + encoded, true);
		xmlhttp.onreadystatechange = function() {
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				if(xmlhttp.responseText != null) {
					response(xmlhttp.responseText);
					//response telah diproses set flag menjadi false
					isloading = false;
				}
				if(xmlhttp.responseText === null || xmlhttp.responseText === "") {
					//response kosong diterima, berhenti loading
					stoploading = true;
				}
			}
		};
		xmlhttp.send();
	}
	return;
}

//fungsi untuk menangani response
function response(jsontext) {
	var data = JSON.parse(jsontext);
	makeMarkup(data.sender, data.date, data.comment);
}

//fungsi untuk membuat markup
function makeMarkup(sender, date, comment) {
	//buat list item
	var li = document.createElement("LI");
	li.setAttribute("class", "art-list-item");
	
	//buat div
	var div = document.createElement("DIV");
	div.setAttribute("class", "art-list-item-title-and-time");
	
	//buat nama pengirim
	var h2 = document.createElement("H2");
	h2.setAttribute("class", "art-list-title");
	var sender = document.createTextNode(sender);
	h2.appendChild(sender);
	
	//buat tanggal
	var div2 = document.createElement("DIV");
	div2.setAttribute("class", "art-list-time");
	var date = document.createTextNode(date);
	div2.appendChild(date);
	
	//jadikan semua elemen menjadi satu
	div.appendChild(h2);
	div.appendChild(div2);
	
	var comment = document.createTextNode(comment);
	
	li.appendChild(div);
	li.appendChild(comment);
	document.getElementById("comment-list").appendChild(li);
}
