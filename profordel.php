<!DOCTYPE html>
<html>
<head><title>WaterCan supply</title>
<script type="text/javascript">
    function fun(){
    var a=document.forms["mydel"]["noo"].value;
     if(a==""){
    alert("Please Enter the Number of Orders");
    return false;
    } 
    }
    </script>
</head>
<body style="background-image:url(imagesd.jpg);background-repeat:no-repeat;background-size:100% 125%;background-attachment:fixed">
<header>
<h1><center><i><b>DAVANGERE WATERCAN SUPPLY</b></i></center></h1>
<h2><center><i><b>PROCESSING FOR DELIVERY</b></i></center></h2>
</header>
<br>
<br>
<?php
$connection = mysqli_connect("localhost","root","") or die("coudnt connect to the server");
$db = mysqli_select_db($connection,"watersupply") or die("coudnt select the database");

$query="SELECT * FROM profrdel";

$result = mysqli_query($connection,$query) or die("Querry failed:".mysqli_error($connection));

echo "<table border='1' align='center' frame='box' bgcolor='#00bfff'>";

echo "<tr>";
echo "<th>Order No</th><th>Name</th><th>Phone No</th><th>Adrdess</th><th>Landmark</th><th>No of Cans</th><th>Amount</th>";
echo "</tr>";

while($row=mysqli_fetch_array($result))
{
    echo "<tr>";
    echo  "<td>",$row['ordno'],"</td><td>",$row['name'],"</td><td>",$row['PhoneNo'],"</td><td>",$row['address'],"</td><td>",$row['landmark'],"</td><td>",$row['noc'],"</td><td>",$row['amt'],"</td>"; 
    echo "</tr>";
}

echo "</table>";

mysqli_close($connection);
?>
<center>
<form id="mydel" action="profordelb.php" method="post">
<table>
<tr>
<td>
<b><i>Enter No of Orders:</i></b>
</td>
<td>
<input type="text" placeholder="No Of Orders" name="noo">
</td>
</tr><br>
</center>
</table>
<center>
<br>
<br>
<button id="subd" onclick="return fun()"><b>PROCESS FOR DELIVERY</b></button>
<br>
<br>
</form>
</center>
 <br><br>
<center>
<form  action="home.html" >
<button style="color:blue;border-radius:100px;"><b>HOME</b></button>
</form>
</center>
</body>
</html>