  function hapus(id)
  {
    var answer = confirm("Are you sure want to delete this post?");
    if (answer){
      var d_id = "d_"+id;
      var link = document.getElementById(d_id);
      link.href = "deletepost.php?var="+id;
    }
  }