<?php
session_start();
$id = $_SESSION['userid'];
//echo $_SESSION['pawd'];
$username = $_SESSION['username'];
echo '
<html>
 <head>
   <meta charset="utf-8" />
   <link rel="stylesheet" type="text/css" href="css/页头.css" />

 </head>
  
  <body>
    <div id="box">	   
	   <div id="indexL">
	     <h1>'.$username.'的圈子</h1>
		 <p>点击编辑你的铭言警句</p>
		 <image src="https://ss2.bdstatic.com/70cFvnSh_Q1YnxGkpoWK1HF6hhy/it/u=3815612959,3447670481&fm=26&gp=0.jpg" id="HeaderImage"/>
	   </div>
	   <div id="indexC">
	      <a href="饭圈.php"> 饭圈 </a>&nbsp;&nbsp;|&nbsp;&nbsp;
	      <a href="笔记圈.php"> 笔记圈 </a>&nbsp;&nbsp;|&nbsp;&nbsp;
	      <a href="留言板.php">我的留言板</a>&nbsp;&nbsp;|&nbsp;&nbsp;
	   </div>
	   <div id="indexR">
	      <a href="登录.php"> 退出 </a>  
	   </div>
	</div>
	<div class="nav"></div>
  </body>
</html>

';
?>