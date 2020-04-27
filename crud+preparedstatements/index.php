<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
      include 'config.php';
      //Select All Data
      $sql = "SELECT sid,sname,saddress,cname,sphone FROM student JOIN studentclass WHERE student.sclass = studentclass.cid";

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
    ?>
    <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Class</th>
        <th>Phone</th>
        <th>Action</th>
        </thead>
        <tbody>
          <?php
            while($row = mysqli_stmt_fetch($result)){
          ?>
            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $name ?></td>
                <td><?php echo $address ?></td>
                <td><?php echo $class ?></td>
                <td><?php echo $phone ?></td>
                <td>
                    <a href='edit.php?id=<?php echo $id; ?>'>Edit</a>
                    <a href='delete-inline.php?id=<?php echo $id; ?>'>Delete</a>
                </td>
            </tr>
          <?php } ?>
        </tbody>
    </table>
  <?php
    mysqli_stmt_close($result);
  }else{
    echo "<h2>No Record Found</h2>";
  }
  mysqli_close($conn);
  ?>
</div>
</div>
</body>
</html>
