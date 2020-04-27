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
                include 'config.php';
          $sql = "SELECT * FROM studentclass";
          $result =$conn->prepare($sql);  //prepare statement
          $result->bind_result($cid,$cname); //bind result set in variables
          $result->execute(); //execute statement
          $result->store_result();  //store result
          if($result->num_rows> 0)  {
          while($result->fetch()){
                ?>
                <option value="<?php echo $cid; ?>"><?php echo $cname; ?></option>

              <?php } 
              //close prepared statements
              $result->close();

          }?>
            </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" />
        </div>
        <input class="submit" type="submit" value="Save"  />
      </form>
    </div>
 </div>
</body>
</html>
