<?php
  include '数据库函数.php';
  $pdo=new mysql_pdo();
  
	$table="note";
	/*$key=array("noteId","noteUsername","noteTime","noteContent","noteFile"); 
	$where ="";
	$char=''; 
	$info = $pdo->mysql_query($table,$key,$where,$char);*/
	
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
	   //echo $word['noteId'],',',$word['noteUsername'],',',$word['noteTime'],',',$word['noteContent'],',',$word['noteFile'].'<br/>';
	echo "
	<style>
	   .nav{
	      width:100%;
	      height:10px;
	      clear:both;
       }
	   #downfile{
		  width:1080px;;
		  height:80px;
		  background-color:black;
		  color:white;
	  }
	  #font_name{
		   padding-left:10px;
		   font-size:1.5em;
	   }
	  #font_time{
		   font-size:0.8em;
	   }
	   #download{
		   float:right;
		   padding-right:20px;
	   }
	   #filename{
		   padding-top:10px;
		    padding-left:10px;
	   }
	  .nav{
	      width:100%;
	      height:10px;
	      clear:both;
	   }
	   a:hover{
	     color:#33FFFF;
       }
	</style>
	<div class='nav'></div>
    <div id='downfile'>
	  <span id='font_name'>{$word['noteUsername']}</span>
	  <span id='font_time'>上传于:{$word['noteTime']}</span>
	  <span id='download'><a href='下载笔记.php?name={$word['noteFile']}&type=txt/plain'>下载笔记</a></span>
	  <div id='filename'>{$word['noteContent']}</div>
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
      <a href='笔记圈.php?page=1'> 首页 </a> &nbsp;&nbsp;&nbsp;&nbsp;
	  <a href='笔记圈.php?page=$pre'> 上一页 </a> &nbsp;&nbsp;&nbsp;&nbsp;
      <a href='笔记圈.php?page=$next'> 下一页 </a> &nbsp;&nbsp;&nbsp;&nbsp;
	  <a href='笔记圈.php?page=$endpage'> 尾页 </a> 
    </div>
	";
?>