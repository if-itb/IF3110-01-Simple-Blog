<!DOCTYPE html>
<html>
<?php require '../template/header.php'; ?>

<?php 
  $data = array();
  $data = getID($_GET['id']);
?>

<body class="default">
<div class="wrapper">

<article class="art simple post">
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

        <div class="art-body-inner">
            <h2>Edit Post</h2>

            <div id="contact-area">
                <form method="get" action="../function/editpost.php">
                    <input type="hidden" name="ID" id="ID" value="<?php echo $_GET['id'] ?>">

                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" id="Judul" value="<?php echo $data[0]?>">

                    <label for="Tanggal">Tanggal:</label>
                    <input type="date" name="Tanggal" id="Tanggal" value="<?php echo $data[1] ?>">
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20" id="Konten"> <?php echo $data[2]?> </textarea>

                    <input type="submit" name="submit" value="Edit" class="submit-button">
                </form>
            </div>
        </div>


</article>

<?php include '../template/footer.php' ;?>
</html>