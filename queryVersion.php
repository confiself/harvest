<?php 
header("Content-type: text/html; charset=utf-8");
//connect database
require ('conn/conn.php');

$query="SELECT versionCode,versionName,forceUpdate,updateUrl,updateDescription,max(updateTime) as updateTime from version_info";
$array=array();
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
    echo "{\"status\":\"error\"}";
}


?>