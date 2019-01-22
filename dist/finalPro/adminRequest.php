<?php
    require('db_rw.php');
    $check = $_REQUEST['check'];
    if ($check == "users")
    {
        $jsn = getJSONFromDB("select * from user");
        //print_r($jsn);
        $data = json_decode($jsn);

        foreach($data as $v)
        {
            echo "<tr><td>".$v->id."</td>";
            echo "<td>".$v->name."</td>";
            echo "<td>".$v->type."</td>";
            echo "<td>".$v->password."</td>";
            echo '</select></td>';
        }
    }
    else if ($check == "rent")
    {
        $jsn = getJSONFromDB("select * from rent");
        //print_r($jsn);
        $data = json_decode($jsn);
        
        foreach($data as $v)
        {
            echo "<tr><td>".$v->room_id."</td>";
            echo "<td>".$v->check_in."</td>";
            echo "<td>".$v->check_out."</td>";
            echo "<td>".$v->expense."</td>";
            echo '</select></td>';
        }
    }
?>