<?php 
//connect database
require ('conn/conn.php');
//get information
$userName=$_POST['userName'];
$password=$_POST['password'];

$query="update user_info set password='password' where userName='userName'";
$array=array();
$result=mysql_query($query,$link);
if($result){
   $array[0]=array("status"=>"success");
    
}else{
    $array[0]=array("status"=>"error");
}
$str=json_encode($array);
echo $str;


?>