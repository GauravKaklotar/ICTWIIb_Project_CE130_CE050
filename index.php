
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin log in page </title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
    body{
       
        text-align:center;
        font-size:20px;
        /* background-image:url("https://images.unsplash.com/photo-1477281765962-ef34e8bb0967?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=632&q=80"); */
        background-image:url("2.jpg");
        background-size:cover;
    
    }
    table{
        width:25%;
        margin-top: 50px;
        background-color:black;
        border:5px solid white;
        border-radius:25px;
        background:rgba(0,0,0,0.7);
    }
    #type{
        width: 300px;
        height:32px;
        border:0;
        outline:0;
        background:transparent;
        border-bottom:3px solid white;
        color:white;
        font-size: 25px;
    }
    input::-webkit-input-placeholder
    {
        font-size:20px;
        line-height:3;
        color:white;
    }
    #submit{
        background-color:orange;
        /* padding:10px; */
        width:250px;
        height:35px;
        font-size:17px;

    }
    #submit:hover{
        color:green;
    }
    #reg{
        text-decoration:none;
        color:black;
        padding:7px;

        background-color:orange;
        /* padding:10px; */
        width:400px;
        /* height:35px; */

    }
    #reg:hover{
        color:green;
    }
    #change{
        text-decoration:none;
    }
    #change:hover{
        color:red;
    }
    
    
    
    </style>
</head>
<body>
<table border="0" cellspacing="30" align="center" >
<form action=""  method="post" >
<tr>
<td align="center"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTflae1yQrKwE7ysPEe71W50eZlxstKv3KuGw&usqp=CAU" alt="no load image" width="50%"></td>
</tr>
<tr>
<td><input type="text" name="username" id="type" placeholder="username"></td>
</tr>
<tr>
<td><input type="password" name="password" id="type" placeholder="*******"></td>
</tr>
<tr>
<td align="center"><input type="submit" name="submit" value="login" id="submit"></td>
</tr>
<tr>
<td > <a href="registration.php" id="reg">for new user</a></td>
</tr>
<tr>
<td > <a href="changepassword.php" id="change">forgot password</a></td>
</tr>


</form>
</table>

</body>
</html>

<?php

include("connection.php");
session_start();

if(isset($_POST["submit"]))
{
    if(isset($_POST["username"])&isset($_POST["password"]))
    {
        if(!empty($_POST["username"])&!empty($_POST["password"]))
        {
           $username=$_POST["username"];
           $password=$_POST["password"];
           $sql="select * from student where username ='$username' && password='$password'";
           $query=mysqli_query($conn,$sql);
           $total=mysqli_num_rows($query);
           if($total==1)
           {
               echo "<font color='green'> You have login successfully";
               $_SESSION['username']=$username;
               
               
               
    ?>
<meta http-equiv="Refresh" content="2; URL=vote.php"> 
<?php
            //    header('location:vote.php');
           }
           else{
               echo "<font color='red'> login failed because  password and username are invalid";
           }
        }
        
        else{
            echo "<font color='red'>somefields are empty";
        }
    }
    else{
        echo "<font color='red'>something went wrong";
    }
}
?>  

