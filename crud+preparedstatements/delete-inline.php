<?php
    include 'config.php';
 
     //Select particular student id data
    $sql ="DELETE FROM student WHERE sid = ?";

      //Prepare Statement
      $result = mysqli_prepare($conn, $sql);

      //Bind Result and Set Into Variables
      mysqli_stmt_bind_param($result,'i',$stu_id);


       //get student where is in URL 
       $stu_id = $_GET['id'];

      //Execute Statement
      mysqli_stmt_execute($result);

//Close Prepared Statement 
mysqli_stmt_close($result);

header("Location: http://localhost/crud+preparedstatements/index.php");

mysqli_close($conn);

?>
