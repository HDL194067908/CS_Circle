<?php
    header("content-type:text/html;charset=utf-8");
	class mysql_pdo{
		
		private $pdo;
		
		function __construct(){
			//构造方法，连接数据库
		$dsn = "mysql:host=localhost;dbname=Blog";
		$user = "hdl";
		$pwd = "970612";
		
		try{
			$pdo = new PDO($dsn,$user,$pwd);
		}catch(PDOException $e ){
			echo '数据库连接失败'.$e->getMessage().'<br/>';
			exit;
		}
		//echo '数据库连接成功'.'<br/>';
		$pdo->exec("set names 'utf8' ");
		$this->pdo=$pdo;
		}
		
		
		function __destruct(){
			//断联数据库
			
		}
		//数据查询
		
		function mysql_query($table,array $key,$where,$char){
		
		if(empty($key)){
			$key[]='*';
		}
		$sql='select ';
		foreach($key as $one){
			$sql=$sql.$one.',';
		}
		$sql=rtrim($sql, ",");//去除字符串最后一个逗号
		if($where==''||$char==''){	
			$sql=$sql.' from '.$table.' order by num desc';
		}else{
			$sql=$sql.' from '.$table.' where '.$where." = '".$char."' order by num desc";
		}
		
		$process=0;
        $info = $this->mysql_execute($sql,$process);
	    return $info;
	}
		
		//数据插入
		function mysql_insert($table,array $key,array $value){
			//echo "<br/>调用数据插入函数";
			//拼接表头名及其插入数据的行名
			
            $sql='insert into '.$table.'(';
            foreach($key as $k){
	          $sql =$sql.$k.',';
            }
   
            $sql=rtrim($sql, ",");//去除字符串最后一个逗号
            $sql =$sql.')';
   
   
            //拼接value
            $sql = $sql.' value(';
            foreach($value as $va){
	           $sql =$sql."'".$va."'".',';
	        }
            $sql=rtrim($sql, ",");//去除字符串最后一个逗号
            $sql =$sql.')';
			$process=1;
            $bool=$this->mysql_execute($sql,$process);
			return $bool;
        }
		
	   //数据删除
		function mysql_delete($table,$column,$value){
            $process=1;
			//echo '<br/>调用数据删除函数<br/>';
			$sql="delete from $table where $column = '$value'";
            $delete = $this->mysql_execute($sql,$process);
            return $delete;

        }
	   
	  
	  //计算结果集总行数
	 function mysql_getTotalNum($table){
		 $sql  = "select count(*) from {$table}";
		 $stmt = $this->pdo->prepare($sql);
		 if($stmt->execute()){
			 $num = $stmt->fetch()[0];
			 return $num;
		 }
	 }
	  
	  // 查询指定页码的数据集
	  
	 function mysql_page_query($page=1, $pagesize=4,$table){
		 
		 $offset = ($page -1 )*$pagesize;
		 
		 $sql = "select * from {$table} order by num desc 
		        limit $offset,$pagesize";
				
		 $stmt = $this->pdo->prepare($sql);
		if ($stmt->execute()){
			//echo '查询成功'.'<br/>';
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}else{
			print_r($this->pdo->errorInfo());
			echo '<br/>查询失败'.'<br/>';
			return false;
		}
	 }
	  
	  
	  
	  
	  //执行sql语句
		function mysql_execute($sql,$process){
			//echo "<br/>调用sql语句执行函数<br/>";
			//echo "sql语句：".$sql."<br />";
			/** 
			预处理：
		   $value=array("1","test","test","2019-12-20","test");
		   $stmt = $this->pdo->prepare($sql);
		 
		   $stmt->bindParam(1,$value[0]);
		   $stmt->bindParam(2,$value[1]);
		   $stmt->bindParam(3,$value[2]);
		   $stmt->bindParam(4,$value[3]);
		   $stmt->bindParam(5,$value[4]);
		  $res = $stmt->execute();
		  if ($res){
			echo '执行sql语句成功'.'<br/>';
		  }else{
			echo '执行sql语句失败'.'<br/>';
			print_r($stmt->errorInfo());
	      }
		  **/	
		  
		  if($process==0){
			  $info = $this->pdo->query($sql);
	          if(!$this->pdo->errorCode()!=='00000'){
		        //echo '执行sql语句成功'.'<br/>';	
				//print_r($info);
				return $info;
		     }else{	
		        echo '执行sql语句失败'.'<br/>';
		        print_r($this->pdo->errorInfo());
				return $info;
		
	         }		
		  }
		  if($process==1){
			$info = $this->pdo->exec($sql); //执行成功返回true 否则false
			if($info){
				//echo '执行sql语句成功'.'<br/>';
				return $info;
			}else{	
				//echo '执行sql语句失败'.'<br/>';
				print_r($this->pdo->errorInfo());
				return;
			}
		  }
		  
		}
		
	}
?>