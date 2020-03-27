<?php
session_start();
$_SESSION='';


echo '
<html>
  <header>
    <meta charset="utf-8"/>
	<title>登录</title>
	<link rel="stylesheet" type="text/css" href="css/登录.css" />
	<script type="text/javascript" src="js/登录.js"></script>

  </header>
  <body onload="getCookie()"> 
   
	  <div id="logOn">
	    <div>
		  <p id="tip">用户登录</p>
		  <form method="post" action="查询数据.php" onSubmit="return Verification1();">
		   
		   <input type="hidden" name="process" value="0" />
		   <p>用户名：<input class="inputbox"  name="id" type="text" id="id"/> <label id="message1"></label> </p>
		   <p>密&nbsp;&nbsp;&nbsp;码：<input class="inputbox" name="passwd" id="passwd" type="password" /> <label id="message2"></label> </p>
		   <p>验证码：<input type="text" id="yzminput" name="usercode"> <img src="验证码.php" id="yzm" onclick="show()" /> </p> 
		   <p> <input id="submit" type="submit" value="登录" onclick="setCookie()" /> </p> 
		   
		  </form> 
          	  
		</div>
	    <div>
		  <p id="register"> <a href="注册.php">->去注册</a> &nbsp;&nbsp;</p>
		</div>	
	  </div>
	   	
	  <div id="Tips">
	    <div id="title">温馨提示</div>
		<div id="content">
		  <br/>如有问题请联系qq19406790
		  <p>北京联合大学软件工程1701B2</p>
		</div>
	  </div>
	
  </body>
</html>

';
?>

