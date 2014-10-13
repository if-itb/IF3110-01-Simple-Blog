function emailValidation() {
	var length = document.getElementById("Email").value.length;
	var at = document.getElementById("Email").value.indexOf("@");
	var dot = document.getElementById("Email").value.lastIndexOf(".");
	if (at > 0 && dot - 1 > at && length - 1 > dot) {
		document.getElementById("Email").style.background = "white";
		return true;
	} else {
		document.getElementById("Email").style.background = "rgb(255,105,97)";
		window.alert("Please enter a valid e-mail!");
		return false;
	}
}
