<?php
require("db_rw.php");
$check = $_REQUEST['check'];
if ($check == "book"){
    $jsn = getJSONFromDB("select * from booking where status='Pending'");
    //print_r($jsn);
    $data = json_decode($jsn);
        foreach($data as $v){
            $jsn2 = getJSONFromDB("select room_id from room where room_type='".$v->room_type."'");
            $data2 = json_decode($jsn2);
            echo "<tr><td>".$v->customer_id."</td>";
            echo "<td>".$v->room_type."</td>";
            echo "<td>".date('d-m-Y', strtotime($v->check_in))."</td>";
            echo "<td>".date('d-m-Y', strtotime($v->check_out))."</td>";
            echo '<td><button class="btn btn-outline-primary" onclick="addBook('.$v->customer_id.')">ADD</button><button id="'.$v->id.'" class="btn btn-outline-danger" onclick="removeBook(this.id)">REMOVE</button></td>';
            echo '<td><select class="form-control" id="roomOption'.$v->customer_id.'">';
            foreach($data2 as $x){
                echo '<option value="cId='.$v->customer_id.'&rId='.$x->room_id.'&checkInd='.$v->check_in.'&checkOutd='.$v->check_out.'">'.$x->room_id.'</option>';
            }
            echo '</select></td>';
    }
}
else if(is_numeric($check)){
    $sql = "DELETE FROM booking WHERE id=".$check;
    deleteDB($sql);
}
else if($check == "checkIn"){
    $jsn = getJSONFromDB("select * from booking where status='Confirm'");
    //print_r($jsn);
    $data = json_decode($jsn);
        foreach($data as $v){
            $jsn2 = getJSONFromDB("select room_id from room where room_type='".$v->room_type."'");
            $data2 = json_decode($jsn2);
            echo "<tr><td>".$v->customer_id."</td>";
            echo "<td>".$v->room_type."</td>";
            echo "<td>".date('d-m-Y', strtotime($v->check_in))."</td>";
            echo "<td>".date('d-m-Y', strtotime($v->check_out))."</td>";
            echo '<td><button class="btn btn-outline-primary" onclick="addCheckIn('.$v->customer_id.')">ADD</button><button id="'.$v->id.'" class="btn btn-outline-danger" onclick="removeBook(this.id)">REMOVE</button></td>';
            echo '<td><select class="form-control" id="roomOption'.$v->customer_id.'">';
            foreach($data2 as $x){
                echo '<option value="cId='.$v->customer_id.'&rId='.$x->room_id.'&checkInd='.$v->check_in.'&checkOutd='.$v->check_out.'">'.$x->room_id.'</option>';
            }
            echo '</select></td>';
        }
}
?>