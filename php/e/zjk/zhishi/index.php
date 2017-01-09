<?php
	//正品查询
	require('../../class/connect.php'); //引入数据库配置文件和公共函数文件
	require('../../class/db_sql.php'); //引入数据库操作文件
	$link=db_connect(); //连接MYSQL
	$empire=new mysqlquery(); //声明数据库操作类
	
	$classid=$_POST['classid'];

	if(empty($classid)){
		echo '<meta http-equiv="refresh" content="0;url=/e/member/friend/">';
		exit;
	}
	$r=$empire->fetch1("select id from {$dbtbpre}ecms_news where classid=$classid and firsttitle=3 order by id desc limit 1");
	$xx=$empire->fetch1("select * from {$dbtbpre}ecms_news_data_1 where id=$r[id] limit 1"); 
	
		$bodytag = str_replace('\"', 'zjk',$xx[newstext]);
//echo $bodytag;
$string = preg_replace('/zjkzjk/','555',$bodytag);
//echo $string;

$string2 = preg_replace('/zjk/','',$string);

$string3 = preg_replace('[!--empirenews.page--]','',$string2);

$string4 = preg_replace('/11/','1',$string3);

//echo $string4;
$string5 = preg_replace("/%22/",'123',$string4);
echo $string5;
		// print($xx[newstext]);
$empire=null; //注消操作类变量
?>
