<?php
	//正品查询
	require('../class/connect.php'); //引入数据库配置文件和公共函数文件
	require('../class/db_sql.php'); //引入数据库操作文件
	$link=db_connect(); //连接MYSQL
	$empire=new mysqlquery(); //声明数据库操作类
		
	$id=$_GET['id'];
	$userid=$_GET['userid'];	
	
	if(empty($id)){
		echo '<meta http-equiv="refresh" content="0;url=/e/member/friend/">';
		exit;
	}


$empire->query("delete from phome_enewsyhdizhi where id=$id and userid=$userid");	
	
	
$empire=null; //注消操作类变量
?>
<meta http-equiv="refresh" content="0;url=/e/member/friend/">