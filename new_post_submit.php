<?php

require_once 'functions.php';

create_post($_POST["Judul"], $_POST["Tanggal"], $_POST["Konten"]);

header("Location: index.php");