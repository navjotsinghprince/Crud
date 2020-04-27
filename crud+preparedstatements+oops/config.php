<?php
$host="localhost";
$username="root";
$password="";
$dbname="crud";

//create connection
$conn=new mysqli($host,$username,$password,$dbname);

//check connection
if($conn->connect_error){
die("connection failed");
}

?>
