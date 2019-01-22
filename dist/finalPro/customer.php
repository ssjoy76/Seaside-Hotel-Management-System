<!DOCTYPE html>
<html>
<head>
	<title>Home | Customer</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/javascript.js"></script>
    <Script src="js/bootstrap.js"></Script>
    <Script src="js/bootstrap.min.js"></Script>
    <script>
        function appendBook(){
            b = document.getElementById('booking_info');
            b.style.display = "block";
        }
        /*function appendPay(){
            p = document.getElementById('payment_history');
            p.style.display = "block";
        }*/
        function checkNoti(){
            $y = document.getElementById('notiInfo');
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    msg = xmlhttp.responseText;
                    $y.innerHTML = msg;
                    //alert(msg);
                }
            };
            var url = "userNoti.php";
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
    </script>
</head>
<body onload="checkNoti()">
	<div class="container" id="ProfileSection" style="width: 30%; display: inline-block;">
        <h4 class="text-center">Profile</h4>
        <?php
        session_start();
        require('db_rw.php');
        $i = $_SESSION['id'];
        $sql = "select * from user where id=".$i.";";
        $jasonPro = getJSONFromDB($sql);
        $ProData = json_decode($jasonPro);
        foreach($ProData as $v){
            echo "<h6>Name : ".$v->name."</h6>";
            echo "<h6>Email : ".$v->email."</h6>";
            echo "<h6>Phone : ".$v->phone."</h6>";
            echo "<h6>Gender : ".$v->gender."</h6>";
        }
        ?>
    </div>

	<div class="container" id="MainSection" style="width: 35%; display: inline-block;">
		<div style="text-align: center;">
			<h4 onclick="appendBook()" style="text-decoration: none;" class="btn btn-outline-success">Booking Room</h4>
		</div>
		<div id="booking_info" style="display:none;">
			<form class="form-control" action="addBooking.php" method="Post">
		Booking Date :
			<input class="form-control" type="text" name="booking_date" placeholder="DD-MMM-YYYY" autofocus><br>
 		Room Type :
                <select class="form-control" name="room_type">
	 			<option>General Class</option>
	 			<option>Business Class</option>
	 			<option>Premium Class</option>
	 		</select>

		Check In :
			<input class="form-control" type="text" name="check_in" placeholder="DD-MMM-YYYY"><br><br>
		Check Out :
			<input class="form-control" type="text" name="check_out" placeholder="DD-MMM-YYYY"><br><br>
			<input class="btn btn-outline-primary" type="submit" name="submit" value="Submit" style="margin-left:40%">
            
			</form>
		</div>


		
	</div>

	<div class="container" style="width: 30%; display: inline-block;">
		<h4 id="UserNoti" class="text-center" >Notifications</h4>
        <div id="notiInfo">No Notifications</div>
        
	</div>
</body>
</html>