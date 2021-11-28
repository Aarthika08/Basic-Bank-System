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
$sql = "SELECT * FROM sample";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table width=70% border=1 cellpadding=8>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>name</th>";                
                echo "<th>email</th>";
                echo "<th>phone_no</th>"; 
                echo"<th>actions</th>";
                echo"<th>transaction</th>";

            echo "</tr>";
         

        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";                       
 echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['ph'] . "</td>";                
                 ?>
                <td><div class="button">
                <a href="display.php?id=<?php echo $row['id'];?>"><button class="det" type="button">full details</button></a></td>
                <td><div class="button">
                <a href="transhistory.php?id=<?php echo $row['id'];?>"><button class="det" type="button">transaction history</button></a></td>
        </tr>
                <?php
//echo "</tr>";      
        }
        echo "</table>";   
                mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
?>

<div id="footer">

<p>&copy 2021. Made by <b>AARTHIKA</b> <br>AARTHIKA  Foundation</p>
</div>
</body>
</html>
