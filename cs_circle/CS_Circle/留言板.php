<?php
  include '页头.php';
 
  
  $username = $_SESSION['username' ];
  $time = date('Y-m-d H:i:s');
  echo "
    <style>
	  #form{
		  text-align:center;
		  background-color:black;
		  width:1080px;;
		  height:100px;
		  padding-top:10px;
		  margin:0 auto;
	  }
	  #submit{
		  width:120px;
		  border-radius:4px;
	  }
	  #textarea{
		  resize:none;
		  width:440px;
		  height:80px;
		  border-radius:4px;
	  }
	  .nav{
	      width:100%;
	      height:10px;
	      clear:both;
       }
	   #strip{
		  background-color:black;
		  width:1080px;
		  height:100px;
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
    <div id='form'>
	   <form method='post' action='插入数据库.php'>
	    <input type='hidden' value=3 name='process' />
	    <input type='hidden' value=$id name='id' />
	    <input type='hidden' value=$username name='username' />
	    <input type='hidden' value=$time name='time' />
        <textarea name='content' id='textarea'  ></textarea> 
	    <input type='submit' value='留言' id='submit' />
	  </form>
	</div>
	
    
  ";
  include '留言动态.php';
?>