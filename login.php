
<meta charset="UTF-8">
<link rel="stylesheet" href="./assets/css/login.css">
<?php 
	require 'nav.php';
?>
<div class="login">
    <form action="loginProcess.php" id="loginForm" method="post" enctype="multipart/form-data"
    onSubmit="return login();">
    <div id="loginTitle">
    	<h1>用户登录</h1>
    </div>
    <div>
        <input type="text" name="userName" style="background-image:url(./assets/img/user.png);
        background-repeat: no-repeat;background-color: transparent;"/>
    </div>
    <div>
        <input type="password" name="password" style="background-image:url(./assets/img/password.png);
        background-repeat: no-repeat;background-color: transparent;"/>
    </div>
    <div id="loginButton" onclick="login()" name="login">登录</div>
	</form>
</div>
<script type="text/javascript" language="javascript">
	function login(){
		document.getElementById("loginForm").submit();
	}
</script>
