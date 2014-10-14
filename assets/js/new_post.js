var dayOfMonth = [31,29,31,30,31,30,31,31,30,31,30,31];
    
    function createDropDown(){
        var today = new Date();
        var monthText = ['January','February','Maret','April','May','June','July','August','September','October','November','December'];
        var dateDropDown = document.getElementById('Date');
        var monthDropDown = document.getElementById('Month');
        var yearDropDown = document.getElementById('Year');
        var i = 0;
        for (i=0;i<monthText.length;i++){
            monthDropDown.options[i] = new Option(monthText[i],i+1);
        }
        monthDropDown.selectedIndex = today.getMonth();

        for (i=1900;i<=1900+today.getYear()+100;i++){
            yearDropDown.options[i-1900] = new Option(i,i);
        }
        yearDropDown.selectedIndex = today.getYear();
        
        for (i=1;i<=31;i++) {
            dateDropDown.options[i-1] = new Option(i,i);
        }
        dateDropDown.selectedIndex = today.getDate()-1;
        
        onMonthChange();
    }
    
    function onMonthChange(){
        var dateDropDown = document.getElementById('Date');
        var monthDropDown = document.getElementById('Month');
        var i = 0;
        for (i =0 ;i<31;i++){
            dateDropDown.options[i].disabled = true;
        }
        for (i = 0;i<dayOfMonth[monthDropDown.selectedIndex];i++) {
            dateDropDown.options[i].disabled = false;
        }
    }
    
    function onSubmitClick(){
        try{
            var isRedirect = isDateLessThanToday()
            if (isRedirect){
                alert('Tanggal yang anda masukkan harus lebih besar dari tanggal hari ini');
                return false;
            }
            else{
                return true;
            }
        }
        catch(e){
            return false;
        }
    }
    
    function isDateLessThanToday(){
        var today = new Date();
        console.log(today.getDate()+" "+today.getMonth()+" "+today.getYear());
        var dateDropDown = document.getElementById('Date');
        var monthDropDown = document.getElementById('Month');
        var yearDropDown = document.getElementById('Year');
        if (yearDropDown.selectedIndex<today.getYear()) {
            return true;
        }
        else if (yearDropDown.selectedIndex == today.getYear()){
            if (monthDropDown.selectedIndex<today.getMonth()) {
                return true;
            }
            else if (monthDropDown.selectedIndex==today.getMonth()){
                if (dateDropDown.selectedIndex+1<today.getDate()) {
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
    
    window.onload = function(){
        createDropDown();
    }