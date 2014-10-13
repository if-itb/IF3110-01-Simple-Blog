function checkDate(input){
	var validformat=/^(\d{4})-(\d{1,2})-(\d{1,2})/
	var retval=false
	if (!validformat.test(input.value))
		alert("Tanggal tidak valid")
	else { //Detailed check for valid date ranges
		var monthfield=input.value.split("-")[1]
		var dayfield=input.value.split("-")[2]
		var yearfield=input.value.split("-")[0]
		var dayobj = new Date(yearfield, monthfield-1, dayfield)
		if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield))
			alert("Tanggal tidak valid")
		else {
			var today = new Date()
			today.setHours(0)
			today.setMinutes(0)
			today.setSeconds(0)
			today.setMilliseconds(0)
			// console.log(dayobj)
			// console.log(today)
			if (dayobj < today) {
				alert('tanggal harus lebih besar atau sama dengan hari ini');
				retval = false
			} else retval=true
		}
	}
	if (retval==false) {
		input.select()
		input.setAttribute("style", "border-color: red;");
	}
	return retval
}