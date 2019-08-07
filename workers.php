<html>
<head>
<title>Workers Details </title>
</head>
<body style="background-image:url(workera.jpg);background-repeat:no-repeat;background-size:100% 100%;background-attachment:fixed">
<h1><center><i><b>WORKERS DETAILS</b></i></center></h1>
<br>
<br>
<br>
<br>
<?php
$connection = mysqli_connect("localhost","root","") or die("coudnt connect to the server");
$db = mysqli_select_db($connection,"watersupply") or die("coudnt select the database");
$query="SELECT * FROM workers";

$result = mysqli_query($connection,$query) or die("Querry failed:".mysqli_error($connection));

echo "<table border='1' align='center' frame='box' bgcolor='#ffff00'>";
echo "<tr>";
echo "<th>Worker's id</th><th>Worker's Name</th><th>Worker's AADHARNo</th><th>Worker's PhoneNo</th><th>Worker's type</th>";
echo "</tr>";

while($row=mysqli_fetch_array($result))
{
    echo "<tr>";
    echo  "<td>",$row['workerid'],"</td><td>",$row['workername'],"</td><td>",$row['workeradhno'],"</td><td>",$row['workerph'],"</td><td>",$row['workertyp'],"</td>"; 
    echo "</tr>";
}
echo "</table>";
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