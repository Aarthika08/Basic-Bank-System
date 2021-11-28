<html>
<body bgcolor="pink" text="black" align="center">

<p style="font-size:30px">
<?php
$link=mysqli_connect("localhost","root","","faculty");
if($link==false){
die("could not able to  connect".mysqli_error());
}


$id=$_POST['id'];

$a=$_POST['account_no'];

$owner=$_POST['owner'];

$amo=$_POST['amount'];

$sql="INSERT INTO transaction 
(id,account_no,owner,amount,action) VALUES('$id','$a','$owner','$amo','deposit')";

$word='deposit';

$sql1="SELECT balance FROM sample WHERE id=$id";
if($res = mysqli_query($link, $sql1)){
while($row = mysqli_fetch_assoc($res)){                  
            $balance=$row['balance'];

            if($word=="deposit"){              
            
            $sql2=mysqli_query($link,"UPDATE sample SET balance=$balance+$amo WHERE acc='$a'");
            }
}}



if(mysqli_query($link,$sql))
{
echo " transaction is successfull";
echo '<br>';
}
else
{
echo ' transaction is not sucessfull';
echo '<br>';
}
echo"thank you";
header("refresh:2;url=sample2.php");

?>

</p>
</body>
</html>
