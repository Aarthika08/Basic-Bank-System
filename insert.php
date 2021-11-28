<html>
<head>
<title>insertion of image</title>
<style>
 *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "poppins",sans-serif;
}
body{
        width: 100%;
        height:100vh;
        display:flex;
        justify-content: center;
        align-items: center;
}
.container{
   width: 70%;
   height:80vh;
   display:flex;
   justify-content: center;
        align-items: center;

}

.title{
    color: aliceblue;
    background-color: #4e6368;
    font-size: 18px;
}
.right{            
background-image: linear-gradient(160deg,rgba(25,10,99,1)0%,rgba(1,212,318,1)90%);
width: 580px;
height:700px;
border-bottom-right-radius:8px ;
border-top-right-radius:8px ;
display: flex;
flex-direction: column;
justify-content: space-around;
align-items: center;

font-size: 20px;
font-family:sans-serif;

}
.heading{
    color: #c2ddeb;
    text-transform: uppercase;
    font-size: 20px;
    font-weight: 100;
    text-align: center;

}
.p{
    display: flex;
    text-align: center;
    text-indent: 50px;
}
.row{
    display: flex;
justify-content: space-between;
height: 50px;
align-items: center;
}
.row p{
font-size: 13px;
text-align: center;

}
.txt-inp{
border-bottom:1px solid gray;
}
.txt-inp input{
border: 10px;
background: none;
outline: 0;
width: 250px;
color: gray;
text-align: center;
}



</style>
</head>
<body bgcolor="black" text="black" align="center">
<div id="container">
<p style="font-size:30px">fill the form</p>
<div class="dbb">
<div class="right">        
<h1 class="heading">customers details</h1>
<form action="" method="POST" enctype="multipart/form-data">
<div class="row">
 <p>id:</p>
                        <div class="text_inp">
  <input type="text" class="db" name="id">

</div>
            </div>
<div class="row">
 <p>name:</p>
                        <div class="text_inp">
 <input type="text" name="name" class="db"></div>
            </div>

<div class="row">
 <p>email:</p>
                        <div class="text_inp">
 <input type="text" name="email" class="db">
</div>
            </div>
<div class="row">
 <p>address:</p>
                        <div class="text_inp">
<input type="text" name="address" class="db"></div>
            </div>
<div class="row">
 <p>bank branch</p>
                        <div class="text_inp">
<input type="text" name="bank_branch" class="db"></div>
            </div>
<div class="row">
 <p>bank balance:</p>
                        <div class="text_inp">

<input type="text" name="balance" class="db"></div>
            </div>
<div class="row">
 <p>city:</p>
                        <div class="text_inp">
<input type="text" name="city" class="db"></div>
            </div>
<div class="row">
 <p>state</p>
                        <div class="text_inp">
<input type="text" name="state" class="db"></div>
            </div>
<div class="row">
 <p>image:</p>
                        <div class="text_inp">
<input type="file" name="userfile[]" value="" multiple=""> </div>
            </div>
<div class="row">
 <p>phone</p>
                        <div class="text_inp">
<input type="number" name="ph" id="ph" class="db"></div>
            </div>
<div class="row">
 <p>gender:</p>
                        <div class="text_inp">
<input type="text" name="gender" class="db"><br/></div>
            </div>
<input type="submit" name="submit" value="upload"> 

</div></div>
</form>
</div>
</body>
</html>
<?php

$link=mysqli_connect("localhost","root","","faculty");
if($link==false)
{
die("could not able to  connect".mysqli_error());
}
$table='sample';

$phpFileUploadErrors=array(
0=>'there is no error,the file uploaded success',
1=>'the uploaded file exceeds the upload_max_filesize directive in php.ini',
2=>'the uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form ',
3=>'the uploaded file was partially uploaded',
4=>' no file was upoladed',
6=>'missing a temporary folder',
7=>'failed to write file to disk',
8 =>'A PHP extension stopped the file upload',
);

if (isset($_FILES['userfile'])){
$file_array=reArrayFiles($_FILES['userfile']);
for($i=0;$i<count($file_array);$i++){
if($file_array[$i]['error']){
?><div class="alert alert-dangert">
<?php echo $file_array[$i]['name'].'-'.$phpFileUploadErrors[$file_array[$i]['error']];

?></div><?php

}else{
$extensions=array('jpg','png','gif','jpeg','jfiff');
$file_ext=explode('.',$file_array[$i]['name']);
$name=$file_ext[0];
$file_ext=end($file_ext);
if(!in_array($file_ext,$extensions)){
?><div class="alert alert-danger">
<?php echo"{$file_array[$i]['name']}-invalid file extension!";
?> </div> <?php
}
else{
$img_dir='web/'.$file_array[$i]['name'];
move_uploaded_file($file_array[$i]['tmp_name'],$img_dir); 
$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$address=$_POST['address'];
$bank_branch =$_POST['bank_branch'];
$balance=$_POST['balance'];
$city=$_POST['city'];
$state=$_POST['state'];
$ph=$_POST['ph'];
$gender=$_POST['gender'];
$a=uniqid();
$sql="INSERT IGNORE  INTO $table(id,acc,name,email,address,bank_branch,balance,city,state,image,ph,gender) VALUES('$id','$a','$name','$email','$address','$bank_branch','$balance','$city','$state','$img_dir','$ph','$gender')";

//$mysqli->mysqli_query($sql) or die($mysqli->error);
if(mysqli_query($link,$sql))
{
echo " record is inserted";
}
else
{
echo ' record not inserted';
}
?>
<div class="alert alert-success">
<?php echo $file_array[$i]['name'].'-'.$phpFileUploadErrors[$file_array[$i]['error']];
?> </div> <?php

}}}}

function reArrayFiles(&$file_post){
$file_ary=array();
$file_count=count($file_post['name']);
$file_keys=array_keys($file_post);

for($i=0;$i<$file_count;$i++){
foreach($file_keys as $key){
$file_ary[$i][$key]=$file_post[$key][$i];
}}
return $file_ary;
}
function pre_r($array){
echo'<pre>';
print_r($array);
echo'</pre>';
}
header("refresh:50;url=sample2.php");
?>
