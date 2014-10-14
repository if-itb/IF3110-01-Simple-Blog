<?php 
	$con=mysqli_connect("127.0.0.1","root","","simpleblog");
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	} 

	$ID = $_GET['id'];
	$result = mysqli_query($con,"SELECT * FROM komentar WHERE ID=".$ID." ORDER BY ID_KOMENTAR DESC");

	date_default_timezone_set("Asia/Jakarta");

	while($row = mysqli_fetch_array($result)) {
		$DateTime = $row['TANGGAL'];
		list($Date, $Time) = explode(" ", $DateTime);
		list($thnx, $blnx, $tglx) = explode("-", $Date);
		list($jamx, $mntx, $dtkx) = explode(":", $Time);

		$thn = date("Y");	$thnpost = (int)$thnx;
		$bln = date("m");	$blnpost = (int)$blnx;
		$tgl = date("d");	$tglpost = (int)$tglx;
		$jam = date("G");	$jampost = (int)$jamx;
		$mnt = date("i");	$mntpost = (int)$mntx;
		$dtk = date("s");	$dtkpost = (int)$dtkx;

		$waktuprint = "";
		if($thn>$thnpost)
		{
			$print = $thn - $thnpost;
			$waktuprint = $print." year(s) ago";
		}
		else if($bln>$blnpost)
		{
			$print = $bln - $blnpost;
			$waktuprint = $print." month(s) ago";
		}
		else if($tgl>$tglpost)
		{
			$print = $tgl - $tglpost;
			$waktuprint = $print." day(s) ago";
		}
		else if($jam>$jampost)
		{
			$print = $jam - $jampost;
			$waktuprint = $print." hour(s) ago";
		}
		else if($mnt>$mntpost)
		{
			$print = $mnt - $mntpost;
			$waktuprint = $print." minute(s) ago";
		}
		else if($dtk>$dtkpost)
		{
			$print = $dtk - $dtkpost;
			$waktuprint = $print." second(s) ago";
		}
		else
		{
			$waktuprint = "Just now";
		}
		echo "
            <li class=\"art-list-item\">
                <div class=\"art-list-item-title-and-time\">
                    <h2 class=\"art-list-title\"><a href=\"#\">".$row['NAMA']."</a></h2>
                    <div class=\"art-list-time\">$waktuprint</div>
                </div>
                <p>".$row['KONTEN']."</p>
            </li>
        ";
	}
?>