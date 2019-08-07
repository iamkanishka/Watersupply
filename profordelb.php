<!DOCTYPE html>
<html>
<head><title>process order</title>
<script type="text/javascript">
    function fun(){
    var a=document.forms["mydelb"]["noo"].value;
    var b=document.forms["mydelb"]["order[]"].value;
    var c=document.forms["mydelb"]["id"].value;
     if(a==""||b==""||c==""){
    alert("Please Enter all the Coresponding Values");
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
<?php
$connection = mysqli_connect("localhost","root","") or die("coudnt connect to the server");
$db = mysqli_select_db($connection,"watersupply") or die("coudnt select the database");

$query="SELECT workerid,workername FROM workers WHERE workerid>2";

$result = mysqli_query($connection,$query) or die("Querry failed:".mysqli_error($connection));

echo "<table border='1' align='center' frame='box' bgcolor='#00bfff'>";

echo "<tr>";
echo "<th>Delivery Man's id</th><th>Delivery Man's Name</th>";
echo "</tr>";

while($row=mysqli_fetch_array($result))
{
    echo "<tr>";
    echo  "<td>",$row['workerid'],"</td><td>",$row['workername'],"</td>"; 
    echo "</tr>";
}

echo "</table>";

mysqli_close($connection);
?>
<?php
echo "<br>";
echo "<br>";
$connection = mysqli_connect("localhost","root","") or die("coudnt connect to the server");
$db = mysqli_select_db($connection,"watersupply") or die("coudnt select the database");
if(isset($_POST['noo'])){
$noo = $_POST['noo'];
}
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
echo "<h3><center><i><b>Enter the Order Numbers</b></i></center></h3>";
echo "</table>";
echo "<br>";
echo "<br>";
echo "<center>";
echo "<form id='mydelb' action='delasdone.php' method='post'>";
for($i=0;$i<$noo;$i++)
{
echo "<i><b>Order No</b></i> :<input type='text' name='order[]' class='class_name' size=5 /><br/>";
}
echo "<center>";
echo "<table>";
echo "<tr>";
echo "<td>";
echo "<b><i>Enter Worker's id :</i></b>";
echo "</td>";
echo "<td>";
echo "<input type='text' placeholder='Worker's id' name='id'>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "<b><i>Enter No of Orders:</i></b>";
echo "</td>";
echo "<td>";
echo "<input type='text' placeholder='No Of Orders' name='noo'>";
echo "</td>";
echo "</tr>";
echo "</center>";
echo "</table>";
echo "<center>";
echo "<br>";
echo "<br>";
echo "<button id='subd'><b>ADD FOR DELIVERY</b></button>";
echo "<br>";
echo "<br>";
echo "</center>";
echo "</form>";
mysqli_close($connection);
?>
</body>
</html>