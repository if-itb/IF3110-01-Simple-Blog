<?php
    //create connection
    $connect=mysqli_connect("localhost","root", "", "simple_blog");
    // Check connection
    if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }


    $result = mysqli_query($connect,"SELECT * FROM posting ORDER BY ID DESC");
    $text="";
    while($row = mysqli_fetch_array($result)) {
    
    
      $text=$text. " <li class=\"art-list-item\"> 
       <div class=\"art-list-item-title-and-time\"> 
           
            <h2 class=\"art-list-title\"><a href=\"post.php?id=" .$row['ID']. " \"> " .$row['Judul']. "</a></h2>
            <div class=\"art-list-time\">" . $row['Tanggal'] . "</div>";
            if( $row['Featured'])
            {
              $text=$text."<div class=\"art-list-time\"><span id=\"bintang".$row['ID']."\" onclick=\"featured(".$row['ID'].")\" style=\"color:#F40034;\">&#10029; Featured</span> </div>";
            }
            else
            {
              $text=$text. "<div class=\"art-list-time\"><span id=\"bintang".$row['ID']."\" onclick=\"featured(".$row['ID'].")\" style=\"color:#bbb;\">&#10029; Featured</span> </div>";
           
            }
           
        $text=$text." </div>
        <p>" . $row['Konten'] . "&hellip;</p>
        <p>
          <a href=\"edit.php?id=" .$row['ID']. " \"> Edit</a> | <a href=\"delete.php?id=".$row['ID']." \" onclick=\"return confirm('Apakah Anda yakin menghapus post ini?');\" >Hapus</a>
        </p>
    </li> "
    ;

    }

    echo $text;

    mysqli_close($connect);

?>