<?php
 function ConvertDate($dt){
			$mm = explode("-", $dt);
			$ss = explode(" ", $mm[2]);
				switch ($mm[1]) {
				case 1: {
				return $ss[0]+" Januari "+$mm[0];
				break;
				}
				case 2: {
				return '
				<div class="art-list-time">'.$ss[0].' Februari '.$mm[0].'</div>
				';
				break;
				}
				case 3: {
				return '
				<div class="art-list-time">'.$ss[0].' Maret '.$mm[0].'</div>
				';
				break;
				}
				case 4: {
				return '
				<div class="art-list-time">'.$ss[0].' April '.$mm[0].'</div>
				';
				break;
				}
				case 5: {
				return '
				<div class="art-list-time">'.$ss[0].' Mei '.$mm[0].'</div>
				';
				break;
				}
				case 6: {
				return '
				<div class="art-list-time">'.$ss[0].' Juni '.$mm[0].'</div>
				';
				break;
				}
				case 7: {
				return '
				<div class="art-list-time">'.$ss[0].' Juli '.$mm[0].'</div>
				';
				break;
				}
				case 8: {
				return '
				<div class="art-list-time">'.$ss[0].' Agustus '.$mm[0].'</div>
				';
				break;
				}
				case 9: {
				return '
				<div class="art-list-time">'.$ss[0].' September '.$mm[0].'</div>
				';
				break;
				}
				case 10: {
				return '
				<div class="art-list-time">'.$ss[0].' Oktober '.$mm[0].'</div>
				';
				break;
				}
				case 11: {
				return '
				<div class="art-list-time">'.$ss[0].' November '.$mm[0].'</div>
				';
				break;
				}
				case 12: {
				return '
				<div class="art-list-time">'.$ss[0].' Desember '.$mm[0].'</div>
				';
				break;
				}
				}
			}
?>