<?php
include 'config.php';

$sql = "DELETE FROM student WHERE sid = ?";

//prepared Statement
$result=$conn->prepare($sql);

//Bind Parameter
$result->bindParam(1,$stu_id);

$stu_id = $_GET['id'];

$result->execute();
header("Location: http://localhost/crud+preparedstatements+pdo/index.php");

$conn=null;

?>
