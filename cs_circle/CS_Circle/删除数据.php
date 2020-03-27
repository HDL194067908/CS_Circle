<?php

  include '数据库函数.php';
  $pdo=new mysql_pdo();
  echo $_GET['table'].'<br/>';
  echo $_GET['num'];
  $table=$_GET['table'];
  $column='num';
  $value=$_GET['num'];
  $delete = $pdo->mysql_delete($table,$column,$value);
  if($delete){
	  if(!strcmp($table,'dynamic')){
		  echo '<meta http-equiv="refresh" content="0;url=饭圈.php" >'; 
	  }
	  if(!strcmp($table,'message')){
		  echo '<meta http-equiv="refresh" content="0;url=留言板.php" >'; 
	  }
	 
  }else{
	  echo "<hr/>";
	  echo "删除失败！";
  }
?>