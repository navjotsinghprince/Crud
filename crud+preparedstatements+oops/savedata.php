<?php
include 'config.php';

$sql = "INSERT INTO student(sname,saddress,sclass,sphone) VALUES (?,?,?,?)";
$result=$conn->prepare($sql);//Prepared Statements
if($result){
$result->bind_param('sssi',$stu_name,$stu_address,$stu_class,$stu_phone);

//variables and values
 $stu_name = $_POST['sname'];
 $stu_address = $_POST['saddress'];
 $stu_class = $_POST['class'];
 $stu_phone = $_POST['sphone'];

 $result->execute(); //execute prepared statements

 //echo $result->affected_rows(); //get number of inserted
 $result->close();  //close prepared statements
}

header("Location: http://localhost/crud+preparedstatements+oops/index.php");

mysqli_close($conn);

?>
