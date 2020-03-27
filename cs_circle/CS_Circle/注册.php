<?php


echo '

<html>
  <header>
    <meta charset="utf-8"/>
	<title>注册</title>
	<link rel="stylesheet" type="text/css" href="css/注册.css" />
	<script src="js/注册.js"></script>
  </header>
  <body onload="getCookie()">
	  <div id="title">用户注册</div>
	  <form method="post" action="验证.php" id="content" onSubmit="return Verification();" >
		   <input type="hidden" name="process" value="1" />
		   <p>用&nbsp;户&nbsp;名：<input type="text" class="re_text" name="id" id="id" /><label id="message1">*</label></p>
		   <p>密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password" class="re_text" name="passwd" id="pw1"/> <label id="message2">*</label> </p>
		   <p>确认密码：<input type="password" class="re_text" name="passwd" id="pw2" /> <label id="message3">*</label> </p>
		   <p>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：<input type="text" class="re_text" name="username" id="username" /> <label id="message4">*</label></p>
		   <p>生&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日：<input type="date" class="re_text" name="birthday" id="birthday" /><label id="message5">*</label></p>
		   <p>学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;校：<input type="text" class="re_text" name="school" id="school" /> <label id="message6">*</label> </p>
		   <p>验&nbsp;证&nbsp;码：<input type="text" id="yzminput" name="usercode" /> <img src="验证码.php" id="yzm" onclick="show()" /> </p>
		   <p> <input type="reset" value="重置" class="re_sub" />&nbsp;&nbsp;&nbsp; <input type="submit" value="提交" class="re_sub" onclick="setCookie()" />  </p>
	   </form>
  </body>
</html>
';
?>

