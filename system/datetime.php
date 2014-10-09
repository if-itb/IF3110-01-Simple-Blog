<?php 

	function dateBeautifier($str) {
    setlocale(LC_TIME, "");
    setlocale(LC_TIME, "id_ID");
    //Contoh: 1 Januari 2015
    return strftime("%#d %B %Y", strtotime($str));
	}

  function datetimeBeautifier($str) {
    $datetime =  strtotime($str);
    $interval =  date_create($str)->diff(date_create('now'));

    if ($interval->days > 0) {
      setlocale(LC_TIME, "");
      setlocale(LC_TIME, "id_ID");
      return strftime("%#d %B %Y </br> Jam %H:%M", strtotime($str));
    }

    if ($interval->h >= 1) {
      return $interval->h." jam yang lalu";    
    }

    if ($interval->i >= 1) {
      return $interval->i." menit yang lalu";   
    } 

    return "Beberapa saat yang lalu";
  }