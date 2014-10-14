<?php
    include 'sql_my.php';
    if (!isset($_GET['id'])) {
        echo "wrong GET";
    } else {

    $mysqli = new mysqli("localhost", "WBD_USER", "QKC3zwhJ", "WBD_DB");

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {

    if (!($result = $mysqli->query("SELECT * FROM `comments` WHERE `ID_POST` = ".$_GET['id']." ORDER BY `ID` DESC"))) {
        echo "Query failed: (" . $mysqli->errno . ") " > $mysqli->error;
    } else {

    while ($row = $result->fetch_row()) {
        echo '<li>' .
            '<h2>'. htmlspecialchars($row[2]) .'</h2>' .
            time_passed($row[5]) .
            '<p>'. htmlspecialchars($row[4]) .'</p>' .
            '</li>';
    }}}}

?>