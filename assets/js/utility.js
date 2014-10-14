
/**--------------------------
//* Validate Date Field script- By JavaScriptKit.com
//* For this script and 100s more, visit http://www.javascriptkit.com
//* This notice must stay intact for usage
---------------------------**/

//mereturn jika tanggal mengikuti format dd/mm/yyyy
function checkdate(input){
var validformat=/^\d{2}\/\d{2}\/\d{4}$/ //Basic check for format validity
var returnval=false
if (!validformat.test(input))
alert("Invalid Date Format. Please correct and submit again.")
else{ //Detailed check for valid date ranges
var monthfield=input.split("/")[1]
var dayfield=input.split("/")[0]
var yearfield=input.split("/")[2]
var dayobj = new Date(yearfield, monthfield-1, dayfield)
if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield))
alert("Invalid Day, Month, or Year range detected. Please correct and submit again.")
else
returnval=true
}
return returnval
}

function currentDateInString (){
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();

	if(dd<10) {
		dd='0'+dd
	} 

	if(mm<10) {
		mm='0'+mm
	} 

	today = mm+'/'+dd+'/'+yyyy;
	return today
}

//Input is a Date type
function dateToString (input){
	var dd = input.getDate();
	var mm = input.getMonth()+1; //January is 0!
	var yyyy = input.getFullYear();

	if(dd<10) {
		dd='0'+dd
	} 

	if(mm<10) {
		mm='0'+mm
	} 

	hasil = mm+'/'+dd+'/'+yyyy;
	return hasil
}

//Input in format dd/mm/yyyy
function stringToDate (input){
	var monthfield=input.split("/")[1]
	var dayfield=input.split("/")[0]
	var yearfield=input.split("/")[2]
	var dayobj = new Date(yearfield, monthfield-1, dayfield)
	return dayobj
}

//return true if date1 > date2 without the hour,minute and second part,
//else false
function isDateLater (date1, date2){
	var d1  = new Date(date1.getFullYear(),date1.getMonth(),date1.getDay())
	var d2  = new Date(date2.getFullYear(),date2.getMonth(),date2.getDay())
	return d1 > d2
}