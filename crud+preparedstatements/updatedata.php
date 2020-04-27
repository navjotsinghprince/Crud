<?php

include 'config.php';

//Insert Sql Statement
$sql = "UPDATE student SET sname = ?, saddress = ?,sclass = ?, sphone = ? WHERE sid = ?";

//Prepare Statement
$result=mysqli_prepare($conn,$sql);

if($result){
//Bind variable to Prepare statement as Parameters
mysqli_stmt_bind_param($result,'sssii',$stu_name,$stu_address,$stu_class,$stu_phone,$stu_id);
$stu_id = $_POST['sid'];
$stu_name = $_POST['sname'];
$stu_address = $_POST['saddress'];
$stu_class = $_POST['sclass'];
$stu_phone = $_POST['sphone'];

//Execute Prepared Statement
mysqli_stmt_execute($result);
}

//Close Prepared Statement 
mysqli_stmt_close($result);
mysqli_close($conn);

header("Location: http://localhost/crud+preparedstatements/index.php");
?>









