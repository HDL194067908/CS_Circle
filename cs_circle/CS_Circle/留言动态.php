<?
include '数据库函数.php';
  $pdo=new mysql_pdo();
  
	$table="message";
	/*$key=array("num","messageID","messageName","messageTime","messageContent"); 
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
	   //echo $word['messageID'],',',$word['messageName'],',',$word['messageTime'],',',$word['messageContent'].'<br/>';
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
	  <span id='font_name'>{$word['messageName']}</span>
	  <span id='font_time'>上传于:{$word['messageTime']}</span>
	  <span id='delete'><a href='删除数据.php?table={$table}&num={$word['num']}'>删除</a></span>
	  <div id='filename'>{$word['messageContent']}</div>
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
      <a href='留言板.php?page=1'> 首页 </a> &nbsp;&nbsp;&nbsp;&nbsp;
	  <a href='留言板.php?page=$pre'> 上一页 </a> &nbsp;&nbsp;&nbsp;&nbsp;
      <a href='留言板.php?page=$next'> 下一页 </a> &nbsp;&nbsp;&nbsp;&nbsp;
	  <a href='留言板.php?page=$endpage'> 尾页 </a> 
    </div>
	";
?>