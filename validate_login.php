<?php 
	$csrf_token = $_POST['csrf_token'];
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];

	session_start();
	if ($csrf_token == $_SESSION['csrf_token']) {
		// Check record into database
		$conn = new mysqli("localhost","root","","tubesweb1");
		$sql = "SELECT * FROM user WHERE Username='$Username'";
		$result = $conn->query($sql);
		$login_status = False;
		$rowPP = "";
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$rowPP .= $row['Password'];
				if ($row['Password'] == $Password) {
					$login_status = True;
				}
			} 
		} 
		$conn->close();
		// Redirect Into Proper State (True / False)
		if ($login_status) {
			// Restart session pasca-login
			session_unset();
			session_destroy();
			session_start();
			// Generate new user token pasca-login
			function generateRandomString() {
			    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			    $charactersLength = strlen($characters);
			    $randomString = '';
			    $length = 20;
			    for ($i = 0; $i < $length; $i++) {
			        $randomString .= $characters[rand(0, $charactersLength - 1)];
			    }
			    return $randomString;
			}
			$new_user_token = generateRandomString();
			// Update session variable
			$_SESSION['user_token'] = $new_user_token;
			// Redirect ke halaman utama
			header('Location:index.php');
		} else {
			//header('Location:login.php');
			echo $Password;
		}
	} else {
		//header('Location:login.php');
		echo 'I am C';
	}
?>