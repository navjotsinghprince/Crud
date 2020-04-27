<?php include 'header.php';

if(isset($_POST['deletebtn'])){

include "config.php";
$sql = "DELETE FROM student WHERE sid = ?";

$result = $result=$conn->prepare($sql); //Prepared Statements
if($result){
$result->bind_param('i',$stu_id);

//variables and values
$stu_id = $_POST['sid'];

$result->execute(); //execute prepared statements

$result->close();  //close prepared statements
}

header("Location: http://localhost/crud+preparedstatements+oops/index.php");

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
