function valiDate(dateString) {
	var d = new Date();
	var dayComp = d.getDate();
	var monthComp = d.getMonth();
	var yearComp = d.getYear();
	var dateSegment = "";
	var str = dateString;
	var i = str.length - 1;
	var segment = 2;
	var bool = false;
	//
	while (i >= 0 && !bool) {
		if (str[i] == '-') { //year validation
			if (segment == 2) {
				if (dateSegment < yearComp) {
					bool = true;
				}
				else {
					dateSegment = "";
					segment--;
				}
			}
			else if (segment == 1) { //month validation
				if (dateSegment < monthComp) {
					bool = true;
				}
				else {
					dateSegment = "";
					segment--;
				}
			}
			else if (segment == 0) { //day validation
				if (dateSegment < dayComp) {
					bool = true;
				}
				else {
					segment--;
				}
			}
		}
		else {
			dateSegment = str[i] + dateSegment;
		}
		i--;
	}
	if (!bool) {
		alert("Tanggal tidak valid!");
	}
	return bool;
}