<!DOCTYPE html>
<html>
<head><title>WaterCan supply</title></head>
<body style="background-image:url(imagese.jpg);background-repeat:no-repeat;background-size:100% 100%;background-attachment:fixed">
    <header>
<h1><center><i><b>DAVANGERE WATERCAN SUPPLY</b></i></center></h1>
<h2><center><i><b>CUSTOMER CARD INFORMATION</b></i></center></h3>
</header>
<?php
if(isset($_POST['num'])){
$num = $_POST['num'];
}
$connection = mysqli_connect("localhost","root","") or die("coudnt connect to the server");
$db = mysqli_select_db($connection,"watersupply") or die("coudnt select the database");
$checkPhone=" SELECT Phone FROM memship WHERE Phone='$num'";
$query=mysqli_query($connection,$checkPhone);
if(mysqli_num_rows($query)==1)
 {
    $query="SELECT * FROM memship where Phone='$num'";

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
 }
 else{
    echo "<center>";
    echo "<h1><i><b>Number Does'nt Exist<h1></b></i>";
      echo "</center>"; 
 }

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