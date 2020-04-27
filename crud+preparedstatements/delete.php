<?php include 'header.php';

if(isset($_POST['deletebtn'])){

include "config.php";

    $sql ="DELETE FROM student WHERE sid = ?";

      //Prepare Statement
      $result = mysqli_prepare($conn, $sql);

      //Bind Result and Set Into Variables
      mysqli_stmt_bind_param($result,'i',$stu_id);

       //get student where is in URL 
       $stu_id = $_POST['sid'];

      //Execute Statement
      mysqli_stmt_execute($result);

//Close Prepared Statement 
mysqli_stmt_close($result);

header("Location: http://localhost/crud+preparedstatements/index.php");
mysqli_close($conn);

}
?>
<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>
</div>
</div>
</body>
</html>
