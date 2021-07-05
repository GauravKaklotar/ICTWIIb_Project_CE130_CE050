<?php
include("connection.php");
error_reporting(0);
session_start();
$user=$_SESSION['username'];
if($user)
{

}
else
{
    header('location:index.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upadate detail form</title>
    <style>
        body{
            text-align: center;
            padding: 150px;
            background-color: #0005;
        }
        table{
            text-align: center;
            margin: auto;
            background-color: aqua;
          
        }
        p{
            font-size: 30px;
        }
        
    </style>
</head>
<body >
    <p>Update students details form</p>
  
    <table>
    <form action="" method="post" enctype="multipart/form-data">
        <tr>
            <td>name</td>
            <td><input type="text" name="name" value="" id="" require></td>
        </tr>

<tr>
    <td>gender</td>
    <td><input type="radio" name="gender" id="" value="male">male<input type="radio" name="gender" id="" value="female">female</td>
</tr>
<tr>
    <td>dob</td>
    <td><input type="date" name="dob"  id="" require></td>
    
</tr>
<tr>
    <td>email</td>
    <td><input type="email" name="email" value="" id="" require></td>
</tr>

<tr>
    <td>address</td>
    <td><input type="text" name="address" value="" id="" require></td>
</tr>
<tr>
    <td>phone</td>
    <td><input type="text" name="phone" value="" id="" require></td>
</tr>
<tr>
    <td>photo</td>
    <td><input type="file" name="image"  id="" require></td>
</tr>


<tr >
    <td ><input type="submit" value="update details" name="submit"></td>
</tr>

</form>
    </table>
   
</body>
</html>

<?php
 include("connection.php");
 error_reporting(0);
if(isset($_POST["submit"])) //when we click on submit than this condition is true
{
if(isset($_POST['name'])&isset($_POST['gender'])&isset($_POST['dob'])&isset($_POST['email'])&isset($_POST['address'])&isset($_POST['phone']))
{
        if(!empty($_POST['name'])&!empty($_POST['gender'])&!empty($_POST['dob'])&!empty($_POST['email'])&!empty($_POST['address'])&!empty($_POST['phone']))
          {
           $name1=$_POST["name"];
           $gender1=$_POST["gender"];
           $dob1=$_POST["dob"];
           $email1=$_POST["email"];
           $address1=$_POST["address"];
           $phone1=$_POST["phone"];
          
           if(isset($_FILES["image"]))
                    {
                        echo "<pre>";
                        // print_r($_FILES);
                        echo "</pre>";
                    $filename=$_FILES["image"]["name"];    
                    $size=$_FILES["image"]["size"];    
                    $type=$_FILES["image"]["type"];        
                    $tmp=$_FILES["image"]["tmp_name"]; 
                    $filepath1="upload-images/".$filename; 
                  
                    
                   
                 
           
                // $sql="INSERT INTO student(rollno,firstname,lastname,email,password,confirmpassword)  VALUES ($rn,$fn,$ln,$em,$pwd,$cpwd)";
                       $sql="update `student` set filepath='$filepath1',name='$name1',gender='$gender1',dob='$dob1',email='$email1',address='$address1',phone='$phone1' where username='$user'";
                       if($size<512000)
                       {
                       $result=mysqli_query($conn,$sql);
                       
                    
                    
                             if($result)
                             {
                                move_uploaded_file($tmp,"upload-images/".$filename);
                                 echo "your record has been succesfully updated";
                                 ?>
                                 <meta http-equiv="Refresh" content="3; URL=vote.php">
                                 <?php
                             }
                            else
                            {
                                   echo " failed to data was not updated into the table";
                            }
                        }
                        else{
                            die("maximum size is 500kb");
                        }
                    
                    
                        }
                  }
//
                

//
      else{
        die("some fields are empty");
      }
 }     
//
else
{
    die("something went wrong");
}
}


?>