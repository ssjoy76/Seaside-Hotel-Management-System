<!DOCTYPE html>
<html>
<head>
	<title>Home | Operator</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/javascript.js"></script>
    <Script src="js/bootstrap.js"></Script>
    <Script src="js/bootstrap.min.js"></Script>
    <script>
        function detailsBook(){
            document.getElementById('checkInHotel').style.display = "none";
            document.getElementById('checkInHotel').innerHTML = "";
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    add = document.getElementById("bookingConfirm");
                    add.style.display = "block";
                    msg = xmlhttp.responseText;
                    add.innerHTML = "<table class='table'><tr><th>Customer ID</th><th>Room Type</th><th>Expected Check In</th><th>Expected Check Out</th><th>Options</th><th>Available Room</th></tr>"+msg+"</table>";
                    //alert(msg);
                }
            };
            var url = "pendingRequest.php?check=book";
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        function detailsCheckIn(){
            document.getElementById('bookingConfirm').style.display = "none";
            document.getElementById('bookingConfirm').innerHTML = "";
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    add = document.getElementById("checkInHotel");
                    add.style.display = "block";
                    msg = xmlhttp.responseText;
                    add.innerHTML = "<table class='table'><tr><th>Customer ID</th><th>Room Type</th><th>Check In</th><th>Expected Check Out</th><th>Options</th><th>Available Room</th></tr>"+msg+"</table>";
                    //alert(msg);
                }
            };
            var url = "pendingRequest.php?check=checkIn";
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        function addBook($idForOption){
            $flag = confirm("Before Clicking OK, Check Again!");
            if($flag){
                $x = document.getElementById('roomOption'+$idForOption);
                $combineId = $x[$x.selectedIndex].value;
                // = document.getElementsByTagName('option')[$x].id;
                var xmlhttp2 = new XMLHttpRequest();
                var url2 = "addRequest.php?"+$combineId+"&check=confirmation";
                //alert(url2);
                xmlhttp2.open("GET", url2, true);
                xmlhttp2.send();
                document.getElementById('bookingConfirm').style.display = "none";
                alert("You Have Successfully Confirmed Booking!\nNow You can CheckIn at the Expected Time");
            }
        }
        function addCheckIn($idForOption){
            $flag = confirm("Before Clicking OK, Check Again!");
            if($flag){
                $x = document.getElementById('roomOption'+$idForOption);
                $combineId = $x[$x.selectedIndex].value;
                // = document.getElementsByTagName('option')[$x].id;
                var xmlhttp2 = new XMLHttpRequest();
                var url2 = "addRequest.php?"+$combineId+"&check=addCheckIn";
                //alert(url2);
                xmlhttp2.open("GET", url2, true);
                xmlhttp2.send();
                document.getElementById('checkInHotel').style.display = "none";
                alert("Client Has Successfully CheckedIn!\nHave a Good Time");
            }
        }
        function removeBook($roomId){
            $flag = confirm("Are You Sure Want to Delete Booking?");
            if($flag){
                var xmlhttp1 = new XMLHttpRequest();
                var url1 = "pendingRequest.php?check="+$roomId;
                
                xmlhttp1.open("GET", url1, true);
                xmlhttp1.send();
                document.getElementById('bookingConfirm').style.display = "none";
                alert("You Have Successfully Deleted!");
            }
        }
    </script>
</head>
<body>
    <div class="container">
    <h1 class="text-center">Operator</h1>
	<div style="width: 100%; display: inline-block;" class="text-center">
			<a style="text-decoration: none;" onclick="detailsBook()" class="btn btn-outline-success">Applied For Reservation</a>
			<div id="bookingConfirm">
            </div>
    </div>

    <div style="width: 100%; display: inline-block;" class="text-center">
        <a style="margin-top:1%;text-decoration: none;" onclick="detailsCheckIn()" class="btn btn-outline-success">Hotel Check In</a>
        <div id="checkInHotel">	
		</div>
    </div>
        </div>


</body>
</html>