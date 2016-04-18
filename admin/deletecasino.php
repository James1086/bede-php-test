<?php
 	require("../libs/config.php");
	$success = false;
	$deleteid = $_POST['deleteId'];
	
	$sql = "DELETE FROM casinos WHERE id='".$deleteid."'";
	$delete = $conn->query($sql);

	if ($delete === TRUE) {
		$success = true;
		exit();
	} else {
		return $success;
	}