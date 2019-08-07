<!DOCTYPE html>
<html>
<head><title>process order</title></head>
<body style="background-image:url(imagesd.jpg);background-repeat:no-repeat;background-size:100% 125%;background-attachment:fixed">
<header>
<h1><center><i><b>DAVANGERE WATERCAN SUPPLY</b></i></center></h1>
<h2><center><i><b>DELIVERY COPY</b></i></center></h2>
</header>
<?php
if(isset($_POST['id'])){
$id = $_POST['id'];
}
if(isset($_POST['noo'])){
$noo = $_POST['noo'];
}
$orders=array();
if(isset($_POST['order'])){
$order=$_POST['order'];
}
if(isset($_POST['ord'])){
$ord=$_POST['ord'];
}
$connection = mysqli_connect("localhost","root","") or die("coudnt connect to the server");
$db = mysqli_select_db($connection,"watersupply") or die("coudnt select the database");
for($i=0;$i<$noo;$i++)
{
 $query="UPDATE profrdel SET workerid=$id WHERE ordno='$order[$i]'";
 $result = mysqli_query($connection,$query) or die("Querry failed:".mysqli_error($connection));
}
$query3="SELECT ordno,name,PhoneNo,address,landmark,noc,amt,date FROM profrdel WHERE workerid=$id";
$result = mysqli_query($connection,$query3) or die("Querry failed:".mysqli_error($connection));
echo "<table border='1' align='center' frame='box' bgcolor='#00bfff'>";
echo "<tr>";
echo "<th>Order No</th><th>Name</th><th>Phone No</th><th>Adrdess</th><th>Landmark</th><th>No of Cans</th><th>Amount</th><th>Date</th>";
echo "</tr>";
while($row=mysqli_fetch_array($result))
{
    echo "<tr>";
    echo  "<td>",$row['ordno'],"</td><td>",$row['name'],"</td><td>",$row['PhoneNo'],"</td><td>",$row['address'],"</td><td>",$row['landmark'],"</td><td>",$row['noc'],"</td><td>",$row['amt'],"</td><td>",$row['date'],"</td>"; 
    echo "</tr>";
}
echo "</table>";
mysqli_close($connection);
echo "<center><h1><i><b>PLEASE TAKE OUT THE PRINT OUT FOR FURTHER REFERENCES</h1></i></b></center>";
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