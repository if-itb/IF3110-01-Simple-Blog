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
    var email=document.getElementById('email')
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
  	
  }

