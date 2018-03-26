<?php 
//connect database
require ('conn/conn.php');
$seedId= $_POST['seedId'];
$query="delete from seed_info where seedId = $seedId";
 
$result=mysql_query($query,$link);
if($result){
    echo "{\"status\":\"success\"}"; 
    
}else{
     echo "{\"status\":\"error\"}"; 
}



?>