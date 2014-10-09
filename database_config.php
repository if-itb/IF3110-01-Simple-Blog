<?php
    function get_con_mysqli()
    {
        $dbconnection = mysqli_connect("localhost","root","akhfa","blog");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        else
            return $dbconnection;
    }
    function get_con_mysql()
    {
        $dbconnection = mysql_connect("localhost","root","akhfa","blog");
        return $dbconnection;
    }
    
    function close_connection($con)
    {
        mysqli_close($con);
    }
?>