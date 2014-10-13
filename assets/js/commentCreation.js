function commentCreation() {
	if (emailValidation()) {
		var id = document.getElementById("Post_Id").value;
		var name = document.getElementById("Nama").value;
		var email = document.getElementById("Email").value;
		var comments = document.getElementById("Komentar").value;

		var xmlhttp;

		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		}

		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("Nama").value = "";
				document.getElementById("Email").value = "";
				document.getElementById("Komentar").value = "";
				commentGet();
			}
		}

		xmlhttp.open("POST", "create_comment.php", true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("post_id=" + id + "&name=" + name + "&email=" + email + "&comments=" + comments);
	}

	return false;
}
