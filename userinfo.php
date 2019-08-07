<?php
include_once('db.php');
if(isset($_POST['name'])){
$name = $_POST['name'];
}
if(isset($_POST['age'])){
$age = $_POST['age'];
}
$query= "INSERT INTO user VALUES('$name','$age')";
if(mysqli_query($connection,$query))
echo "sucessfull insertion";
else
echo "no insertion";
?>