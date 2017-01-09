<?php
	//删除订单
	require('../../class/connect.php'); //引入数据库配置文件和公共函数文件
	require('../../class/db_sql.php'); //引入数据库操作文件
	$link=db_connect(); //连接MYSQL
	$empire=new mysqlquery(); //声明数据库操作类
		
	$ddno=$_GET['ddno'];
	$userid=$_GET['userid'];	
	
	if(empty($ddno) || empty($userid)){
		echo '<meta http-equiv="refresh" content="0;url=/e/ShopSys/ListDd/">';
		exit;
	}


$empire->query("delete from phome_enewsshopdd where ddno=$ddno and userid=$userid");	
	
	
$empire=null; //注消操作类变量
?>
<meta http-equiv="refresh" content="0;url=/e/ShopSys/ListDd/">