<?php include 'header.php'; ?>
   
<div id="main-content">
    <h2>Update Record</h2>
    <?php
    include 'config.php'; 
       $sql = "SELECT * FROM student WHERE sid = ?";
        
        //Prepared Statement
        $result=$conn->prepare($sql);

        //Bind Parameter
        $result->bindParam(1,$stu_id);

        $stu_id = $_GET['id'];

        //Execute Prepare Statement
      $result->execute();

      if($result->rowCount() > 0)  {

     while($row = $result->fetch(PDO::FETCH_ASSOC)){
    ?>
    <form class="post-form" action="updatedata.php" method="post">
        <div class="form-group">
            <label for="">Name</label>
            <input type="hidden" name="sid"  value="<?php echo $row['sid']; ?>" />
            <input type="text" name="sname" value="<?php echo $row['sname']; ?>" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" value="<?php echo $row['saddress']; ?>" />
        </div>
        <div class="form-group">
        <label>Class</label>
        <?php
          $sql1 = "SELECT * FROM studentclass";
          $result1 =$conn->prepare($sql1);
         $result1->execute();
      if($result1->rowCount() > 0)  {
        echo '<select name="sclass">';
      while($row1 = $result1->fetch(PDO::FETCH_ASSOC)){
              if($row['sclass'] == $row1['cid']){
                $select = "selected";
              }else{
                $select = "";
              }
              echo  "<option {$select} value='{$row1['cid']}'>{$row1['cname']}</option>";
            }
        echo "</select>";
      }
          ?>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" value="<?php echo $row['sphone']; ?>" />
        </div>
    <input class="submit" type="submit" value="Update"  />
    </form>
    <?php
  }
}

?>
</div>
</div>
</body>
</html>
