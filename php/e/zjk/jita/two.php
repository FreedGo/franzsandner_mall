<?php
//钢琴一级查询
	require('../../class/connect.php'); //引入数据库配置文件和公共函数文件
	require('../../class/db_sql.php'); //引入数据库操作文件
	$link=db_connect(); //连接MYSQL
	$empire=new mysqlquery(); //声明数据库操作类
	
	$fenlei2=$_POST['fenlei2'];
	

$sql=$empire->query("select * from {$dbtbpre}ecms_photo where classid in($fenlei2)");
while($r=$empire->fetch($sql))
{
?>
<li class="list-product f-l-l"><a href="<?=$r[titleurl]?>">
	<div class="list-product-img">
		<img src="<?=$r[titlepic]?>" alt="<?=esub($r[title],50)?> ">
	</div>
	<h4 class="list-product-title"><?=esub($r[title],50)?> </h4>
	<p class="list-product-intro"><?=esub($r[futitle],50)?> </p>
	<div class="list-product-price">全国统一价:￥<?=$r[money]?>元</div>
</a>
</li>
<?
}
?>