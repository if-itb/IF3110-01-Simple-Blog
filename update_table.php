<?php
    if (isset($_POST['ID_post']) && isset($_POST['Judul']) &&
        isset($_POST['Tanggal']) && isset($_POST['Konten'])) {
        $id = $_POST['ID_post'];
        $title = $_POST['Judul'];
        $postdate = date('Y-m-d', strtotime($_POST['Tanggal']));
        $content = $_POST['Konten'];
        $isFeatured = isset($_POST['isFeatured']) ? 1 : 0;
    } else {
        echo "Failed, wrong POST";
        die();
    }

    $mysqli = new mysqli("localhost", "WBD_USER", "QKC3zwhJ", "WBD_DB");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        die();
    }

    if ($id == "null") { // ADD TO DATABASE
        if (!($stmt = $mysqli->prepare("INSERT INTO `post`(`TITLE`, `POSTDATE`, `CONTENT`, `ISFEATURED`) VALUES (?, ?, ?, ?)"))) {
            echo "Prepare failed: (" . $mysqli->errno . ") " > $mysqli->error;
            die();
        }

        if (!$stmt->bind_param("sssi", $title, $postdate, $content, $isFeatured)) {
            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            die();
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            die();
        }
    } else {
        $id = +$id;

        if (!($stmt = $mysqli->prepare("UPDATE `post` SET `TITLE`=?, `POSTDATE`=?, `CONTENT`=?, `ISFEATURED`=? WHERE `ID`=?"))) {
            echo "Prepare failed: (" . $mysqli->errno . ") " > $mysqli->error;
            die();
        }

        if (!$stmt->bind_param("sssii", $title, $postdate, $content, $isFeatured, $id)) {
            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            die();
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            die();
        }
    }


    $relative = "index.php";
    header("Location: ".$relative);
?>