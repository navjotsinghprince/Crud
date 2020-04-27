<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
      include 'config.php';

      $sql = "SELECT sid,sname,saddress,cname,sphone FROM student JOIN studentclass WHERE student.sclass = studentclass.cid";
      $result =$conn->prepare($sql);  //prepare statement
      $result->bind_result($id,$name,$address,$class,$phone); //bind result set in variables
      $result->execute(); //execute statement
      $result->store_result();  //store result

      if($result->num_rows> 0)  {
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
            while($result->fetch()){
          ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $address; ?></td>
                <td><?php echo $class; ?></td>
                <td><?php echo $phone; ?></td>
                <td>
                    <a href='edit.php?id=<?php echo $id; ?>'>Edit</a>
                    <a href='delete-inline.php?id=<?php echo $id; ?>'>Delete</a>
                </td>
            </tr>
          <?php } ?>
        </tbody>
    </table>
  <?php }else{
    echo "<h2>No Record Found</h2>";
  }
  mysqli_close($conn);
  ?>
</div>
</div>
</body>
</html>
