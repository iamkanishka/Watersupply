<!DOCTYPE html>
<html>
<head><title>Order list</title></head>
<body style="background-image:url(imagesi.jpg);background-repeat:no-repeat;background-size:100% 125%;background-attachment:fixed">
<header>
<h1><center><i><b>DAVANGERE WATERCAN SUPPLY</b></i></center></h1>
<h2><center><i><b>MEMBERSHIP LIST</b></i></center></h2>
</header>
<?php
$connection = mysqli_connect("localhost","root","") or die("coudnt connect to the server");
$db = mysqli_select_db($connection,"watersupply") or die("coudnt select the database");

$query="SELECT * FROM memship";

$result = mysqli_query($connection,$query) or die("Querry failed:".mysqli_error($connection));

echo "<table border='1' align='center' frame='box' bgcolor='#00bfff'>";

echo "<tr>";
echo "<th>Card No</th><th>Customer Name</th><th>Phone No</th><th>Amount</th>";
echo "</tr>";

while($row=mysqli_fetch_array($result))
{
    echo "<tr>";
    echo  "<td>",$row['cardno'],"</td><td>",$row['name'],"</td><td>",$row['Phone'],"</td><td>",$row['amt'],"</td>";
    echo "</tr>";
}

echo "</table>";

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