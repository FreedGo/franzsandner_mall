<?php
	//正品查询
	require('../class/connect.php'); //引入数据库配置文件和公共函数文件
	require('../class/db_sql.php'); //引入数据库操作文件
	$link=db_connect(); //连接MYSQL
	$empire=new mysqlquery(); //声明数据库操作类
	
	$title=$_POST['title'];
	
	if(empty($title)){
		echo 1;
		exit;
	}

$r=$empire->fetch1("select * from phome_ecms_article where title='$title' limit 1");
if(empty($r[title]) || empty($r[type]) || empty($r[xinghao]) || empty($r[yanse]) || empty($r[daili])){
		echo 1;
		exit;	
		}
?>
<tr>
<td><?=$r[type]?></td>
<td><?=$r[title]?></td>
<td><?=$r[xinghao]?></td>
<td><?=$r[yanse]?></td>
<td><?=$r[daili]?></td>
<td><?=$r[gotime]?></td>
</tr>	
<?
$empire=null; //注消操作类变量
?>