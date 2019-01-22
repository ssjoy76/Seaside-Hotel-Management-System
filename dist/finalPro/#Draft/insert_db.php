<?php
require("db_rw.php");
$sql="";
if(isset($_REQUEST['uid']) && isset($_REQUEST['uname'])){
	$sql="INSERT INTO student VALUES ('".$_REQUEST['uid']."','".$_REQUEST['uname']."',2.55,'CS')";
	echo $sql;
	updateDB($sql);
}
else if(isset($_REQUEST['signal']) && $_REQUEST['signal']=="read"){
	$jd=getJSONFromDB("select * from student");
	echo $jd;
	//$jsn=json_decode($jd,true);
	//foreach($jsn as $v)echo $v["name"]."<br>";
}
else{
	echo "invalid parameter";
}
//updateDB($sql);

/*if(isset($_GET["id"]) && isset($_GET["name"]) && isset($_GET["cgpa"]) && isset($_GET["dept"])){
	$s = "INSERT INTO student 
	VALUES ('".$_GET["id"]."', '".$_GET["name"]."', '".$_GET["cgpa"]."','".$_GET["dept"]."');";
	echo $s;
	updateDB($s);
}
else{
	echo "parameter(s) missing";
}*/
//mysqli_close($conn);
?>