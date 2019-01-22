<?php
    require('insert_db.php');
    $sName = $_REQUEST['f_name'];
    $sEmail = $_REQUEST['email'];
    $sPhone = $_REQUEST['phone'];
    $sDob = $_REQUEST['day'].$_REQUEST['month'].$_REQUEST['year'];
    $sType = $_REQUEST['type'];
    $redirect="localhost/final/index.html";
    $jsons = getJSONFromDB("select max(id) from ");

    if(isset($sName) && isset($sEmail) && isset($sPhone) && isset($sDob) && isset($sType))
    {
        
    }

    $flag = false;
    $jsonData = getJSONFromDB("select * from login;");
    $loginData = json_decode($jsonData);
    foreach($loginData as $uid)
    {
        if (uid->id == $uId && uid->password == $pass)
        {
            $utype = uid->type;
            $flag = true;
        }
    }

    if ($flag)
    {
        if ($utype == 'admin')
        {
            header('location:','localhost:8082/final/index.html');
        }
        else if ($utype == 'operator')
        {
            header('location:','localhost:8082/final/index.html');
        }
        else
        {
            header('location:','localhost:8082/final/index.html');
        }
    }
    else
    {
    	echo "Validation Failed";
    }
    header('location:'.$redirect);

?>