<html>
<head>
<h1 align="center">transaction detail</h1>
<link rel="stylesheet" href="sam.css">
<style>
image{
width:100px;
 height:50px;
align:right;
}
.bon{
box-sizing: border-box;
    background-color:#A569BD;
    width:200px; height:100px;
     box-align:center;
     font-family:fantasy;
     font-size:30px;
border:50px blueviolet;
padding:10px;
margin:12px;
border-radius: 10px;
tab-size:30px;
    }
   
 
        #footer {
            position: fixed;
            padding: 10px 10px 0px 10px;
            bottom: 10;
            width: 100%;
             height: 40px;
           
text-align:center;
        }
 table{
    font:sans-serif;
    text-align:center;
    text-align:center;
    font-size:30px;
    }
    th,td {
      padding: 20px;
      text-align: center;
      border-bottom: 1px solid #DDD;
    font:sans-serif;
    font-size:30px;
    }
   
    tr:hover {
    text-align: center;
    background-color: #D6EEEE;
    }
</style>
</head>
    <body style="background-color:powderblue;">
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
 
$id=$_GET['id'];
$sql="SELECT * FROM  transaction where id=$id";
$query=mysqli_query($link,$sql);
if(!$query)
{
    echo"Error :".$sql."<br>".mysqli_error($con);
}
$row=mysqli_fetch_assoc($query);
?>
<form method="post" name="details" class="table"><br>
<div align="left">
 
<?php
if($result = mysqli_query($link, $sql)){
 if(mysqli_num_rows($result) > 0){
 
?>
<table align="center" class ="table table-stripend table-condensed table-bordered" width=50% border="0" cellpadding="5" >        
 
<tr>
                <th >id</th>
<th >account no</th>
                <th>name</th>
<th >account no</th>
                <th>transfer_to</th>
                <th>amount</th>
<th>action</th>
                <th>date and time</th>
</tr>
<tr>
<?php while($row = mysqli_fetch_assoc($result)){ ?>
 <td><?php echo $row['id']
?></td>
<td><?php echo $row['account_no'] ?></td>
               
<td><?php echo $row['owner'] ?></td>              
 <td><?php echo $row['acc_no'] ?></td>
 <td><?php echo $row['transfer_to'] ?></td>
               
<td><?php echo $row['amount'] ?></td>
 
<td><?php echo $row['action'] ?></td>
<td><?php echo $row['date_and_time'] ?></td>
<?php
$a=$row['amount'];

$d=$row['transfer_to'];
   
echo"</tr>";
}
echo "</table>";  
        mysqli_free_result($result);
} else{
echo "No transactions thank you";
header("refresh:2;url=sample2.php");
}
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
header("refresh:2;url=sample2.php");
}
mysqli_close($link);
?>
 
 
       
</body>
</html>
