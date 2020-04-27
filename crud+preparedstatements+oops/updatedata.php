<?php
include 'config.php';

$sql = "UPDATE student SET sname = ?, saddress = ?,sclass = ?, sphone = ? WHERE sid = ?";
$result=$conn->prepare($sql); //Prepared Statements
if($result){
$result->bind_param('sssii',$stu_name,$stu_address,$stu_class,$stu_phone,$stu_id);

//variables and values
$stu_name = $_POST['sname'];
$stu_address = $_POST['saddress'];
$stu_class = $_POST['sclass'];
$stu_phone = $_POST['sphone'];
$stu_id = $_POST['sid'];

$result->execute(); //execute prepared statements

//echo $result->affected_rows(); //get number of inserted
$result->close();  //close prepared statements
}

header("Location: http://localhost/crud+preparedstatements+oops/index.php");

mysqli_close($conn);

?>
