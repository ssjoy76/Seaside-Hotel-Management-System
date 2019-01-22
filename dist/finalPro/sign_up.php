<html>
    <head>
        
    </head>

    <body>
        <?php
            $flag = true;
            require("db_rw.php");
            $name = $_REQUEST['f_name'];
            $email = $_REQUEST['email'];
            $phone = $_REQUEST['phone'];
            $gender = $_REQUEST['gender'];
            $password = $_REQUEST['password'];
            $cpass = $_REQUEST['c_password'];
            $type=$_REQUEST['type'];

            if(!empty($_REQUEST['adminId']) && !empty($_REQUEST['adminPass']))
            {
                $adminId = $_REQUEST['adminId'];
                $adminPass = $_REQUEST['adminPass'];
                $sql = "select id,password from login where id=".$adminId.";";
                $jsonData = getJSONFromDB($sql);
                $loginData = json_decode($jsonData);
                foreach($loginData as $check)
                {
                    if($check->id == $adminId && $check->password == $adminPass)
                    {
                        $type = "operator";
                    }
                    else
                        $flag = false;
                }
            }

            if($password != $cpass)
            {
                $flag = false;
            }

            $sql="";

            if($flag && isset($_REQUEST['f_name']) && isset($_REQUEST['email']) && isset($_REQUEST['phone']) && isset($_REQUEST['gender']) && isset($_REQUEST['password']) && isset($_REQUEST['type']))
            {
            	$sql="INSERT INTO user VALUES (NULL,'".$_REQUEST['f_name']."','".$_REQUEST['email']."','".$_REQUEST['phone']."','".$_REQUEST['gender']."','".$_REQUEST['password']."','".$_REQUEST['type']."')";

            	updateDB($sql);

                $jsonData = getJSONFromDB("select max(id) from user;");
                $loginData = json_decode($jsonData, true);
                $newID = $loginData[0]["max(id)"];

                //print_r($loginData);

                $sql2 = "INSERT INTO login VALUES (".$newID.",'".$_REQUEST['password']."','".$_REQUEST['type']."');";
                updateDB($sql2);

                echo "<script>";
                echo "alert('".$newID." is your ID, Save it for Future Access!');";             
                // This is the value which you have to remember
                echo "</script>";
                
            }

            else
            {
            	echo "Invalid Parameter";
            }

            //mysqli_close($conn);

        ?>

    </body>
</html>