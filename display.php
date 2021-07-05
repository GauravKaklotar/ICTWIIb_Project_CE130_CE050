<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Voter Information</title>
    <style>
    body{
        /* background-color:#0005; */
        
    }
    table{
        /* background-color:#0005 */
        background-size:cover;
       
    }
    
    a{
            text-decoration:none;
        }
        #header{
        background-color:black;
        color:white;
        width:100%;
        height:40px;
        line-height:40px;
        text-align:center;
        border-radius:20px;
    }
        </style>
</head>
<body>
<h2 id="header">All Voter Information</h2>
     <table border="2" cellspacing="5" id="table"> 
    <tr>
    <th>name</th>
    <th>gender</th>
    <th>dob</th>
    <th>email</th>
    <th>photo</th>
    <th>address</th>
    <th>phone</th>
    
    
    </tr>
    
    
  

<?php


include("connection.php");
$sql="select * from student";
$result=mysqli_query($conn,$sql);
$total=mysqli_num_rows($result);//this function return how mant records in the student table
echo "<br>";

if($total!=0)
{
   
    while($results=mysqli_fetch_assoc($result))
    {
        echo "
        <tr>
        <td>".$results["name"]."</td>
        <td>".$results["gender"]."</td>
        <td>".$results["dob"]."</td>
        <td>".$results["email"]."</td>
        
        
        <td><img   src='$results[filepath]' height='200' width='200'></td>
        <td>".$results["address"]."</td>
        <td>".$results["phone"]."</td>
        
         
        
        
        </tr>";
    }
    
}
else
{
    echo "no record found";
}


?>
</table>

</body>
</html>