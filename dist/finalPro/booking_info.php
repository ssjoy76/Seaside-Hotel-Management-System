<?php
session_start();
$i = $_SESSION['id'];
$j = ++$i;
$flag = true;
require("db_rw.php");
$date = $_REQUEST['booking_date'];
$type = $_REQUEST['room_type'];
$checkIn = $_REQUEST['check_in'];
$checkOut = $_REQUEST['check_out'];
$a=1;
if($flag && isset($_REQUEST['booking_date']) && isset($_REQUEST['room_type']) && isset($_REQUEST['check_in']) && isset($_REQUEST['check_out'])){
	$sql="INSERT INTO booking VALUES ($j,'".$_REQUEST[$i]."','".$_REQUEST['room_type']."','".$_REQUEST['check_in']."','".$_REQUEST['check_out']."','Pending')";
	updateDB($sql);
    ++$a;
}
else{
	echo "invalid parameter";
}


?>