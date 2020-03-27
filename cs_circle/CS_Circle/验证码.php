<?php
   function verifycode($width=100, $heigth=40,$len=4){
	   $image = imagecreatetruecolor($width,$heigth);
	   $bgcolor = imagecolorallocate($image,55,55,55);
	   //$bgcolor = randcolor($image,0,100);
	   imagefill($image,0,0,$bgcolor);
	   //生成随机数
	   $code = randMix($len);
	   // 画出随机数
	    for ($i = 0; $i < $len;$i++){
			$x = 5 + $i * ($width / $len);
			$y = rand(4, $heigth-15);
			imagechar($image,5,$x,$y,$code[$i],randcolor($image,127,255));
		}
		// 生成干扰点
		 for($i = 0; $i <200;$i++){
			 $x = rand(0,$width);
			 $y = rand(0,$heigth);
			 imagesetpixel($image,$x,$y,randcolor($image,127,255));
		 }
		
	   // 4） 告知浏览器文件的MIME类型
      header('Content-Type:image/png');
       // 5） 输出
      imagepng($image);
      // 6） 销毁图像资源
       //imagedestroy($image);
	   return $code;
	   
   }
    //随机生成数字和字母混合的验证码字符
   function randMix( $len){
	   $str = "0123456789abcdefghigklmnpqrstuvwxyzABCDEFGHIGKLMNPQRSTUVWXYZ";
       return substr(str_shuffle($str),0,$len);
  }
    //随机生成不同颜色
	function randcolor($image,$start,$end){
		return imagecolorallocate($image,rand($start,$end),
		rand($start,$end),rand($start,$end));
	}
	
   session_start();
   $_SESSION['code']='';
   $code = verifycode();
   $_SESSION['code'] = $code;
  
  
?>
 
 