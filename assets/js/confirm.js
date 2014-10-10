  //fungsi untuk konfirmasi jadi hapus/tidak sebuah post
  function hapus(id)
  {
    //memunculkan prompt konfirmasi yes-or-no
    var answer = confirm("Are you sure want to delete this post?");
    if (answer){
      var d_id = "d_"+id;
      //mengambil data dari dokumen html yang mempunyai id bernama "d_id"
      var link = document.getElementById(d_id);
      //menuju halaman tepat post dihapus
      link.href = "deletepost.php?var="+id;
    }
  }

  function checkemail()
  {
    var email=document.getElementById('email');
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

  function ClearInputField() {
        document.getElementById('Nama').val("");
        document.getElementById('Email').val("");
        document.getElementById('Komentar').val("");
    }


  function checkformat(tanggal)
  {
    //alert(tanggal);
  	var re = /^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/;

    var today = new Date();
    var date = tanggal.match(re);
    //alert("date : " + date);
    var dtYear = date[0][0]+date[0][1]+date[0][2]+date[0][3];
    var dtMonth = date[0][5]+date[0][6];
    var dtDay=  date[0][8]+date[0][9];

    var tYear = today.getFullYear().toString();
    var tMonth = ("0" + (today.getMonth()+1)).slice(-2).toString();
    var tDay = ("0" + today.getDate()).slice(-2).toString();

    //waktu lebih kecil dari hari ini
    if (dtYear<tYear){
      if (dtMonth<tMonth){
        if (dtDay<tDay){
          document.getElementById('date_comment').innerHTML="Tanggal tidak boleh lebih kecil dari hari ini!";
        }
      }
    }
  }

