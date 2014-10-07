<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/foundation.css" />
	<script type="text/javascript">
		function ValidateForm() {
			var x = document.forms["CreateComment"]["Email"].value;
			var atpos = x.indexOf("@");
			var dotpos = x.lastIndexOf(".");
			if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
				alert("Alamat email tidak valid");
				return false;
			}
			
		}
	</script>
</head>
<?php
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password=""; // Mysql password 
	$db_name="CRUD"; // Database name 
	$tbl_name="blogpost"; // Table name 

	// Connect to server and select database.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");
	$id=$_GET['id'];
	$sql="SELECT * FROM $tbl_name WHERE IDBlogPost='$id'";
	$result=mysql_query($sql);
	$rows=mysql_fetch_array($result);
?>
<body>
	<div class="row">
		<div class="large-12 columns">
			<p><h3><?php echo $rows['Judul']; ?></h3><br>
			<?php echo $rows['Tanggal']; ?></p>
			<hr>
			<br>
		</div>
	</div>
	<div class="row">
		<div class="large-12 columns">
			<div class="panel">
			<p><?php echo $rows['Konten']; ?></p><br><br>
			</div>
		</div>
	</div>
	<div class="row">
	<div class="large-12 columns">
	<h4> Komentar </h4>
	<div class="comment-block">
		<?php $tbl_name="komentar";
		$sql="SELECT * FROM $tbl_name WHERE IDBlogPost='$id'";
		$result=mysql_query($sql);
		while($row=mysql_fetch_array($result)){ ?>
			<div class="large-4 columns"><p><h5>
			<?php
				echo $row['Nama'];
			?> </h5>
			<?php
				echo $row['Tanggal'];
			?> </p></div>
			<div class="large-8 columns"><p>
			<?php
				echo $row['Isi'];
			?> <br> </div><hr>
		<?php } ?>
	</div>
	</div>
	</div>
	<div class="row"> <!--comment box -->
		<div class="large-12 columns">
			<div class="callout panel">
				<h4> Tambahkan Komentar </h4>
				<form name="CreateComment" method="post">
					<div class="row">
						<div class="large-6 columns">
							<label>Nama</label>
							<input type="text" name="Nama" required/>
							<br>
						</div>
						<div class="large-6 columns">
							<label>Email</label>
							<input type="text" name="Email" required/>
							<br>
						</div>
					</div>
					<div class="row">
						<div class="large-12 columns">
							<label>Komentar</label>
							<textarea name="Isi" placeholder="Masukkan komentar anda" required></textarea>
							<input name="id" type="hidden" value="<?php echo $rows['IDBlogPost']; ?>">
						</div>
					</div>
					<div class="row">
						<div class="large-12 columns">
							<input type="submit" class="small button" onclick="return ValidateForm()">
						</div>
					</div>
				</form>
			</div>
			<hr>
		</div>
	</div>
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
  var form = $('form');
  var submit = $('#submit');

  form.on('submit', function(e) {
    // prevent default action
    e.preventDefault();
    // send ajax request
    $.ajax({
      url: 'ajax_comment.php',
      type: 'POST',
      cache: false,
      data: form.serialize(), //form serizlize data
      beforeSend: function(){
        // change submit button value text and disabled it
        submit.val('Submitting...').attr('disabled', 'disabled');
      },
      success: function(data){
        // Append with fadeIn see http://stackoverflow.com/a/978731
        var item = $(data).hide().fadeIn(800);
        $('.comment-block').append(item);

        // reset form and button
        form.trigger('reset');
        submit.val('Submit Comment').removeAttr('disabled');
      },
      error: function(e){
        alert(e);
      }
    });
  });
});
</script>
</html>