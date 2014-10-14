<?php

require_once 'functions.php';

edit_post($_POST["id"], $_POST["Judul"], $_POST["Tanggal"], $_POST["Konten"]);

header("Location: index.php");