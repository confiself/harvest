<?php 
//connect database
require ('conn/conn.php');
//get information
$userName=$_POST['userName'];
$password=$_POST['password'];

$query="select userName from user_info where userName='$userName' and password='$password'";
$data=array();
$result=mysql_query($query,$link);
if($result){
   echo "{\"status\":\"success\",\"result\":[";
	$i=1;
	while($row=mysql_fetch_assoc($result)) {
		$data[$i]=$row;
        if($i != 1){
            echo ",";
            echo json_encode($row);
        }else{
        echo json_encode($row) ;
        }
		$i++;
        
     }
    echo "]}";
}else{
    echo "{\"status\":\"error\"}"; 
}


?>