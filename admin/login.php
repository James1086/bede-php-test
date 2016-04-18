<?php
 	require("../libs/config.php");
	$success = false;
 	$myusername=$_POST['username']; 
	$mypassword=$_POST['password'];

	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = $conn->real_escape_string($myusername);
	$mypassword = $conn->real_escape_string($mypassword);

	$mypassword = md5($mypassword);

	$islogin = $conn->query("SELECT * FROM users WHERE username='$myusername' and password='$mypassword'");
	
	if (mysqli_num_rows($islogin) == 1 ) {
		$success = true;
		session_start();
		session_regenerate_id();
		$_SESSION['myusername'] = $myusername;
		$result = mysqli_fetch_array($islogin);
		$_SESSION['mystatus'] = $result['role'];
		session_write_close();
		echo ('Login');
		exit();
	} else {
		$con = null;
		return $success;
	}