<?php
	require('../class/connect.php'); //引入数据库配置文件和公共函数文件
	require('../class/db_sql.php'); //引入数据库操作文件
	$link=db_connect(); //连接MYSQL
	$empire=new mysqlquery(); //声明数据库操作类</p> <p>db_close(); //关闭MYSQL链接
	
	
	$yuan_phone=$_POST['yuan_phone'];
	$xin_phone=$_POST['xin_phone'];
	$que_phone=$_POST['que_phone'];
	$userid=$_POST['userid'];
	
if(empty($yuan_phone)){
	$yuan_phone=0;
}	
if(empty($xin_phone)){
	$xin_phone=0;
}	
if(empty($que_phone)){
	$que_phone=0;
}	
	
	$r=$empire->fetch1("select phone from {$dbtbpre}enewsmemberadd where userid='$userid'");
	if($yuan_phone==$r[phone]){
		if($que_phone==$xin_phone){
			//一样，修改成功
			$empire->query("UPDATE {$dbtbpre}enewsmemberadd SET phone = '$que_phone' WHERE userid='$userid' LIMIT 1");
			echo "1";//修改成功
		}else{
			echo "2";//两次输入不一样
		}
	}else{
		echo "3";//原号码错误
	}
	
$empire=null; //注消操作类变量	

?>
<meta http-equiv="refresh" content="0;url=/e/member/my/">