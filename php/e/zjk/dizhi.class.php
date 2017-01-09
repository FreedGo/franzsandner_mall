<?php
	//正品查询
	require('../class/connect.php'); //引入数据库配置文件和公共函数文件
	require('../class/db_sql.php'); //引入数据库操作文件
	$link=db_connect(); //连接MYSQL
	$empire=new mysqlquery(); //声明数据库操作类
	
	$userid=$_POST['userid'];
	$addre_1=$_POST['addre_1'];
	$addre_2=$_POST['addre_2'];
	$addre_3=$_POST['addre_3'];
	$address=$_POST['address'];
	$code=$_POST['code'];
	$area=$_POST['area'];
	$phone=$_POST['phone'];
	$consignee=$_POST['consignee'];
	
	if(empty($phone)){
		echo 1;
		exit;
	}
	if(empty($consignee)){
		echo 1;
		exit;
	}
	if(empty($userid)){
		echo 1;
		exit;
	}

$empire->query("insert into phome_enewsyhdizhi
	(userid,consignee,address,phone,code,area,addre_1,addre_2,addre_3) 	values('$userid','$consignee','$address','$phone','$code','$area','$addre_1','$addre_2','$addre_3')");	
	
	
$empire=null; //注消操作类变量
?>
<meta http-equiv="refresh" content="0;url=/e/member/friend/">