function ValidateCreate() {
	var today1 = new Date().getDate(),
	today2 = new Date().getMonth(),
	today3 = new Date().getFullYear(),
	idate1 = new Date(document.CreatePost.Tanggal.value).getDate(),
	idate2 = new Date(document.CreatePost.Tanggal.value).getMonth(),
	idate3 = new Date(document.CreatePost.Tanggal.value).getFullYear();
	if (today3 > idate3) {
		alert("Tanggal harus lebih besar atau sama dengan tanggal hari ini");
		return false;
	} else if ((today3 == idate3) && (today2 > idate2)) {
		alert("Tanggal harus lebih besar atau sama dengan tanggal hari ini");
		return false;
	} else if ((today2 == idate2) && (today1 > idate1)) {
		alert("Tanggal harus lebih besar atau sama dengan tanggal hari ini");
		return false;
	}
}