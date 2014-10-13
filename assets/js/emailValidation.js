function emailValidation() {
	if (document.getElementById("Email").value.indexOf("@") == -1) {
		document.getElementById("Email").style.background = "rgb(255,105,97)";
		window.alert("Please enter a valid e-mail!");
		return false;
	} else {
		document.getElementById("Email").style.background = "white";
		return true;
	}
}
