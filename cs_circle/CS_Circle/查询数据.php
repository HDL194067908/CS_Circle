<?php
  include '数据库函数.php';
  $pdo=new mysql_pdo();
 if($_POST['process']==0){  //处理登录信息
	  $table="user";
	  $key=array();
	  $where ="userid";
	  $char =$_POST['id'];
	  $passwd=md5($_POST['passwd']);	  
	  $info = $pdo->mysql_query($table,$key,$where,$char);
	  $flag=0;
	  foreach($info as $work){
		if(!strcmp($passwd,$work['pawd'])){
			$flag=1;
			echo '<meta http-equiv="refresh" content="0;url=饭圈.php" >';
			session_start();
			$_SESSION['userid']=$work['userid'];
			$_SESSION['pawd']=$work['pawd'];
			$_SESSION['username']=$work['username'];
			
		}
	 }
	 if($flag==0){
		 echo '<meta http-equiv="refresh" content="0;url=登录.php" >';
	 }
	 
  }
 
  
	
	
	
	
    
	
	
?>