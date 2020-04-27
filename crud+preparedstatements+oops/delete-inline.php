<?php
include 'config.php';

$sql = "DELETE FROM student WHERE sid = ?";

$result = $result=$conn->prepare($sql); //Prepared Statements
if($result){
$result->bind_param('i',$stu_id);

//variables and values
$stu_id = $_GET['id'];

$result->execute(); //execute prepared statements

$result->close();  //close prepared statements
}

header("Location: http://localhost/crud+preparedstatements+oops/index.php");

mysqli_close($conn);

?>
