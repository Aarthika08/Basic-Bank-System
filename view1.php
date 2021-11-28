

<html>
    <head>
        <link rel="stylesheet" href="sam.css">  
       <style>
        .det{
    background-color: #A569BD;box-sizing: border-box;
    width:200px;
     height:40px;
     box-align:center;
     font-family:fantasy;
     font-size:20px;
border:50px blueviolet;
padding:10px;
margin:12px;
border-radius: 10px;
tab-size:10px; 
color:white;
    }
    .det:hover{
        color: black;
    }
         #footer {
            position: fixed;
            padding: 10px 10px 0px 10px;
            bottom: 10;
            width: 100%;
             
            height: 40px;
            
text-align:center;}
table{
    font:sans-serif;
    text-align:center;
    text-align:center;
    font-size:20px;
    }
    th,td,tr {
      padding: 20px;
    font-size:20px;
      text-align : center;
      border-bottom: 1px solid #DDD;
    font:sans-serif;
    
    }
    tr:hover {
    text-align: center;
    background-color: #D6EEEE;
    }
</style>
       
    </head>
<body style="background-color:powderblue;" ><hr>
<h2 class="logo">Bankz</h2>
<p style="background-color=orange;font-size:60px;text-align:center">data of the customers</p>
<div class="button">
 <a href="http://localhost/xampp/php/index.html"><button class="btn">home</button></a>
 <a href="http://localhost/xampp/php/insert.php"><button class="btn">insert</button></a>
<a href="http://localhost/xampp/php/view.html"><button class="btn">balance</button></a>
<br><br>
<hr>


<?php
$link = mysqli_connect("localhost", "root", "", "faculty");
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
} 
else
{
echo"<h3 align=center>welcome to Bankz<h4>";
}
$id=$_POST['id'];
$a=$_POST['acc'];
$owner=$_POST['name'];
//$id=$_POST['acc'];
$sql="SELECT * FROM  sample where id=$id";
$query=mysqli_query($link,$sql);
if(!$query)
{
    echo"Error :".$sql."<br>".mysqli_error($link);
}
$row=mysqli_fetch_assoc($query);
?>
<form method="post" name="details" class="table"><br>
<div align="left">
    <table>         
<col><th >id</th> <td><?php echo $row['id']?></td></col>
<col> <th>name</th><td><?php echo $row['name'] ?></td></col>
<col><th>account no</th><td><?php echo $row['acc'] ?></td></col>
<col><th>bank balance</th><td><?php echo $row['balance'] ?></td></col>
</table>
<?php
header("refresh:2;url=sample2.php");
?>
