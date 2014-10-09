<?php
    $id =$_GET['id'];
    include 'database_config.php';
    $dbconnection = get_con_mysqli();
    $query = 'DELETE FROM post WHERE id = '.$id;
    //echo $id,$query;
    mysqli_query($dbconnection, $query);
    close_connection($dbconnection);
    
    # Redirect to home
    header('Location: index.php');
?>