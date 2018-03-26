<?php 
//connect database
require ('conn/conn.php');
//get information
$userName=$_POST['userName'];
$password=$_POST['password'];
$mail=$_POST['mail'];

$resisterTime=date('Y-m-d H:m:s');
$query="select userName from user_info where userName='$userName'";
$data=array();
$result=mysql_query($query,$link);
if(mysql_num_rows($result)){
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
   $query="insert into user_info(userName,password,telephone,mail,address,portraitPath,userType,registerTime,realName)values ('$userName','$password','$telephone','','','',1,'$registerTime','')";
   $result=mysql_query($query,$link);
   if($result){
       echo "{\"status\":\"success\",\"result\":[]}"; 
   }else{
       echo "{\"status\":\"error\"}"; 
   }
}



?>