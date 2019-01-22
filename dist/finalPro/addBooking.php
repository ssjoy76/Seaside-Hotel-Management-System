<?php
	session_start();
	$i = $_SESSION['id'];
	//$flag = true;
	require("db_rw.php");
	$bDate = date('Y-m-d', strtotime($_REQUEST['booking_date']));
	$type = $_REQUEST['room_type'];
	$checkIn = date('Y-m-d', strtotime($_REQUEST['check_in']));
	$checkOut = date('Y-m-d', strtotime($_REQUEST['check_out']));
	//print_r($GLOBALS);

	if(!empty($_REQUEST['booking_date']) && !empty($_REQUEST['room_type']) && !empty($_REQUEST['check_in']) && !empty($_REQUEST['check_out']))
	{
		$sql="INSERT INTO booking VALUES (NULL,".$i.",'".$type."','".$checkIn."','".$checkOut."','Pending')";
		updateDB($sql);
	}

	else
	{
		echo "Invalid Action";
	}


?>