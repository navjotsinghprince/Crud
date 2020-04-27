<?php

$conn = mysqli_connect("localhost","root","","crud") or die("Connection Failed");

//Insert Sql Statement
$sql = "INSERT INTO student (sname,saddress,sclass,sphone) VALUES (?,?,?,?)";

//Prepare Statement
$result=mysqli_prepare($conn,$sql);

if($result){
//Bind variable to Prepare statement as Parameters
mysqli_stmt_bind_param($result,'sssi',$stu_name,$stu_address,$stu_class,$stu_phone);

$stu_name = $_POST['sname'];
$stu_address = $_POST['saddress'];
$stu_class = $_POST['class'];
$stu_phone = $_POST['sphone'];

//Execute Prepared Statement
mysqli_stmt_execute($result);
}

//Close Prepared Statement 
mysqli_stmt_close($result);
mysqli_close($conn);

header("Location: http://localhost/crud+preparedstatements/index.php");
?>
