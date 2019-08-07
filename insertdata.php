<?php

if( isset( $_POST['submit_form'] ) )
{

$Phoneno = $_POST['Phoneno'];

$connection = mysqli_connect("localhost","root","") or die("coudnt connect to the server");
mysqli_select_db($connection,"check")  or die("coudnt connect to the database");

$insertdata=" INSERT INTO checkme VALUES('$Phoneno') ";

mysqli_query($connection,$insertdata);
}
?>

