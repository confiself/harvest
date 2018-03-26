<?php 
		require 'nav.php';
	?>
<?php
	require ('conn/conn.php'); 		//加载数据库配置文件
	$pagesize = 5; 	
//设定每页显示条目数
	$firstFlag = 0;
	$sql = "SELECT * FROM seed_info";
	if(isset($_GET['page'])&&$_GET['page']!='') {
		$page=$_GET['page'];
		}else {
		$page=0;
	}
	if(isset($_GET['startDate']) &&$_GET['startDate']!='') {
        if($firstFlag == 0){
            $sql = $sql . " where ";
        }else{
             $sql = $sql . " and ";
        }
		$startDate=$_GET['startDate'];
        $sql = $sql . "uploadTime >= '".$startDate ."'";
        $firstFlag +=  1;
	}
	if(isset($_GET['stopDate']) && $_GET['stopDate']!='') {
        if($firstFlag == 0){
            $sql = $sql . " where ";
        }else{
             $sql = $sql . " and ";
        }
		$stopDate=$_GET['stopDate'];
        $sql = $sql . "uploadTime <= '".$stopDate ."'";
        $firstFlag +=  1;
	}
	if(isset($_GET['cropName']) &&$_GET['cropName']!='' ) {
        if($firstFlag == 0){
            $sql = $sql . " where ";
        }else{
             $sql = $sql . " and ";
        }
		$cropName=$_GET['cropName'];
        $sql = $sql . "cropName = '".$cropName ."'";
        $firstFlag +=  1;
	}
	if(isset($_GET['uploadContact']) &&$_GET['uploadContact']!='' ) {
        if($firstFlag == 0){
            $sql = $sql . " where ";
        }else{
             $sql = $sql . " and ";
        }
		$uploadContact=$_GET['uploadContact'];
        $sql = $sql . "uploadContact = '".$uploadContact ."'";
        $firstFlag +=  1;
	}

	//连表组合查询SQL语句
	
	$numRecord = mysql_num_rows(mysql_query($sql,$link)); 				//获得结果集中的记录数
	$totalpage = ceil($numRecord/$pagesize); 						//获得总页数
	$recordSql = $sql. " LIMIT ".$page*$pagesize.",".$pagesize; 	//拼接翻页SQL语句

	$result = mysql_query($recordSql,$link);
?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="./assets/laydate/laydate.js"></script>
	<link href="./assets/css/common.css" rel="stylesheet" type="text/css" />
	<div id="content">
        <form action="index.php" method="get">
        <div class="query-bar">
            <div class="div-text">起始日期</div><input type="text" name="startDate" id="startDate" style="width:120px;height:30px;float:left" class="laydate-icon" onclick="laydate()"/>
            <div class="div-text">结束日期</div><input type="text" name="stopDate" id="stopDate" style="width:12</span>120px;height:30px;float:left" class="laydate-icon" onclick="laydate()"/>

            <div class="div-text">种子名称</div>
            <input type="text" name="cropName" id="cropName" style="height:30px;width:80px;line-height:30px;float:left"/>
            <div class="div-text">上传用户</div>
            <input type="text" name="uploadContact" id="uploadContact" style="height:30px;width:80px;line-height:30px;float:left"/>
            <input type="submit" value="查询" class="btn-query" onmouseover="this.style.backgroundColor='#ff0000';" onmouseout="this.style.backgroundColor='#ff5151';" onclick="queryClick()"/>       
            
        </div>
        
        </form>
        
    <div id="div-header">
	<table >
		<tr>
			<td class="td-small">图片展示</td>
			<td class="td-small-color" >农作物</td>
			<td class="td-small">海拔</td>
            <td class="td-small-color" >位置</td>
            <td class="td-small">温度</td>
            <td class="td-small-color" >湿度</td>
            
            <td class="td-small">土壤特性</td>
            <td class="td-small-colo">种植面积</td>
            <td class="td-smallr" >种子价格</td>
            <td class="td-small-color" >农作物价格</td>
            
            
		</tr>
	</table>
	</div>  
	
	
		<?php
	//循环嵌套开始
	while($rs=mysql_fetch_object($result)){
	?>
     <table >
	    <tr>
            <td class="td-small"><a href="detail.php?seedId=<?php echo $rs->seedId ?>"><image src="<?php $photoStr = explode(';',$rs->cropPhoto); echo $photoStr[0]?>" width="50px" height="50px"/></a></td>
			<!--农作物名-->
			<td class="td-small-color"><?php echo $rs->cropName?></td>
			<!--海拔-->
			<td class="td-small"><?php echo $rs->altitude?></td>
			<!--位置-->
			<td class="td-small-color"><?php echo $rs->location?></td>
			<!--温度-->
			<td class="td-small"><?php echo $rs->temperature?></td>
			<!--湿度-->
			<td class="td-small-color"><?php echo $rs->humidity?></td>
			<!--土壤特性-->
			<td class="td-small"><?php echo $rs->soilProperty?></td>
			<!--种植面积-->
			<td class="td-small-color"><?php echo $rs->acreage?></td>
			<!--种子价格-->
			<td class="td-small"><?php echo $rs->seedPrice?></td>
			<!--农作物价格-->
			<td class="td-small-color"><?php echo $rs->cropPrice?></td>
		</tr>
	 </table>
		<?php
	//循环嵌套收尾
	}
	?>
	<div id="page">
		<span class="grayborder" style="background-color: #F6F6F6;"> <a href='index.php?page=<?php
			if ($page>0) echo $page-1;?>'>上一页</a> 
		</span>
		<span class="grayborder" style="background-color: #F6F6F6;"> 
			<a href='index.php?page=<?php if ($page<$totalpage-1) echo
				$page+1;?>'>下一页
			</a> 
		</span> 
		<span class="showPage" ><?php echo ($page+1)."/".$totalpage?>
		</span>
		<span class="jump">
            前往第<input type="text" style="width:30px" id="targetPage" style="">页
            <input type="button" value="GO" onclick="gotoPage()" style="color: #666;width:30px;text-align:center">
		</span>
	</div>
</div>
<script type="text/javascript" language="javascript">
	function gotoPage(){
		console.log("enter function", document.body);
		var targetPage=document.getElementById('targetPage').value;
		targetPage=parseInt(targetPage);
		if(targetPage!=null && targetPage<=<?php echo $totalpage?> &&targetPage>0){	
			targetPage--;
			window.location.href="index.php?page="+targetPage;
		}
	}
     function queryClick(){
    	var startDate=document.getElementById('startDate').value;
        var stopDate=document.getElementById('stopDate').value;
        var cropName=document.getElementById('cropName').value;
        var uploadContact=document.getElementById('uploadContact').value;
        var url = "index.php?";
        var count = 0;
        if(startDate!=null){
            if(count != 0){
            	url = url + "&";
            }
			url = url + "startDate=" +startDate;
            count =count +1;
		}
        if(stopDate!=null){
            if(count != 0){
            	url = url + "&";
            }
			url = url + "stopDate=" +stopDate;
            count =count +1;
		}
        if(cropName!=null){
            if(count != 0){
            	url = url + "&";
            }
			url = url + "cropName=" +cropName;
            count =count +1;
		}
        if(uploadContact!=null){
            if(count != 0){
            	url = url + "&";
            }
			url = url + "uploadContact=" +uploadContact;
            count =count +1;
		}
        
        window.location.href=url;
    }

</script>
