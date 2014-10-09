<?php 

	function dateBeautifier($str) {
    setlocale(LC_TIME, "");
    setlocale(LC_TIME, "id_ID");
    //Contoh: 1 Januari 2015
    return strftime("%#d %B %Y", strtotime($str));
	}