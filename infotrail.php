<html>
<head>
<title>insert and dispaly orders</title>
</head>
<body <body style="background-image:url(imagesk.jpg);background-repeat:no-repeat;background-size:100% 150%;background-attachment:fixed">
<h1 bgcolor="#ffffff"><center><i><b>Watercans Orders</b></i></center></h1>
<?php
$connection = mysqli_connect("localhost","root","") or die("coudnt connect to the server");
$db = mysqli_select_db($connection,"watersupply") or die("coudnt select the database");
if(isset($_POST['name'])){
$name = $_POST['name'];
}
if(isset($_POST['PhoneNo'])){
$PhoneNo = $_POST['PhoneNo'];
}
if(isset($_POST['address'])){
$address = $_POST['address'];
}
if(isset($_POST['landmark'])){
$landmark = $_POST['landmark'];
}
if(isset($_POST['doorno'])){
$doorno = $_POST['doorno'];
}
if(isset($_POST['noc'])){
$noc = $_POST['noc'];
}
$query1= "INSERT INTO takeorder(name,Phoneno,address,landmark,doorno,noc)VALUES('$name','$PhoneNo','$address','$landmark','$doorno','$noc')";
$result = mysqli_query($connection,$query1) or die("Querry failed:".mysqli_error($connection));
mysqli_close($connection);
?>
<?php
$connection = mysqli_connect("localhost","root","") or die("coudnt connect to the server");
$db = mysqli_select_db($connection,"watersupply") or die("coudnt select the database");
$query="SELECT * FROM takeorder";

$result = mysqli_query($connection,$query) or die("Querry failed:".mysqli_error($connection));

echo "<table border='1' align='center' frame='box'>";
echo "<tr>";
echo "<th>OrderNo</th><th>Name</th><th>PhoneNo</th><th>Adrdess</th><th>Landmark</th><th>DoorNo</th><th>NOofCans</th>";
echo "</tr>";

while($row=mysqli_fetch_array($result))
{
    echo "<tr>";
    echo  "<td>",$row['ordno'],"</td><td>",$row['name'],"</td><td>",$row['PhoneNo'],"</td><td>",$row['address'],"</td><td>",$row['landmark'],"</td><td>",$row['doorno'],"</td><td>",$row['noc'],"</td>"; 
    echo "</tr>";
}
echo "</table>";

mysqli_close($connection);

?>


</body>
</html>
    