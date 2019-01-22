<html>
	<body>

	<?php
	//print_r($_REQUEST);
	
	$user_name=$_REQUEST['u_name'];
	$password=$_REQUEST['password'];
	
	function getJSONFromDB($sql)
		{
			$conn = mysqli_connect("localhost", "root", "","Hotel_Management_System");
			
			$result = mysqli_query($conn, $sql)or die(mysqli_error());
			$arr=array();

			while($row = mysqli_fetch_assoc($result)) 
				{
					$arr[]=$row;
				}
			return json_encode($arr);
		}
		
	/*	echo getJSONFromDB("select * from student");
		echo '<br/>'.'<br/>'.'<br/>';
	*/	
		$jsn=json_decode(getJSONFromDB("select * from User"));
	/*
		echo "<pre>";
		print_r($jsn);
		echo "</pre>";
	*/	
	if(($user_name == $jsn[0]->user_id) && ($password == $jsn[0]->password))
		{
			header("Location: http://localhost:8082/J son/15-30359-2/admin.php");
		}
		
	elseif(($user_name == $jsn[1]->user_id) && ($password ==$jsn[1]->password))
		{
			header("Location: http://localhost:8082/J son/15-30359-2/student.php");
		}
		
	else
		{
			echo "User Authentication Failed.".'<br>';
		}
	
	?>
	

	</body>
</html>