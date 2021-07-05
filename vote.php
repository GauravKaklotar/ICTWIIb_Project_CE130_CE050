
<?php
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

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>voating page</title>
    <style>
    body{
        text-align:center;
        font-size:20px;
        
        background-image:url("4.jpg");
        background-size:cover;

        width:100%;
        height:100%;
    
    }
    
    #header1{
        text-align:center;
        margin-top:100px;
    }
    #table{
        margin: 100px auto;
        background-color:pink;
    }
    a{
        color:white;;
        text-decoration:none;
        font-size:25px;
        
    }
    a:hover{
        color:red;
    }
    li{
        list-style:none;
        width:150px;
        height:50px;
        background-color:blue;
        float:left;
        line-height:50px;
        text-align:center;
        margin-left:50px;
        border-radius:10px;
    }
    ul{
        width:100%;
        height:50px;
        background-color:black;
        border-radius:20px;
    }
    li:hover{
        background-color:green;
    }
    #x{
        float:right;
        margin-right:60px;
    }
    
    
    </style>
</head>
<body>
<ul> 
<li><a href="delete.php" onclick='return rajandelete()' id="delete">delete </a></li>
<li><a href="upadate.php" onclick='return rajanupadate()' id="upadate">upadate </a></li>
<li><a href="userdetail.php" onclick='return rajanuserdetail()' id="upadate">userdetail </a></li>
<li ><a href="result.php" id="result">result </a></li>
<li id="x"><a href="logout.php" onclick='return rajanlogout()'> logout</a></li>
</ul>
<h2  id="header1" >Voting page</h2>

<script>
function rajandelete()
{
    return confirm('are you sure you want to delete this record');
}
function rajanuserdetail()
{
    return confirm('are you sure you want to show your detail');
}

function rajanupadate()
{
    return confirm('are you sure you want to upadate this record');
}
function rajanlogout()
{
    return confirm('are you sure you want to logout');
}
</script>




<table border="3" id="table" cellspacing="8">  
 <form action=""  method="post">
 <tr>
 <td>voterid</td>
 <td><input type="text" name="voterid1" id="" ></td>
 </tr>
 <tr>
 <td>select subject</td>

 <td>
  <select name="subject" >
    <option >select subject</option>
    <option value="Maths-2">Maths-2</option>
    
    <option value="Pps-2" >Pps-2</option>
    
    <option value="Html" >Html</option>
    <option value="Php" >Php</option>
    <option value="Physics" >Physics</option>
    <option value="English" >English</option>
    <option value="Environmental science" >Environmental science</option>
    
    
    </select>
    </td>
    </tr>
    <tr>
    <td><input type="reset" value="reset"></td>
    <td><input type="submit" value="votting" name="submit"></td>
    </tr>
 </form>
 
</table>
</body>
</html>
<?php
include("connection.php");
if(isset($_POST["submit"]))
{
     if(isset($_POST["voterid1"])&isset($_POST["subject"]))
     {
        if(!empty($_POST["voterid1"])&!empty($_POST["subject"]))
        {
            $voterid=$_POST["voterid1"];
            $subject=$_POST["subject"];
            
            $sql1="select * from student where username ='$user' && voterid='$voterid'";
            $query1=mysqli_query($conn,$sql1);
            $total=mysqli_num_rows($query1);
            // var_dump($total);
           
        if($total==1)
        {
            
            if($subject!="select subject")
            {

                $sql="insert into result(voterid,subject) values('$voterid','$subject');";
                 $query=mysqli_query($conn,$sql);
               if($query)
               {
                 echo "<font color='green'><br>you have succesfully voted";
               }
              else{
                 die("<font color='blue'>you have alredy voted");
                }

            }
            else
            {
                die("<font color='red' >please select a subject");
            }
            
        }
        else
        {
            die("<font color='red'>voter id is incorrect");
        }




        }
        else
        {
            die("<font color='red'>some fields are empty");
        }
     }
     else
     {
         die("<font color='red'>something went wrong");
     }
}





?>