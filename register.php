<?php 
require 'nav.php';
?>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<link rel="stylesheet" href="./assets/css/register.css">
<div style="width: 100%;text-align: center">
<div class="reg">
        <h1>欢迎注册！</h1>
        <form action="registerProcess.php" id="registerForm" method="post" enctype="multipart/form-data">
    	<p >
            <span class="left" >用户名:</span>
            <input type="text" name="userName"  value="" size="200" maxlength="30" />
            <span>*(最多30个字符)</span><br>
        </p>
        <p>
            <span class="left">电子邮箱:</span>
            <input type="text"  name="mail" value="" size="200" height="50" maxlength="150" /><br>
        </p>
        <p>
            <span class="left">密码:</span>
            <input type="password" name="password"  size="100" maxlength="15" />
           <span> *(最多15个字符)</span><br>
        </p>
        <p>
            <span class="left">重复密码:</span>
            <input type="password" name="confirmPassword"  size="50" maxlength="15" /><br>
        </p>
        <div ><li class="registerbutton" onclick="register()" name="register">注册</li></div>
        </form>
</div>
</div>
<script type="text/javascript" language="javascript">
	function register(){
		document.getElementById("registerForm").submit();
	}
</script>