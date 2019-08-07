<!DOCTYPE html>
<html>
<head><title>WaterCan supply</title></head>
<body style="background-image:url(imagese.jpg);background-repeat:no-repeat;background-size:100% 100%;background-attachment:fixed">
    <header>
<h1><center><i><b>DAVANGERE WATERCAN SUPPLY</b></i></center></h1>
<h2><center><i><b>Customer Order Infomation</b></i></center></h2>
</header>
    <br>
    <br>
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
if(isset($_POST['amt'])){
$amt = $_POST['amt'];
}
$date=date('Y-m-d');
$query1="CALL insertd('$name','$PhoneNo','$address','$landmark','$doorno','$noc','$date')";
$result = mysqli_query($connection,$query1) or die("Querry failed:".mysqli_error($connection));
mysqli_close($connection);
?>
<?php
$connection = mysqli_connect("localhost","root","") or die("coudnt connect to the server");
$db = mysqli_select_db($connection,"watersupply") or die("coudnt select the database");
$w=0;
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
if(isset($_POST['amt'])){
$amt = $_POST['amt'];
}
if($noc>5 and $noc<=10){
$amt=$noc*40;
$dis=($amt*0.1);
$dism=$amt-$dis;
}
elseif($noc>=11 and $noc<=20){
$amt=$noc*40;
$dis=($amt*0.2);
$dism=$amt-$dis;
}
elseif($noc>=21 and $noc<=30){
$amt=$noc*40;
$dis=($amt*0.25);
$dism=$amt-$dis;
}
elseif($noc>=31 and $noc<=40){
$amt=$noc*40;
$dis=($amt*0.3);
$dism=$amt-$dis;
}
elseif($noc>=41 and $noc<=50){
$amt=$noc*40;
$dis=($amt*0.35);
$dism=$amt-$dis;
}
elseif($noc>=51){
$amt=$noc*40;
$dis=($amt*0.4);
$dism=$amt-$dis;
}
elseif($noc>=1 and $noc<=5){
$amt=$noc*40;
$dis=($amt*0.05);
$dism=$amt-$dis;
}
$query2= "INSERT INTO profrdel(workerid,name,Phoneno,address,landmark,doorno,noc,amt,date)VALUES('$w','$name','$PhoneNo','$address','$landmark','$doorno','$noc','$amt','$date')";
$result = mysqli_query($connection,$query2) or die("Querry failed:".mysqli_error($connection));
$checkPhone=" SELECT Phone FROM memship WHERE Phone='$PhoneNo'";
$query=mysqli_query($connection,$checkPhone);
if(mysqli_num_rows($query)==0)
 {
 $query3="INSERT INTO memship(name,Phone,amt)VALUES('$name','$PhoneNo','$dis')";
$result = mysqli_query($connection,$query3) or die("Querry failed:".mysqli_error($connection));
$query6="SELECT name FROM memship Phone='$PhoneNo'";
 echo "<center>";
 echo"<B>";
 echo "<center><h1><i><b>Name:</i></b></center>",$name;
 echo"</B>";
 echo "</center>";
 $price=mysqli_query($connection,"SELECT amt FROM memship WHERE Phone='$PhoneNo'");
$result=mysqli_fetch_array($price);
 echo "<center><h1><i><b>Created a new Membership card:</i></b></center>";
$price1=mysqli_query($connection,"SELECT Ototearned FROM salesstats WHERE ownerph='1'");
$result1=mysqli_fetch_array($price1);
$owneramt=$result1['Ototearned']+$dism;
$queryup1="UPDATE salesstats SET Ototearned=$owneramt WHERE ownerph='1'";
$result = mysqli_query($connection,$queryup1) or die("Querry failed:".mysqli_error($connection));
echo "<center>";
echo"<B>";
echo "<center><h1><i><b>Order Amount:</i></b></center>",$amt;
echo"</B>";
echo "</center>";
}
 if(mysqli_num_rows($query)==1)
 {
 $price=mysqli_query($connection,"SELECT amt FROM memship WHERE Phone='$PhoneNo'");
$result=mysqli_fetch_array($price);
$rdis=$result['amt']+$dis;
  $query4="UPDATE memship SET amt=$rdis WHERE Phone='$PhoneNo'";
  $result = mysqli_query($connection,$query4) or die("Querry failed:".mysqli_error($connection));
  $price=mysqli_query($connection,"SELECT Ototearned FROM salesstats WHERE ownerph='1'");
$result=mysqli_fetch_array($price);
$owneramt=$result['Ototearned']+$dism;
$queryup1="UPDATE salesstats SET Ototearned=$owneramt WHERE ownerph='1'";
  $result = mysqli_query($connection,$queryup1) or die("Querry failed:".mysqli_error($connection));
 $query6="SELECT name FROM memship Phone='$PhoneNo'";
 echo "<center>";
 echo"<B>";
 echo "<center><h1><i><b>Name:</i></b></center>",$name;
 echo"</B>";
 echo "</center>";
 echo "<center>";
echo"<B>";
echo "<center><h1><i><b>Order Amount:</i></b></center>",$amt;
echo"</B>";
echo "</center>";
$price=mysqli_query($connection,"SELECT amt FROM memship WHERE Phone='$PhoneNo'");
$result=mysqli_fetch_array($price);
echo "<center>";
echo"<B>";
echo "<center><h1><i><b>Card Amount:</i></b></center>",$result['amt'];
echo"</B>";
 echo "<center>";
 if($result['amt']>=$amt)
{
 echo "<center><h1><i><b>Order Amount</i></b></center>:",$amt;
 $mamt=$result['amt']-$amt;
 echo "<center><h1><i><b>Remaining amount in card</i></b></center>",$mamt;
  $query8="UPDATE memship SET amt=$mamt WHERE Phone='$PhoneNo'";
  $result = mysqli_query($connection,$query8) or die("Querry failed:".mysqli_error($connection));
  $query9="UPDATE profrdel SET amt='Paid' WHERE PhoneNo='$PhoneNo'";
  $result = mysqli_query($connection,$query9) or die("Querry failed:".mysqli_error($connection));
  echo "<h1><i><b>We Really Support Cashless Transaction</h1></i></b><br>";
echo "<h2><b>PLEASE DO INFORNM THE CUSTOMERS THAT MONEY HAS BEEN DEDUCTED FROM THIER CARD AND PAID THEIR ORDER</h1></b>";
}
 }
mysqli_close($connection);
?>
<br>
<br>
<center>    
<form action="home.html" method="post">
<button style="color:blue;border-radius:100px;"><b>HOME</b></button>
</form><br><br>
</center>
</body>p
</html>