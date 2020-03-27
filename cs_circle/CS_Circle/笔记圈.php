<?php
  include '页头.php';
  session_start();
  $username = $_SESSION['username' ];
  $time = date('Y-m-d H:i:s');
  echo "
  <style>
	  #form{
		  text-align:center;
		  background-color:black;
		  width:1080px;;
		  height:100px;
		  padding-top:5px;
		  margin:0 auto;
		  text-align:center;
		  color:white;
	  }
	  #textarea{
		  resize:none;
		  width:440px;
		  height:25px;
		  border-radius:4px;
	  }
	  #submit{
		  width:120px;
		  border-radius:4px;
	  }
	  .nav{
	      width:100%;
	      height:10px;
	      clear:both;
	   }
	   
	</style>
    <div id='form'>
	  <form enctype='multipart/form-data'  method='post' action='笔记文件验证.php'>
	    <input type='hidden' value=$id name='id' />
	    <input type='hidden' value=$username name='username' />
	    <input type='hidden' value=$time name='time' />
        <input type='hidden' name='MAX_FILE_SIZE' value='1000000'> 
		<p>简述：<textarea name='content' id='textarea'  ></textarea> </p>
		选择笔记：<input type='file' name='notefile'>
	    <input type='submit' value='上传分享' id='submit' />
	  </form>
	 </div>
	 
  ";
  include '笔记动态.php';
?>