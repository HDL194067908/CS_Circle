<?php
//1.读取文件（因为是用？传参的方式，所以用get接收）
$filename=$_GET['name'];
$filepath='uploads/'.$_GET['name'];
$filetype=$_GET['type'];
//打开文件

//2.文件的描述信息Content-Disposition（内容配置）指定为attachment（附件）必须
header("Content-Disposition:attachment;filename={$filename}");

//3.指定被下载文件的类型（非必须）
header("Content-Type:{$filepath}");

//4.指定被下载文件的大小（非必须）
header("Content-Length:".filesize($filepath));

//5.将内容读入内存缓存区
readfile($filepath);

//注意：在readfile（$filename）之前不能有任何的输出语句，否则下载的文件会出错
?>