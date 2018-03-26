<?php 
//connect database
require ('conn/conn.php');
//get information
$userName=$_POST['userName'];
$portraitPath=$_POST['portraitPath'];
$telephone=$_POST['telephone'];
$mail=$_POST['mail'];
$realName=$_POST['realName'];

$query="update user_info set portraitPath='$portraitPath',telephone='$telephone',mail='$mail',realName='$realName' where userName='$userName'";
$result=mysql_query($query,$link);
if($result){
   echo "{\"status\":\"success\"}"; 
    
}else{
   echo "{\"status\":\"success\"}"; 
}



?>