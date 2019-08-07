!DOCTYPE html>
<html>
<head><title>WaterCan supply</title></head>
<body style="background-image:url(imagese.jpg);background-repeat:no-repeat;background-size:100% 100%;background-attachment:fixed">
    <header>
<h1><center><i><b>DAVANGERE WATERCAN SUPPLY</b></i></center></h1>
<h3><center><i><b>Pure Mineral Water</b></i></center></h3>
</header>
    <br>
    <br>
<?php
if(isset($_POST['id'])){
$id = $_POST['id'];
}
$connection = mysqli_connect("localhost","root","") or die("coudnt connect to the server");
$db = mysqli_select_db($connection,"watersupply") or die("coudnt select the database");
$query2="DELETE FROM profrdel WHERE workerid='$id'";
$result = mysqli_query($connection,$query2) or die("Querry failed:".mysqli_error($connection));
echo "<center>";
echo "<h1><i><b>DELIVERY UPDATED</h1></i></b><br>";
echo "<h2><b>DELETED FROM PROCESS FOR DELIVERY</h1></b>";
echo "</center>";
mysqli_close($connection);
?>
<br>
<br>
<center>    
<form action="home.html" method="post">
<button style="color:blue;border-radius:100px;"><b>HOME</b></button>
</form><br><br>
</center>
</body>
</html>