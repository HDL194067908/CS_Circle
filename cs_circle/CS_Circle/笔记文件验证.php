<?php
 if($_FILES['notefile']['error'] > 0){
	 echo "<hr />";
	 echo "上传失败：".$_FILES['notefile']['error'] ;
 }else
 {
	$file= $_FILES['notefile']; 
	
    // 检测文件类型 
    $ext = explode(".",$file['name']);
    $extName = end($ext);
	$dir = 'uploads/';
	$filename = time().rand(10000,99999).".".$extName;
    $uploadurl = $dir.$filename;
    move_uploaded_file($_FILES['notefile']['tmp_name'],$uploadurl);
	
	//上传信息至数据库
	$table='note';
	$value=array();
	$post=array('id','username','time','content'); 
	//获取笔记圈上传信息
	foreach($post as $key){
      $value[$key]= $_POST[$key];
	 }
	 $value['filename']=$filename; 
	 $key=array("noteId","noteUsername","noteTime","noteContent","noteFile"); 
	 include '数据库函数.php';
     $pdo=new mysql_pdo();
	 $pdo->mysql_insert($table,$key,$value); 
	 echo '<meta http-equiv="refresh" content="0;url=笔记圈.php" >';
 }
 
?>