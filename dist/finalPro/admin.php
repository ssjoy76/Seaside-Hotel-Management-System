<!DOCTYPE html>
<html>
<head>
	<title>HOME | Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/javascript.js"></script>
    <Script src="js/bootstrap.js"></Script>
    <Script src="js/bootstrap.min.js"></Script>
    <script>
        
        function adminUsers(){
            document.getElementById('adminHState').style.display = "none";
            document.getElementById('adminHState').innerHTML = "";
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    add = document.getElementById("adminUsers");
                    add.style.display = "block";
                    msg = xmlhttp.responseText;
                    add.innerHTML = "<table class='table'><tr><th>ID</th><th>Name</th><th>User Type</th><th>Password</th></tr>"+msg+"</table>";
                    //alert(msg);
                }
            };
            var url = "adminRequest.php?check=users";
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        function adminState(){
            document.getElementById('adminUsers').style.display = "none";
            document.getElementById('adminUsers').innerHTML = "";
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    add = document.getElementById("adminHState");
                    add.style.display = "block";
                    msg = xmlhttp.responseText;
                    add.innerHTML = "<table class='table'><tr><th>Room</th><th>Check In</th><th>Check Out</th><th>Revenue</th></tr>"+msg+"</table>";
                    //alert(msg);
                }
            };
            var url = "adminRequest.php?check=rent";
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        
        
    </script>
</head>
<body>
    <div class="container">
	<h4 class="text-center">Admin</h4>
	<div class="text-center" style="width: 100%; display: inline-block;">
			<a style="text-decoration: none;" onclick="adminUsers()" class="btn btn-outline-success">Users</a>
			<div id="adminUsers">
            </div>
    </div>

    <div class="text-center" style="width: 100%; display: inline-block;">
        <a style="margin-top:1%;text-decoration: none;" onclick="adminState()" class="btn btn-outline-success">Hotel State</a>
        <div id="adminHState">	
		</div>
    </div>
        </div>

</body>
</html>