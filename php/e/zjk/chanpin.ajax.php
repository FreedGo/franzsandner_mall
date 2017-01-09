<?php
	//正品查询
	require('../class/connect.php'); //引入数据库配置文件和公共函数文件
	require('../class/db_sql.php'); //引入数据库操作文件
	$link=db_connect(); //连接MYSQL
	$empire=new mysqlquery(); //声明数据库操作类
	
	$mid=$_POST['id'];
echo "<option value='默认'>默认</option>";	
	if(empty($mid)){
		echo 1;
		exit;
	}
$sql=$empire->query("select * from phome_enewskeyclass where titleid='$mid' limit 1;"); 
while($r=$empire->fetch($sql)) 
{ 
	$news=explode(",",$r['classname']);
    foreach ($news as $url){ 
	  echo "<option value='$url'>$url</option>";
	  }
} 
$empire=null; //注消操作类变量
?>