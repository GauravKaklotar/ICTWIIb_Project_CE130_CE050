<?php
include("connection.php");
session_start();
error_reporting(0);

$user=$_SESSION['username'];
if($user)
{

}
else
{
    header('location:index.php');
}

$sql="DELETE FROM `student` WHERE username='$user'";
$result=mysqli_query($conn,$sql);
if($result)
{
     echo "your record has been deleted";
     session_unset();
    ?>
    <meta http-equiv="Refresh" content="3; URL=index.php">
    <?php
}
else{
    echo "<font  color='red'>failed to record delete from  database";
}

?>