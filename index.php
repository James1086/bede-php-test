<?php
	session_start();
	require("libs/config.php");
	include("head.php");
	include("header.php");
	
	$noParam = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
	$filename = trim($noParam, '/');
	
	// $filename = trim($_SERVER['REQUEST_URI'], '/');
	if ($filename == '') {
		$filename = 'home-content.php';
	} else {
		$filename = $filename.'-content.php';
	}
	
	if(file_exists($filename)) {
		include("$filename");
	} else {
		include("content.php");
	}
	
	if($_SESSION['mystatus'] == 'admin') {
		include("sidebar.php");
	}

	include("footer.php");
	include("foot.php");
?>