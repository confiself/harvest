<?php 
//connect database
require ('conn/conn.php');
//get information
$uploadContact= $_POST['uploadContact'];

$query="select * from seed_info where uploadContact='$uploadContact' order by uploadTime desc";
$data=array();
$result=mysql_query($query,$link);
if(mysql_num_rows($result)){
    //$array[0]=array("status"=>"success");
    
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
    //echo json_encode('dataList' => $data);
    
}else{
    echo "{\"status\":\"error\",\"result\":[]}";
    //echo json_encode(array('status'=>'error'));
}



?>