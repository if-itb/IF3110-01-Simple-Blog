<?php 
		$con=mysqli_connect("localhost","root","","simpleblog");
		// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$result = mysqli_query($con,"SELECT * FROM post where Id_Post='".$_GET["Id"]."'");
				while($row = mysqli_fetch_array($result)){

				
				echo '

<article class="art simple post">
    
    <header class="art-header">
        <div style="margin-top: 350px;">
            <time class="art-time">'.$row["Tanggal"].'</time>
            <h2 class="art-title">'.$row["Judul"].'</h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body" style="left:20% ; right:20%">
            <hr>
            <p>'.$row["Konten"].'</p>
			<p> </p>
            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form class="importantForm" name="commentForm" onsubmit ="return validateEmail()" action="javascript:addComment()" method="POST">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>';
			
			$comment = mysqli_query($con,"SELECT * FROM komentar where Id_Post='".$_GET["Id"]."'");
			
			while($row = mysqli_fetch_array($comment)){
			echo '
            </article> 
        </div>
    </div>
				<div style="font-weight :bold;font-size:28px;color:black ; margin-left : 20%; margin-top : 20px">'.$row["Nama"].'  </div>
				<div style="font-size : 12px;margin-left:21% ; width : 60%;margin-top : 20px;margin-bottom : 30px"> '.$row["Komentar"].'</div>
             

' ; }
}
mysqli_close($con);

?>