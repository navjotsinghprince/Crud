<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="savedata.php" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="sname" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" />
        </div>
        <div class="form-group">
            <label>Class</label>
            <select name="class">
<option value="" selected disabled>Select Class</option>
       <?php 
       $conn = mysqli_connect('localhost','root','','crud') or die("Connection Failed");
      // //Select All Data
      $sql = "SELECT cid,cname FROM studentclass";

      // //Prepare Statement
       $result = mysqli_prepare($conn, $sql);

      // //Bind Result and Set Into Variables
       mysqli_stmt_bind_result($result,$id,$name);

      // //Execute Statement
       mysqli_stmt_execute($result);

      // //Store Result
       mysqli_stmt_store_result($result);

      // //check number of rows
       if(mysqli_stmt_num_rows($result) > 0)  {

             while(mysqli_stmt_fetch($result)){
                ?>
                <option value="<?php echo $id; ?>"><?php echo $name; ?></option>

              <?php } }?>

              </select>
              <?php

                mysqli_stmt_close($result);
                mysqli_close($conn);
               ?>

        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" />
        </div>
        <input class="submit" type="submit" value="Save" />
      </form>
    </div>
 </div>
</body>
</html>
