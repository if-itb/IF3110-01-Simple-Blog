<?php

 //create connection
$connect=mysqli_connect("localhost","root", "", "simple_blog");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$result = mysqli_query($connect,"SELECT * FROM komentar WHERE ID= ". $_GET['id']. " ORDER BY ID_Komentar DESC ");


date_default_timezone_set("Asia/Jakarta");
$yearN = date("Y");
$monthN = date("n");
$dateN = date("j");
$hourN = date("G");
$minuteN = date("i");
$secondN = date("s");
$time="";
			

$text="";
while($row = mysqli_fetch_array($result))
{
	$datetime= explode(" ",$row['Tanggal']);
	list($year, $month, $date)=explode("-",$datetime[0]);
	list($hour, $minute, $second)=explode(":",$datetime[1]);


	if($year == $yearN)
	{
		if($month == $monthN)
		{
			if($date == $dateN)
			{
				if($hour == $hourN)
				{
					if($minute == $minuteN)
					{
						if($second == $secondN)
						{
							$time="just now";
						}
						else
						{
							$time= $secondN-$second." seconds ago";
						}
					}
					else
					{
						$time= $minuteN-$minute." minute ago";
					}
				}
				else
				{
					$time= $hourN-$hour." hour ago";
				}
			}
			else
			{
				$time= $dateN-$date." days ago";
			}
		}
		else
		{
			$time= $monthN-$month." months ago";
		}
	}
	else
	{
		$time= $yearN-$year." years ago";
	}


	$text= $text."
	<li class=\"art-list-item\">
                <div class=\"art-list-item-title-and-time\">
                    <h2 id =\"Nama_Komentar\" class=\"art-list-title\"><a href=\"#\"> ". $row['Nama']. " </a></h2>
                    <div id =\"Tanggal_Komentar\" class=\"art-list-time\"> ". $time. " </div>
                </div>
                <p id =\"Komentar_Komentar\"> ".$row['Komentar']." </p>
    </li>
    ";
}

echo $text;

?>