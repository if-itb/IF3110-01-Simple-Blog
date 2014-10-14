<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        echo "Failed, wrong GET";
        die();
    }

    $mysqli = new mysqli("localhost", "WBD_USER", "QKC3zwhJ", "WBD_DB");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        die();
    }

    if (!($mysqli->query("DELETE FROM `post` WHERE `ID` = " . $id))) {
        echo "Query failed: (" . $mysqli->errno . ") " > $mysqli->error;
        die();
    }


    $relative = "index.php";
    header("Location: ".$relative);
?>