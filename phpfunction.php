<?php
function StrTanggal($tanggal){
  preg_match('#^(\d{4})-(\d{2})-(\d{2})$#', $tanggal, $matches);
  $year = $matches[1];
  $month = $matches[2];
  $date = $matches[3];
  $output = $date . " ";
  if ($month=="01"){
    $output = $output . "Januari ";
  } else if ($month=="02"){
    $output = $output . "Februari ";
  } else if ($month=="03"){
    $output = $output . "Maret ";
  } else if ($month=="04"){
    $output = $output . "April ";
  } else if ($month=="05"){
    $output = $output . "Mei ";
  } else if ($month=="06"){
    $output = $output . "Juni ";
  } else if ($month=="07"){
    $output = $output . "Juli ";
  } else if ($month=="08"){
    $output = $output . "Agustus ";
  } else if ($month=="09"){
    $output = $output . "September ";
  } else if ($month=="10"){
    $output = $output . "Oktober ";
  } else if ($month=="11"){
    $output = $output . "November ";
  } else{
    $output = $output . "Desember ";
  }
  $output = $output . $year;

  return $output;
}
?>