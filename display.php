<html>
<head>
<h1 align="center">customers detail</h1>
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
$sql="SELECT * FROM  sample where id=$id";
$query=mysqli_query($link,$sql);
if(!$query)
{
    echo"Error :".$sql."<br>".mysqli_error($con);
}
$row=mysqli_fetch_assoc($query);
?>

<form method="post" name="details" class="table"><br>
<div align="left">
    <table align="center" class ="table table-stripend table-condensed table-bordered" width=50% border="0" cellpadding="5" >         
  

<col>

      
                <th align:"right" >image</th>
 <?php echo"<img src='{$row['image']}' alt='image' class='image' style='width:300px;height:200px;align:right ' >";?>

</col>

      <col>
                <th >id</th>
 <td><?php echo $row['id']
?></td>
</col>
<col>
<?php

?>
    
</col>

<col>
                <th>name</th> 
<td><?php echo $row['name'] ?></td>
</col>
<col>
                <th>account no</th> 
<td><?php echo $row['acc'] ?></td>
</col>
<col>              
                <th>email</th>
 <td><?php echo $row['email'] ?></td>
</col>

<col>
                <th>address</th>
<td><?php echo $row['address'] ?></td>
 </col>

<col>
<th>bank branch</th>
<td><?php echo $row['bank_branch'] ?></td>
                </col>
<col>
                <th>city</th>
<td><?php echo $row['city'] ?></td>
</col>
<col>
                <th>state</th>
<td><?php echo $row['state'] ?></td>
</col>       
<col>
 
<col>
<th>phone number</th>
<td><?php echo $row['ph'] ?></td>
</col> 
<col>
                <th>bank balance</th> 
<td><?php echo $row['balance'] ?></td>

</col> 
<col>
                <th>gender</th> 
<td><?php echo $row['gender'] ?></td>
</col>  
<col> 
<td>               
 <a href="transact.html"><button type="button" class="bon" >transact</button></a> 
 </td>
</col>    
 </table>
 </div> <br><br>
 <br><br><br><br><br>
<div id="footer">

 <p>&copy 2021. Made by <b>AARTHIKA</b> <br>AARTHIKA  Foundation</p>
</div>        
        <?php
mysqli_close($link);
?>
</body>
</html>
