<?php
    $data = json_decode(file_get_contents('php://input'));
    // postID, name, email, content

    if (!(isset($data->{'postID'}) && isset($data->{'name'}) && isset($data->{'email'})
        && isset($data->{'content'}))) {
        echo "Failed, Wrong POST";

    } else {

    $mysqli = new mysqli("localhost", "WBD_USER", "QKC3zwhJ", "WBD_DB");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {

    if (!($stmt = $mysqli->prepare("INSERT INTO `comments`(`ID_POST`, `NAME`, `EMAIL`, `COMMENT`) VALUES (?, ?, ?, ?)"))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " > $mysqli->error;
    } else {

    if (!$stmt->bind_param("isss", $data->{'postID'}, $data->{'name'}, $data->{'email'}, $data->{'content'})) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    } else {

    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    } else {


    echo "SUCCESS";
    }
    }
    }
    }
    }

?>