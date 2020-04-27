<?php
include 'config.php';
//Using Anonymous Positional Placeholder
$sql = "UPDATE student SET sname = ?, saddress = ?,sclass = ?, sphone = ? WHERE sid = ?";

//prepare statement
$result=$conn->prepare($sql);

//Bind parameter to prepared statement
$result->bindparam(1,$stu_name,PDO::PARAM_STR);
$result->bindparam(2,$stu_address,PDO::PARAM_STR);
$result->bindparam(3,$stu_class,PDO::PARAM_STR);
$result->bindparam(4,$stu_phone,PDO::PARAM_INT);
$result->bindparam(5,$stu_id,PDO::PARAM_INT);

//variables and values
$stu_name = $_POST['sname'];
$stu_address = $_POST['saddress'];
$stu_class = $_POST['sclass'];
$stu_phone = $_POST['sphone'];
$stu_id = $_POST['sid'];

//Execute Prepared Statements
 $result->execute();

header("Location: http://localhost/crud+preparedstatements+pdo/index.php");

$conn=null;
?>
