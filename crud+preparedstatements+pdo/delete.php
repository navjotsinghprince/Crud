<?php include 'header.php';

if(isset($_POST['deletebtn'])){

include "config.php";


$sql = "DELETE FROM student WHERE sid = ?";

//prepared Statement
$result=$conn->prepare($sql);

//Bind Parameter
$result->bindParam(1,$stu_id);

$stu_id = $_POST['sid'];

$result->execute();
header("Location: http://localhost/crud+preparedstatements+pdo/index.php");

$conn=null;
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
