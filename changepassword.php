

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change password</title>
    <style>
    body{
        text-align:center;
    }
    table{
        
        margin:100px auto;
    }
    #header{
        width:100%;
        height:50px;
        background-color:skyblue;
        text-align:center;
        line-height:50px;
    }
        </style>
</head>
<body>
    <h2 id="header"> Change Password</h2>
    <table border="3" cellspacing="7">
    <form action="" method="post">
    <tr>
    <td>username</td>
    <td><input type="text" name="username1" id=""></td>
    </tr>
    <td>phone</td>
    <td><input type="text" name="phone" id=""></td>
    </tr>
    <tr>
    <td>new password</td>
    <td><input type="password" name="password" id=""></td>
    </tr>
    <td>confirm new password</td>
    <td><input type="password" name="conpassword" id=""></td>
    </tr>
    <tr><td><input type="submit" value="submit" name="submit"></td>
    <td><input type="reset" value="reset" name="reset"></td>
    </tr>
    
    
    </form>
    </table>
    
</body>
</html>
<?php
include("connection.php");
error_reporting(0);
if(isset($_POST["submit"]))
{
     if(isset($_POST["username1"])&isset($_POST["password"])&isset($_POST["conpassword"])&isset($_POST["phone"]))
     {
        if(!empty($_POST["username1"])&!empty($_POST["password"])&!empty($_POST["conpassword"])&!empty($_POST["phone"])) 
        {
            $username1=$_POST["username1"];
            $pass=$_POST["password"];
            $conpass=$_POST["conpassword"];
            $phone=$_POST["phone"];
            if($pass==$conpass)
            {
            $sql="select * from student where username ='$username1' && phone='$phone'";
            $query=mysqli_query($conn,$sql);
            $total=mysqli_num_rows($query);

           if($total==1)
           {
            $sql1="update `student` set password='$pass',conpassword='$conpass' where username='$username1'";
            $query1=mysqli_query($conn,$sql1);
            if($query1)
            {
                echo "your password successfully updated";
                ?>
                                 <meta http-equiv="Refresh" content="2; URL=index.php">
                                 <?php
            }
            else{
                die("your password not updated");
            }

           }
           else
           {
               die("username and phone number are invalid");
           }
            }
            else
            {
                die("password and confirm password are incorrect");
            }
        }
        else
        {
            die("some fields are empty");
        }
     }
     else
     {
         die("something went wrong");
     }
}


?>