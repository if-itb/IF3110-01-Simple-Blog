  //fungsi untuk konfirmasi jadi hapus/tidak sebuah post
  function hapus(id)
  {
    //memunculkan prompt konfirmasi yes-or-no
    var answer = confirm("Apakah Anda yakin menghapus post ini?");
    if (answer){
      var d_id = "d_"+id;
      //mengambil data dari dokumen html yang mempunyai id bernama "d_id"
      var link = document.getElementById(d_id);
      //menuju halaman tepat post dihapus
      link.href = "deletepost.php?var="+id;
    }
  }

  function checkemail(email)
  {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(email.match(re)){
      document.getElementById("email_comment").innerHTML="Email Valid!";
      document.getElementById("email_comment").style.color="#18FF21";
    }else{
      document.getElementById("email_comment").innerHTML="Not a valid email!";
      document.getElementById("email_comment").style.color="#E60000";
    }
  }

  //fungsi untuk validasi format pada form tambah post
  function checkformat()
  {
    //cek jika judul kosong atau tidak
    var judul = document.getElementById("Judul").value;
    if (judul==""){
      //jika judul kosong
      document.getElementById("title_comment").innerHTML="Judul tidak boleh kosong!";
      document.getElementById("title_comment").style.color="red";
      return false;
    }
    else if(judul!=""){ //jika judul tidak kosong, validasi tanggal
      document.getElementById("title_comment").innerHTML="";
      var tanggal = document.getElementById("Tanggal").value;
      if (tanggal.length>10){ //jika yang diinput pada tanggal >10 maka salah format
        document.getElementById("date_comment").innerHTML="Format tanggal salah!";
        document.getElementById("date_comment").style.color="red";
        return false;
      }
      else{
        //regex untuk cek tanggal yang valid
        var re = /^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/;

        var today = new Date();
        var date=tanggal.match(re); //matching input tanggal dengan regex
        
        if(!date){
          document.getElementById("date_comment").innerHTML="Format tanggal salah!";
          document.getElementById("date_comment").style.color="red";
          return false;
        }

        //mengambil tahun, bulan, dan tanggal dari hasil matching dengan regex
        var dtYear = date[0][0]+date[0][1]+date[0][2]+date[0][3];
        var dtMonth = date[0][5]+date[0][6];
        var dtDay=  date[0][8]+date[0][9];

        //memasukan hasil regex kedalam tipe Date
        var in_date=new Date();
        in_date.setDate(dtDay);
        in_date.setMonth(dtMonth-1);
        in_date.setYear(dtYear);

        if (in_date<today){ //jika input tanggal lebih kecil dari hari ini
          document.getElementById("date_comment").innerHTML="Tanggal tidak boleh lebih kecil dari hari ini";
          document.getElementById("date_comment").style.color="red";
          return false;
        }
        else if (in_date>today){  //jika input tanggal lebih besar dari hari ini
          document.getElementById("date_comment").innerHTML="Tanggal tidak boleh lebih besar dari hari ini";
          document.getElementById("date_comment").style.color="red";
          return false;
        }
        else{ //jika input tanggal sama dengan hari ini
          document.getElementById("date_comment").innerHTML="ok!";
          document.getElementById("date_comment").style.color="blue";
          document.getElementById("form_submit").action = "new_post.php";
          return true;
        }
      }
    }
  }

  //fungsi untuk validasi format pada form edit
  function checkformatedit(id){
    //cek jika judul kosong atau tidak
    var judul = document.getElementById("Judul").value;
    if (judul==""){
      //jika judul kosong
      document.getElementById("title_comment").innerHTML="Judul tidak boleh kosong!";
      document.getElementById("title_comment").style.color="red";
      return false;
    }else{
      document.getElementById("edit_form").action = "editdb.php?var="+id;
      return true;
    }
  }