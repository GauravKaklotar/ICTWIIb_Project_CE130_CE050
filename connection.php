
<?php
$servername="localhost";
$userername="root";
$password="";
$dbname="project";
$conn=mysqli_connect($servername,$userername,$password,$dbname);
if($conn)
{
    // echo "connection was successful";
}
else{
die("connection was not successful because of this eror----->".mysqli_connect_eror());
}




?>