<?php

define("KOMENTAR_FILENAME", "komentar.db");

if (!file_exists(KOMENTAR_FILENAME) || file_get_contents(KOMENTAR_FILENAME) == "") {
	$komentars = array();
	file_put_contents(KOMENTAR_FILENAME, serialize($komentars));
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$komentars = unserialize(file_get_contents(KOMENTAR_FILENAME));
	foreach ($komentars as $id => $komentar) {
		if ($komentar["id_post"] == $_GET["id_post"]) {
			echo '<li class="art-list-item">';
			echo '<div class="art-list-item-title-and-time">';
			echo '<h2 class="art-list-title">' . $komentar["nama"] . '</h2>';
			echo '<div class="art-list-time">' . $komentar["tanggal"] . '</div>';
			echo '</div>';
			echo '<p>' . $komentar["komentar"] . '</p>';
			echo '</li>';
		}
	}
	// echo 'done.';
}
else if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$komentars = unserialize(file_get_contents(KOMENTAR_FILENAME));
	$komentars[] = array(
		"id_post" => $_POST["id_post"],
		"nama" => $_POST["nama"],
		"tanggal" => time(),
		"email" => $_POST["email"],
		"komentar" => $_POST["komentar"]
		);
	file_put_contents(KOMENTAR_FILENAME, serialize($komentars));
	echo 'success';
}