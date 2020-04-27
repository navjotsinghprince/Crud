<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Edit Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>

    <?php
      if(isset($_POST['showbtn'])){
        include 'config.php';

        $stu_id = $_POST['sid'];
        
     //Select particular student id data
    $sql = "SELECT * FROM student WHERE sid = {$stu_id}";
     
      //Prepare Statement
      $result = mysqli_prepare($conn, $sql);

      //Bind Result and Set Into Variables
      mysqli_stmt_bind_result($result,$id,$name,$address,$class,$phone);

      //Execute Statement
      mysqli_stmt_execute($result);

      //Store Result
      mysqli_stmt_store_result($result);

      //check number of rows
      if(mysqli_stmt_num_rows($result) > 0)  {
         while($row = mysqli_stmt_fetch($result)){
    ?>
    <form class="post-form" action="updatedata.php" method="post">
        <div class="form-group">
            <label for="">Name</label>
            <input type="hidden" name="sid"  value="<?php echo $id; ?>" />
            <input type="text" name="sname" value="<?php echo $name; ?>" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" value="<?php echo $address; ?>" />
        </div>
        <div class="form-group">
        <label>Class</label>
        <?php
         //Select classes from student class table
       $sql1 = "SELECT cid,cname FROM studentclass";

      //Prepare Statement
      $result1 = mysqli_prepare($conn, $sql1);

      //Bind Result and Set Into Variables
      mysqli_stmt_bind_result($result1,$cid,$cname);

      //Execute Statement
      mysqli_stmt_execute($result1);

      //Store Result
      mysqli_stmt_store_result($result1);

      //check number of rows
      if(mysqli_stmt_num_rows($result1) > 0)  {
           echo '<select name="sclass">';
         while($row1 = mysqli_stmt_fetch($result1)){
            if($class==$cid) {
              $select = "selected";
              }else{
              $select = "";
              }
              echo "<option {$select} value='{$cid}'>{$cname}</option>";
            }
             echo "</select>";
         }
            ?>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" value="<?php echo $phone; ?>" />
        </div>
    <input class="submit" type="submit" value="Update"  />
    </form>
    <?php
  }
}
}

    ?>
</div>
</div>
</body>
</html>
