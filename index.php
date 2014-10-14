<?php
  include("db_connect.php");
  $query = "SELECT * FROM post ORDER BY tanggal DESC";
  $result = mysql_query($query);

$title = "Simple Blog";
include("header.php");
include("function.php");
?>


<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
            <?php
            if (mysql_num_rows($result) == 0) {
              echo "<p>No posts found</p>";
            } else {
               while($row = mysql_fetch_assoc($result)) {
                $id = $row['id'];
                $judul = $row['judul'];
                $tanggal = $row['tanggal'];
                $konten = $row['konten'];
              ?>
              <li class="art-list-item">
                  <div class="art-list-item-title-and-time">
                      <h2 class="art-list-title"><a href="post.php?id=<?php echo $id;?>"><?php echo $judul;?></a></h2>
                      <div class="art-list-time"><?php echo printTanggal($tanggal);?></div>
                      <!-- <div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div> -->
                  </div>
                  <p><?php echo $konten;?></p>
                  <p>
                    <a href="edit.php?id=<?php echo $id;?>">Edit</a> | <a href="javascript:void(0)" onclick="deleteConfirmation(<?php echo $id;?>)">Hapus</a>
                  </p>
              </li>
            <?php }
              }
            ?>
          </ul>
        </nav>
    </div>
</div>

<?php include("footer.php"); ?>