document.addEventListener('DOMContentLoaded', function(){

	list_komentar = document.getElementById("list-komentar");
	
	// load comments
	loadComments = function() {
		list_komentar.innerHTML = '';

		request = new XMLHttpRequest();
		request.open('POST', 'comment.php', true);

		request.onload = function() {
			if (request.status >= 200 && request.status < 400){
				// Success!
				comments = JSON.parse(request.responseText);
				if (comments.length) {
					for (i = 0; i < comments.length; i++) {
						list_komentar.innerHTML += '\
				<li class="art-list-item" style="list-style: none">\
					<div class="art-list-item-title-and-time">\
						<h2 class="art-list-title"><a href="mailto:' + comments[i]["email"] + '">' + comments[i]["nama"] + '</a></h2>\
						<div class="art-list-time">' + comments[i]["waktu"] + '</div>\
					</div>\
					<div>' + comments[i]["komentar"] + '</div>\
				</li>';
					}
				}
				else {
					list_komentar.innerHTML = '<li class="art-list-item"><h5>Belum ada komentar</h5></li>';
				}
			} else {
				list_komentar.innerHTML = '<li class="art-list-item"><h5>Terjadi kesalahan dalam memuat komentar</h5></li>';
			}
		};

		request.onerror = function() {
			// There was a connection error of some sort
		};

		data = "load_comment=true" +
			"&post_id=" + document.getElementById("_post_id").value;
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.send(data);
	}

	loadComments();

	// post komentar
	postComment = function () {
		request = new XMLHttpRequest();
		request.open('POST', 'comment.php', true);

		request.onload = function() {
			if (list_komentar.innerHTML == '<li class="art-list-item"><h5>Belum ada komentar</h5></li>') {
				list_komentar.innerHTML = '';
			}
			if (request.status >= 200 && request.status < 400){
				// Success!
				komentar = JSON.parse(request.responseText);
				list_komentar.innerHTML = '\
				<li class="art-list-item" style="list-style: none">\
					<div class="art-list-item-title-and-time">\
						<h2 class="art-list-title"><a href="mailto:' + komentar["email"] + '">' + komentar["nama"] + '</a></h2>\
						<div class="art-list-time">' + komentar["waktu"] + '</div>\
					</div>\
					<div>' + komentar["komentar"] + '</div>\
				</li>'
				+ list_komentar.innerHTML;
			} else {
				list_komentar.innerHTML += '<li class="art-list-item"><h5>Terjadi kesalahan dalam memuat komentar</h5></li>';
			}
		};

		request.onerror = function() {
			list_komentar.innerHTML += '<li class="art-list-item"><h5>Terjadi kesalahan dalam memuat komentar</h5></li>';
		};

		data = "post_comment=true" +
			"&post_id=" + document.getElementById("_post_id").value + 
			"&nama=" + document.getElementById("_nama").value + 
			"&email=" + document.getElementById("_email").value +
			"&komentar=" + document.getElementById("_komentar").value;
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.send(data);
	}
	form = document.getElementById("form-komentar");
	form.onsubmit = function () {
		nama = document.getElementById("_nama");
		email = document.getElementById("_email");
		komentar = document.getElementById("_komentar");

		regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if (!regex.test(email.value)) {
			alert("Email yang dimasukkan salah!");
			email.focus();
			return false;
		}

		postComment();
		form.reset();
		return false;
	};

});