<?php
    require('db_rw.php');
    $roomID = $_REQUEST['rId'];
    $custID = $_REQUEST['cId'];
    $checkIn = $_REQUEST['checkInd'];
    $checkOut = $_REQUEST['checkOutd'];
    $expense = "";
    $check = $_REQUEST['check'];

    if($check == "confirmation")
    {
        $sql2 = "UPDATE booking SET status = 'Confirm' WHERE customer_id=".$custID;
        updateDB($sql2);
        
    }
    else if($check == "addCheckIn")
    {
        $jsnData = getJSONFromDB("SELECT room_rent FROM room where room_id=".$roomID);
        $roomInfo = json_decode($jsnData);

        foreach($roomInfo as $v)
        {
            $expense = $v->room_rent;
        }
        
        $sql1 = "INSERT INTO rent VALUES (NULL,".$custID.",".$roomID.",".$expense.",'".$checkIn."','".$checkOut."');";
        //$sql1 = "INSERT INTO rent VALUES (NULL,2,1,1000,'1990-10-10','1990-10-10');";
        updateDB($sql1); // Hotel Room Rent Added..
        $sql3 = "UPDATE booking SET status = 'Success' WHERE customer_id=".$custID;
        updateDB($sql3);
    }
?>