<?php
include '数据库函数.php';
$pdo=new mysql_pdo();
//  1:处理注册表 处理块至搬至验证.php  2：处理饭圈文本  3:留言板
 if($_GET['process']==1){
	 
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
		//echo '<meta http-equiv="refresh" content="3;url=注册.php" >';
	}
}
if($_POST['process']==2){
	/*echo $_POST['id'];
    echo "<br/>";
    echo $_POST['username'];
    echo "<br/>";
    echo $_POST['time'];
    echo "<br/>";
    echo $_POST['content'];*/
	$table='dynamic';
	$value=array();
	$post=array('id','username','time','content'); 
	//获取饭圈发表动态文本
	foreach($post as $key){
      $value[$key]= $_POST[$key];
	 }
	$key=array("dynamicId","dynamicName","dynamicTime","content"); 
	$pdo->mysql_insert($table,$key,$value); 
	echo '<meta http-equiv="refresh" content="0;url=饭圈.php" >';
}
if($_POST['process']==3){
	/*echo $_POST['id'];
    echo "<br/>";
    echo $_POST['username'];
    echo "<br/>";
    echo $_POST['time'];
    echo "<br/>";
    echo $_POST['content'];*/
	$table='message';
	$value=array();
	$post=array('id','username','time','content'); 
	//获取饭圈发表动态文本
	foreach($post as $key){
      $value[$key]= $_POST[$key];
	 }
	$key=array("messageID","messageName","messageTime","messageContent"); 
	$pdo->mysql_insert($table,$key,$value); 
	echo '<meta http-equiv="refresh" content="0;url=留言板.php" >';
} 

?>