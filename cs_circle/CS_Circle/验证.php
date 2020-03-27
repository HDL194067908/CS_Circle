<?php
  session_start();
  //process=1处理注册表的验证码   0则处理登录表的验证码
  if($_POST['process']==0){
	  $code = $_SESSION['code'];
      $usercode = trim($_POST['usercode']);
	if(strcasecmp($code,$usercode) == 0){
	  echo "<hr />";
	  echo '验证成功';
	  echo '<meta http-equiv="refresh" content="0;url=查询数据.php">';
    }else{
	  echo "<hr />";	
	  echo '验证失败，3s后返回登录界面。。。'; 
	  echo '<meta http-equiv="refresh" content="3;url=登录.php" >';
    }  
  }
  if($_POST['process']==1){  
	  $code = $_SESSION['code'];
      $usercode = trim($_POST['usercode']);
	if(strcasecmp($code,$usercode) == 0){
	  //echo '验证成功';
	  include '数据库函数.php';
      $pdo=new mysql_pdo();
	  $table="user";
	  $value=array();
	  $key=array("userid","pawd","username","birthday","school");
	  //获取注册表post信息	 
	  $post=array('id','passwd','username','birthday','school'); 
	  foreach($post as $key){
         if($key=='passwd'){
			 $_POST[$key]=md5($_POST[$key]);//加密密码
		 }		 
		 $value[$key]= $_POST[$key];
	   }
	 
	  //插入数据库
	  /*
	  表名 行名 数据
	  */
	  $table="user";
      $key=array("userid","pawd","username","birthday","school");
	  $BOOL = $pdo->mysql_insert($table,$key,$value);
	  if($BOOL){
		echo "<br /><hr/>";
		echo "注册成功，3s后跳转至登录界面...";
		echo '<meta http-equiv="refresh" content="3;url=登录.php" >';
	  }else{
		echo "<br /><hr/>";
		echo "注册失败，3s后返回至注册界面...";
		echo '<meta http-equiv="refresh" content="3;url=注册.php" >';
	  }
	 // echo '<meta http-equiv="refresh" content="0;url=插入数据库.php?process=1" >';
    }else{
	  echo "<hr />";
	  echo '验证失败，3s后返回注册界面。。。';
	  echo '<meta http-equiv="refresh" content="3;url=注册.php">';
    }  
  }
  
?>