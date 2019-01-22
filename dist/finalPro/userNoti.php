<?php
	require("db_rw.php");
	session_start();
	$json = getJSONFromDB("SELECT * FROM booking WHERE customer_id=".$_SESSION['id']);
	$data = json_decode($json);
	
	if(!empty($data))
	{    
	    foreach($data as $v)
	    {
	        if($v->status == 'Confirm')
	        {
	            echo '<span style="color:green">Your Booking has been confirmed!</span><br>';
	            echo "<span>Room Type : ".$v->room_type."<br>Check In : ".$v->check_in."<br>Check Out : ".$v->check_out."</span><br>";
	        }

	        else
	        {
	            echo '<span style="color: red" >Your Booking is still pending!<br></span>';
	        }
	    }
	}
?>