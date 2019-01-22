<?php
function updateDB($sql){
	$conn = mysqli_connect("localhost", "root", "", "wbd");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	if(mysqli_query($conn, $sql)) {
		echo "Updated";
	}
	else{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","wbd");
	//echo $sql;
	$result = mysqli_query($conn, $sql)or die(mysqli_error($$conn));
	$arr=array();
	//print_r($result);
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
}
function deleteDB($sql){
// Create connection
$conn = mysqli_connect("localhost", "root", "","wbd");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record
//$sql = "DELETE FROM MyGuests WHERE id=3";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
}
?>