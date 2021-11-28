<html>
<body bgcolor="pink" text="black" align="center">
<p style="font-size:10px">
<?php
$link=mysqli_connect("localhost","root","","faculty");
if($link==false)
{
die("could not able to  connect".mysqli_error());
}

$id=$_POST['id'];

$a=$_POST['account_no'];
$owner=$_POST['owner'];

$b=$_POST['acc_no'];

$tra=$_POST['transfer_to'];

$amo=$_POST['amount'];

$sql="INSERT INTO transaction 
(id,account_no,owner,acc_no,transfer_to,amount,action) VALUES('$id','$a','$owner','$b','$tra','$amo','transferred')";

$word='transferred';

$sql1="SELECT balance FROM sample WHERE id=$id";
if($res = mysqli_query($link, $sql1)){
while($row = mysqli_fetch_assoc($res)){                  
            $balance=$row['balance'];

            if($word=="transferred"){              
            $sql2=mysqli_query($link,"UPDATE sample SET balance=$balance+$amo WHERE acc='$b'");
            $sql2=mysqli_query($link,"UPDATE sample SET balance=$balance-$amo WHERE acc='$a'");
            }
}}

if(mysqli_query($link,$sql))
{
echo'<h1>';
echo "Rs",$amo,"  is transferred to  ",$tra ," by ",$owner;
echo'</h1>';
}
else
{
 echo " money is transferred to ",$tra ,"by",$owner;;
}
echo '<h2>Thank You</h2>';
header("refresh:4;url=sample2.php");
?>
</p>
</body>
</html>
