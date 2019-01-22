<!DOCTYPE html>
<html>
    <head>
        
    </head>

    <body>

        <?php
        session_start();
        $_SESSION['id'] = $_REQUEST['u_name'];
        require('db_rw.php');
        $uId = $_REQUEST['u_name'];
        $pass = $_REQUEST['password'];
        $redirect="index.html";
        $utype = "";
        $flag = false;
        $jsonData = getJSONFromDB("select * from login;");
        $loginData = json_decode($jsonData);
        
        foreach($loginData as $check)
        {
            if($check->id == $uId && $check->password == $pass)
            {
                $utype = $check->user_type;
                $flag = true;
            }
        }
        /*
        echo "<pre>";
        print_r($utype);
        echo "</pre>"; 
        */
        if ($flag)
        {
            if ($utype == 'admin')
                header('location:'.'admin.php');
            else if ($utype == 'operator')
                header('location:'.'operator.php');
            else
                header('location:'.'customer.php');
        }
        else
        {
            header('location:'.'index.html');
        }

        ?>

    </body>
</html>