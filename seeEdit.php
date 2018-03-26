<?php 
require 'nav.php';
?>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<link rel="stylesheet" href="./assets/css/register.css">
<script type="text/javascript" src="assets/jquery.js"></script>
<div style="width: 100%;text-align: center">
<div class="reg">
        <h1>请输入种子信息！</h1>
        <form action="uploadImage.php" id="uploadForm"  method="post" enctype="multipart/form-data">
   		 <p >
            <span class="left" >上传图片:</span>
            <input name="cropPhoto" type="file"  id  = "fileBtn" size="200" height="50" maxlength="150" />
             
            <br>
        </p>
            <div  onclick = "test()" class="registerbutton">测试按钮
    		</div>
        <p>
            <span class="left">农作物名:</span>
            <input type="text"  name="cropName" value="" size="200" height="50" maxlength="150" /><br>
        </p>
        <p>
            <span class="left">海拔:</span>
            <input type="text"  name="altitude" value="" size="200" height="50" maxlength="150" /><br>
        </p>
        <p>
            <span class="left">位置:</span>
            <input type="text"  name="location" value="" size="200" height="50" maxlength="150" /><br>
        </p>
        <p>
            <span class="left">温度:</span>
            <input type="text"  name="temperature" value="" size="200" height="50" maxlength="150" /><br>
        </p>
        <p>
            <span class="left">湿度:</span>
            <input type="text"  name="humidity" value="" size="200" height="50" maxlength="150" /><br>
        </p>
        <p>
            <span class="left">土壤特性:</span>
            <input type="text"  name="soilProperty" value="" size="200" height="50" maxlength="150" /><br>
        </p>
        <p>
            <span class="left">种植面积:</span>
            <input type="text"  name="acreage" value="" size="200" height="50" maxlength="150" /><br>
        </p>
        <p>
            <span class="left">种子价格:</span>
            <input type="text"  name="seedPrice" value="" size="200" height="50" maxlength="150" /><br>
        </p>
        <p>
            <span class="left">农作物价格:</span>
            <input type="text"  name="cropPrice" value="" size="200" height="50" maxlength="150" /><br>
        </p>
        <p>
            <span class="left">上传者</span>
            <input type="text"  name="uploadContact" value="" size="200" height="50" maxlength="150" /><br>
        </p>
        <p>
            <span class="left">备注:</span>
            <input type="text"  name="notes" value="" size="200" height="50" maxlength="150" /><br>
        </p>
        <div ><li class="registerbutton" onclick="upload()" name="upload">提交</li></div>
        </form>
</div>
</div>
<script type="text/javascript" language="javascript">
	function upload(){
		document.getElementById("uploadForm").submit();
	}
    function test(){
      
       var form = new FormData(document.getElementById("uploadForm"));
        /*var xmlHttp;
			 if(window.XMLHttpRequest){
                 xmlHttp=new XMLHttpRequest();
             }else if(window.ActiveXObject){
                 xmlHttp=new ActiveXObject("Microsoft.XMLHTTP")
             }
            xmlHttp.onreadystatechange=function(){
                if(xmlHttp.readyState==4){
                    if(xmlHttp.status==200){
                      alert("上传成功")
                    }else{
 						alert("服务器返回错误")
                    }    
                }
            };

            xmlHttp.open("POST","http://farmer.applinzi.com/uploadImage.php",true); 
            xmlHttp.send(form);*/

         $.ajax({
            url:"http://farmer.applinzi.com/uploadImage.php",
            type:"post",
            data:form,
            processData:false,
            contentType:false,
            success:function(data){
                
                alert("上传成功！！");
            },
            error:function(e){
                alert("错误！！");
                
            }
        });       

       
    }
    
    function testAjax(){
			var xmlHttp;
			 if(window.XMLHttpRequest){
                 xmlHttp=new XMLHttpRequest();
             }else if(window.ActiveXObject){
                 xmlHttp=new ActiveXObject("Microsoft.XMLHTTP")
             }
            xmlHttp.onreadystatechange=function(){
                if(xmlHttp.readyState==4){
                    if(xmlHttp.status==200){
                      alert("上传成功")
                    }else{
 						alert("服务器返回错误")
                    }    
                }
            };
        //var files = document.formName.cropPhoto.value.
        var files  = document.getElementById("fileBtn").value;
            var paras = "cropPhoto="+files //+"&stopDate="+stopDate
            xmlHttp.open("POST","http://farmer.applinzi.com/uploadImage.php"+paras,true); 
            xmlHttp.send();
            
        }
</script>