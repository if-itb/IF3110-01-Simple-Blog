function isKabisat(year){
   if((year%4==0) && (year%100!=0))
      return true;
   else
      return false;
}

function isDateExist(input_date){
   //format tanggal adalah dd/mm/yyyy
   var date_format = /^ *\d{2}-\d{2}-\d{4} *$/; 
   var res = date_format.test(input_date);
   if(res){
      var date_component = input_date.split('-');
      var day = date_component[0];
      var mon = date_component[1];
      var year = date_component[2];
      if((mon==1)||(mon==3)||(mon==5)||(mon==7)||(mon==8)||(mon==10)||(mon==12)){
         return (day<=31);
      }else if((mon==4)||(mon==6)||(mon==9)||(mon==11)){
         return (day<=30);
      }else if(mon==2){
         if(isKabisat(year)) return (day<=29);
         else return (day<=28);
      }else
         return false;
   }else{
      return false;
   }
}

function isValidDate(input_date){
   if(isDateExist(input_date)){
      var date_component = input_date.split('-');
      var day = date_component[0];
      var mon = date_component[1];
      var year = date_component[2];
      
      var in_date = new Date(year,mon-1,day,23,59,59);
      var now_date = new Date();
      
      if (in_date >= now_date)
         return true;
      else
         return false;
   }
   return false;
}

function formValidation(){
   var input_date = document.getElementById("Tanggal").value;
   
   if(isValidDate(input_date)){
      document.getElementById("date-validation").innerHTML = "";
      return true;
   } else{
      document.getElementById("date-validation").innerHTML = "Invalid, date format: dd-mm-yyyy";
      return false;
   }
}

function deleteConfirm(){
   return confirm("Apakah Anda yakin menghapus post ini?");
}
