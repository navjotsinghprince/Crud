<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
      include 'config.php';

      $sql = "SELECT * FROM student JOIN studentclass WHERE student.sclass = studentclass.cid";
      //Prepare Statement
      $result=$conn->prepare($sql);

      //Execute Prepare Statement
      $result->execute();

      if($result->rowCount() > 0)  {
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
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
          ?>
            <tr>
                <td><?php echo $row['sid']; ?></td>
                <td><?php echo $row['sname']; ?></td>
                <td><?php echo $row['saddress']; ?></td>
                <td><?php echo $row['cname']; ?></td>
                <td><?php echo $row['sphone']; ?></td>
                <td>
                    <a href='edit.php?id=<?php echo $row['sid']; ?>'>Edit</a>
                    <a href='delete-inline.php?id=<?php echo $row['sid']; ?>'>Delete</a>
                </td>
            </tr>
          <?php }
          //Close Prepared Statement
          unset($result); ?>
        </tbody>
    </table>
  <?php }else{
    echo "<h2>No Record Found</h2>";
  }
  //close connection
  $conn=null;
  ?>
</div>
</div>
</body>
</html>
