<!DOCTYPE html>
<html>
<head><title>WaterCan supply</title></head>
<body style="background-image:url(imagese.jpg);background-repeat:no-repeat;background-size:100% 100%;background-attachment:fixed">
    <header>
<h1><center><i><b>DAVANGERE WATERCAN SUPPLY</b></i></center></h1>
<h2><center><i><b>SALES DESCRIPTION</b></i></center></h3>
</header>
<?php
date_default_timezone_set('Asia/kolkata');
$date =date("H:i:sa");
$connection = mysqli_connect("localhost","root","") or die("coudnt connect to the server");
$db = mysqli_select_db($connection,"watersupply") or die("coudnt select the database");
$price=mysqli_query($connection,"SELECT Ototearned FROM salesstats WHERE ownerph='1'");
$result=mysqli_fetch_array($price);
echo "<center>";
echo "<h3>";
echo "<center><h1><i><b>Amount:</i></b></center>",$result['Ototearned'];
echo "</h3>";
echo "</center>";



mysqli_close($connection);
?>
    <br><br>
<center>
<form  action="home.html" >
<button style="color:blue;border-radius:100px;"><b>HOME</b></button>
</form>
</center>
</body>
</html>