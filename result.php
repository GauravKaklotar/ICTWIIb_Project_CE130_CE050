<?php
session_start();
error_reporting(0);
include("connection.php");

$user=$_SESSION['username'];
if($user)
{
 
}
else
{
    header('location:index.php');
}

$sql="SELECT *
from result";
$query=mysqli_query($conn,$sql);
$total=mysqli_num_rows($query);

// echo "total -> $total<br>";

$pps="SELECT *
from result
WHERE subject='pps-2';";
$ppsq=mysqli_query($conn,$pps);
$ppst=mysqli_num_rows($ppsq);
$ppsp=($ppst*100)/$total;

// echo "pps  -> $ppst<br>";

$maths="SELECT *
from result
WHERE subject='maths-2';";
$mathsq=mysqli_query($conn,$maths);
$mathst=mysqli_num_rows($mathsq);
$mathsp=($mathst*100)/$total;
// echo "maths-2  -> $mathst<br>";

$php="SELECT *
from result
WHERE subject='php';";
$phpq=mysqli_query($conn,$php);
$phpt=mysqli_num_rows($phpq);
$phpp=($phpt*100)/$total;
// echo "php  -> $phpt<br>";

$html="SELECT *
from result
WHERE subject='html';";
$htmlq=mysqli_query($conn,$html);
$htmlt=mysqli_num_rows($htmlq);
$htmlp=($htmlt*100)/$total;
// echo "html  -> $htmlt<br>";

$physics="SELECT *
from result
WHERE subject='physics';";
$physicsq=mysqli_query($conn,$physics);
$physicst=mysqli_num_rows($physicsq);
$physicsp=($physicst*100)/$total;
// echo "c++  -> $ct<br>";

$english="SELECT *
from result
WHERE subject='english';";
$englishq=mysqli_query($conn,$english);
$englisht=mysqli_num_rows($englishq);
$englishp=($englisht*100)/$total;
// echo "english  -> $englisht<br>";

$es="SELECT *
from result
WHERE subject='environmental science';";
$esq=mysqli_query($conn,$es);
$est=mysqli_num_rows($esq);
$esp=($est*100)/$total;
// echo "es  -> $est";
$arry="$ppst,$mathst,$phpt,$htmlt,$physicst,$englisht,$est";
$array=array($ppst,$mathst,$phpt,$htmlt,$physicst,$englisht,$est);
$name=array("Pps-2","Maths-2","Php","Html","Physics","English","Environmental Science");
$y=0;
$i=0;
$temp_arry=explode(",",$arry);
sort($temp_arry);

for($i=0;$i<7;$i++)
{
    if($array[$i]==$temp_arry[6])
    {
       $x=$i; 
       
    }
    $y++;

}
$name=$name[$x];
$max=($temp_arry[6]*100)/$total;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>result</title>
    <style>
    
    #header{
        width:100%;
        height:50px;
        background-color:pink;
        text-align:center;
        line-height:50px;
    }
    #header:hover{
        background-color:green;
    }
    #table{
        margin:50px auto;
    }
    #winner{
        width:100%;
        height:80px;
        font-size:30px;
        /* background-color:pink; */
        text-align:center;
    }
    a{
        text-decoration:none;
        color:green;
        margin:0px 650px;
        font-size:20px;
        border:1px solid black;
        padding:5px;
    }
    a:hover{
        color:red;
    }
    #vote{
        text-align:center;
        font-size:20px;
        margin-top:50px;
    }
    #back{
        margin-left: 730px; 
        margin-top: 140px;
    }
    #back:hover{
        box-shadow: 4px 6px #0005;
    }
    </style>
</head>
<body>
    <h2 id="header">Result page</h2>
    <h3 id="vote">Total vote: <?php echo $total; ?></h3>
    <table border="3" cellspacing="6" id="table">
    <thead>
    <tr>
    <th>subject name</th>
    <th>vote </th>
    <th>percentage</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td>Pps-2</td>
    <td><?php echo $ppst; ?></td>
    <td><?php echo $ppsp."%"; ?></td>
    </tr>
    <tr>
    <td>Maths-2</td>
    <td><?php echo $mathst; ?></td>
    <td><?php echo $mathsp."%"; ?></td>
    </tr>
    <tr>
    <td>Php</td>
    <td><?php echo $phpt; ?></td>
    <td><?php echo $phpp."%"; ?></td>
    </tr>
    <tr>
    <td>Html</td>
    <td><?php echo $htmlt; ?></td>
    <td><?php echo $htmlp."%"; ?></td>
    </tr>
    <tr>
    <td>Physics</td>
    <td><?php echo $physicst; ?></td>
    <td><?php echo $physicsp."%"; ?></td>
    </tr>
    <tr>
    <td>English</td>
    <td><?php echo $englisht; ?></td>
    <td><?php echo $englishp."%"; ?></td>
    </tr>
    <tr>
    <td>Environmental Science</td>
    <td><?php echo $est; ?></td>
    <td><?php echo $esp."%"; ?></td>
    </tr>
    
    </tbody>

    </table>
    <h2 id="winner">Maximum vote got by <?php echo $name;   ?>. <br>so <?php echo $name; ?> is the most preferred subject.</h2>
    <a href="vote.php" id="back">back</a>
</body>
</html>
