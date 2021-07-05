<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
    body{
        /* background-color:pink; */
        text-align:center;
    }
 table{
    background-color:lightblue;
    border:2px solid white;
     
 }
 tr{
    background-color:white;
 }
 #header{
     text-align:center;
     height:40px;
     width:100%;
      background-color:pink; 
      line-height:40px;

 }
 #submit{
    background-color:orange;
    width:100%;
    /* margin-left: 100px; */

    
 }
 #reset{
    background-color:orange;
    width:100%;
    
    
 }
 /* input{
     width:100%;
 }
 #gender{
     width:none;
 } */
 a{
     text-decoration:none;
     color:black;
 }
 #login{
    background-color:orange;
    border-radius:10px;

 }
 /* #res{
    border-radius:10px;
 }
 #sub{
    border-radius:10px;
 }
  */
  td{
      width:150px;
  }
  

    </style>
</head>
<body>
<h2 id="header">registration form</h2>
<p>This is registration form for online subject selection for DDU first year 2nd sem students </p>


<table border="3" cellspacing="30" align="center">
<form action=""  method="post" enctype="multipart/form-data">
<tr>
<td>*Required fields</td></tr>
<tr>
<td>*Name</td>
<td><input type="text" name="name" id="" placeholder="firstname middlename lastname" require></td>
</tr>
<tr>
<td>*DOB</td>
<td><input type="date" name="dob" id=""  require></td>
</tr>

<tr>
<td>*Email Id</td>
<td><input type="email" name="email" id="" placeholder="email" require></td>
</tr>
<tr>
<td>*Phone No</td>
<td>

<input type="text" name="phone" id="" placeholder="phone no" require>
</td>
</tr>
<tr>
<td>*Gender</td>
<td><input type="radio" name="gender" id="gender" value="male" require>male<input type="radio" name="gender" id="" value="female">female</td>
</tr>
<tr>
<td>*Address</td>
<td><input type="text" name="address" id="" placeholder="address" require></td>
</tr>
<tr>
<td>*User photo (max size 500kb)</td>
<td><input type="file" name="image" id="" require></td>
</tr>
<tr>
<td>*Voterid: VIany number</td>
<td><input type="text" name="voterid" id="" placeholder="ex:VI123456" require></td>
</tr>
<tr>
<td>*Username:between 8 to 30 character</td>
<td><input type="text" name="username" id="" placeholder="username" maxlength="30"   minsize="8" require></td>
</tr>

<tr>
<td>*Password:between 6 to 10 character</td>
<td><input type="password" name="password" id="" placeholder="password" maxlength="10"   minsize="6" require></td>
</tr>
<tr>
<td>*Confirm Password</td>
<td><input type="password" name="conpassword" id="" placeholder="confirm password" require></td>
</tr>
<tr>
<td>click here to </td>
<td id="login"><a href="index.php">login page</a></td>
</tr>
<tr>
<td align="center" id="sub"><input type="submit" value="submit" name="submit" id="submit"></td>

<td align="center" id="res"><input type="reset" value="reset" name="reset" id="reset"></td>
</tr>


 </form>


</table>
    
</body>
</html>



<?php
   if(isset($_POST["submit"]))
   {
       if(isset($_POST["name"])&isset($_POST["dob"])&isset($_POST["username"])&isset($_POST["email"])&isset($_POST["phone"])&isset($_POST["gender"])&isset($_POST["address"])&isset($_POST["password"])&isset($_POST["conpassword"])&isset($_POST["voterid"]))
         {
             
            if(!empty($_POST["name"])&!empty($_POST["dob"])&!empty($_POST["username"])&!empty($_POST["email"])&!empty($_POST["phone"])&!empty($_POST["gender"])&!empty($_POST["address"])&!empty($_POST["password"])&!empty($_POST["conpassword"])&!empty($_POST["voterid"]))
              {
                  $name=$_POST["name"];
                  $dob=$_POST["dob"];
                  $username=$_POST["username"];
                  $email=$_POST["email"];
                  $phone=$_POST["phone"];
                  $voterid=$_POST["voterid"];
                  $gender=$_POST["gender"];
                  $address=$_POST["address"];
                  $password=$_POST["password"];
                  $conpassword=$_POST["conpassword"];
                  
                 

                  if($password==$conpassword)
                  {
                    if(isset($_FILES["image"]))
                    {
                        echo "<pre>";
                        // print_r($_FILES);
                        echo "</pre>";
                    $filename=$_FILES["image"]["name"];    
                    $size=$_FILES["image"]["size"];    
                    $type=$_FILES["image"]["type"];        
                    $tmp=$_FILES["image"]["tmp_name"]; 
                    $filepath="upload-images/".$filename; 
                    if($size<512000)
                        {
                        if($filename)
                         {
                         $sql="INSERT INTO `student`(`name`, `gender`, `dob`, `email`, `address`, `phone`,`voterid`, `username`, `filepath`, `password`, `conpassword`) VALUES ('$name','$gender','$dob','$email','$address','$phone','$voterid','$username','$filepath','$password','$conpassword')";
                             
                         $query=mysqli_query($conn,$sql);
                         if($query)
                         {
                            move_uploaded_file($tmp,"upload-images/".$filename);
                             echo "your record has been successfully recorded";
                         }
                         else{
                             die("please enter valid phone no,voter id,email id, password and username");
                         }
                        



                         }
                        else
                         {
                        die("file not uploaded");
                         }
                        }
                    else{
                        die("max file size is  500kb and file is not uploaded");
                        }
                    }
                  }
                  else
                  {
                      die("password and confirm password are incorrect");
                  }
                  
                  
              }
              else{
                  die("some fields are empty");
              }
        }
         else{
             die("something went wrong");
         }
    }
    
?>