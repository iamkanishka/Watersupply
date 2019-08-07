<!DOCTYPE html>
<html>
<head><title>Order list</title></head>
<body style="background-image:url(imagesd.jpg);background-repeat:no-repeat;background-size:100% 125%;background-attachment:fixed">
<header>
<h1><center><i><b>DAVANGERE WATERCAN SUPPLY</b></i></center></h1>
<h2><center><i><b>ORDER LIST</b></i></center></h2>
</header>
<?php
$connection = mysqli_connect("localhost","root","") or die("coudnt connect to the server");
$db = mysqli_select_db($connection,"watersupply") or die("coudnt select the database");

$query="SELECT * FROM takeorder";

$result = mysqli_query($connection,$query) or die("Querry failed:".mysqli_error($connection));

echo "<table border='1' align='center' frame='box' bgcolor='#00bfff'>";

echo "<tr>";
echo "<th>OrderNO</th><th>Name</th><th>PhoneNO</th><th>Adrdess</th><th>Landmark</th><th>No of Cans</th><th>Date</th>";
echo "</tr>";

while($row=mysqli_fetch_array($result))
{
    echo "<tr>";
    echo  "<td>",$row['ordno'],"</td><td>",$row['name'],"</td><td>",$row['PhoneNo'],"</td><td>",$row['address'],"</td><td>",$row['landmark'],"</td><td>",$row['noc'],"</td><td>",$row['date'],"</td>"; 
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