<!DOCTYPE html>
<?php include 'template/header.php'; ?>
<html>

<body class="default">
<div class="wrapper">

<?php 
  $query = 'SELECT * FROM posting';
  $result = mysql_query($query);
  if(!$result){
    echo 'no result';
  }
  $id = array("");
  $judul = array("");
  $tanggal = array("");
  $konten = array("");
  while($row = mysql_fetch_row($result)){
    array_push($id, $row[0]);
    array_push($judul, $row[1]);
    array_push($tanggal,$row[2]);
    array_push($konten,$row[3]);
  }
?>

<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
            <?php 
              for($i=sizeof($id)-1;$i>0;$i--){?>
                <li class="art-list-item">
                  <div class="art-list-item-title-and-time">
                    <h2 class="art-list-title"><a href="/if3110-01-simple-blog/view/post_view.php?id=<?php echo $id[$i]?>"> <?php echo $judul[$i]; ?></a></h2>
                    <div class="art-list-time"> <?php echo convertDate($tanggal[$i]) ?></div>
                    <div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div>
                  </div>
                  <p> <?php echo $konten[$i] ?></p>
                  <p>
                    <a href="/if3110-01-simple-blog/view/edit_form.php?id=<?php echo $id[$i]?>">Edit</a> | <a href="javascript:delete_post(<?php echo $id[$i]?>);">Hapus</a>
                  </p>
                </li>
            <?php } ?>
            

            <li class="art-list-item">
                <div class="art-list-item-title-and-time">
                    <h2 class="art-list-title"><a href="post.html">Siapa dibalik Simple Blog?</a></h2>
                    <div class="art-list-time">11 Juli 2014</div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! &hellip;</p>
                <p>
                  <a href="#">Edit</a> | <a href="#">Hapus</a>
                </p>
            </li>
          </ul>
        </nav>
    </div>
</div>

<?php include 'template/footer.php'; ?>
</html>