<?php
$connection = mysqli_connect("localhost","root","") or die("coudnt connect to the server");
$db = mysqli_select_db($connection,"water") or die("coudnt select the database");

$query="INSERT INTO takeorder VALUES('107','Lalith','9489832655','SHIMOGA','LK Arch')";

$result = mysqli_query($connection,$query) or die("Querry failed:".mysqli_error($connection));

mysqli_close($connection);

echo"values inserted";
echo"  ";
echo"Great work!!!";
?>