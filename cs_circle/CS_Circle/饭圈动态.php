<?php
  include '数据库函数.php';
  $pdo=new mysql_pdo();
  
	$table="dynamic";
	/*$key=array('num','dynamicId','dynamicName','dynamicTime','content');
	$where ="";
	$char='';
    //$info = $pdo->mysql_query($table,$key,$where,$char);
	*/
	$pagesize = 4;
	//获取size
   $num =$pdo->mysql_getTotalNum($table);
   //计算最后一页
   $endpage = (int)ceil($num/$pagesize);
   
   if(empty($_GET['page'])){
	   $page = 1;
   }else{
	   $page = $_GET['page'];
   }
   
   $info = $pdo->mysql_page_query($page,$pagesize,$table);
	
    foreach($info as $word){
	   //echo $word['dynamicId'],',',$word['dynamicName'],',',$word['dynamicTime'],',',$word['content'],'<br/>';
      //$id = $_SESSION['userid'];
	  if($id==$word['dynamicId']){
		  $type='visible';
	  }else{$type='hidden';}
	echo "
	<style>
	.nav{
	      width:100%;
	      height:10px;
	      clear:both;
       }
	   #strip{
		  background-color:black;
		  width:1080px;
		  height:120px;
		  margin:0 auto;
		  color:white;
	   }
	   #font_name{
		   padding-left:10px;
		   font-size:1.5em;
	   }
	   #font_time{
		   font-size:0.8em;
	   }
	   #delete{
		   float:right;
		   padding-right:20px;
	   }
	   #textent{
		   padding-left:10px;
	   }
	   a:hover{
	     color:#33FFFF;
       }
	</style>
	<div class='nav'></div>
    <div id='strip'>
	  <span id='font_name'>{$word['dynamicName']}</span>
	  <span id='font_time'>发表于:{$word['dynamicTime']}</span>
	  <span id='delete' style='visibility:$type'><a href='删除数据.php?table={$table}&num={$word['num']} '>删除</a></span>
	  <div id='textent'>{$word['content']}</div>
	</div>
	
	"; 
 	}
    //计算前一页，注意看当前页是否是第一页
	if($page == 1){
		$pre = 1;
	}else{
		$pre = $page - 1;
	}
	//计算后一页，注意看当前页是否是尾页
	if ($page == $endpage){
		$next =$endpage;
	}else{
	    $next = $page + 1;
	}
    echo "
	<style>
	  #index{
		text-align:center;
        background-color:black;	
        padding:15px;		
	  }
	</style>
	<div class='nav'></div>
    <div id='index' >
      <a href='饭圈.php?page=1'> 首页 </a> &nbsp;&nbsp;&nbsp;&nbsp;
	  <a href='饭圈.php?page=$pre'> 上一页 </a> &nbsp;&nbsp;&nbsp;&nbsp;
      <a href='饭圈.php?page=$next'> 下一页 </a> &nbsp;&nbsp;&nbsp;&nbsp;
	  <a href='饭圈.php?page=$endpage'> 尾页 </a> 
    </div>
	";
?>