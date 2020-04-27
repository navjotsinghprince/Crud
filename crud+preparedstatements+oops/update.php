<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Update Record</h2>
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

        $sql = "SELECT * FROM student WHERE sid = {$stu_id}";
        $result =$conn->prepare($sql);  //prepare statement
        $result->bind_result($id,$name,$address,$class,$phone); //bind result set in variables
        $result->execute(); //execute statement
         $result->store_result();  //store result
        if($result->num_rows> 0)  {
          while($result->fetch()){
    ?>
    <form class="post-form" action="updatedata.php" method="post">
        <div class="form-group">
            <label for="">Name</label>
            <input type="hidden" name="sid"  value="<?php echo $id; ?>" />
            <input type="text" name="sname" value="<?php echo $name; ?>" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" value="<?php echo $address;?>" />
        </div>
        <div class="form-group">
        <label>Class</label>
        <?php

          $sql1 = "SELECT * FROM studentclass";
          $result1 =$conn->prepare($sql1);  //prepare statement
          $result1->bind_result($cid,$cname); //bind result set in variables
          $result1->execute(); //execute statement
          $result1->store_result();  //store result
          if($result1->num_rows> 0)  {
             echo '<select name="sclass">';
          while($result1->fetch()){
             if($class == $cid){
                $select = "selected";
              }else{
                $select = "";
              }
              echo  "<option {$select} value='{$cid}'>{$cname}</option>";
                ?>

              <?php 
            } 
            echo "</select>";
            
          }?>
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
        //close prepared statements
              $result->close();
}

    ?>
</div>
</div>
</body>
</html>
