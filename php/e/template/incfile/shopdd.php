<?php

	//接收商品信息
	$classid=$_GET['classid'];
	$id=$_GET['id'];
	//接收购买信息
	$titnum=$_POST['titnum']; //购买数量
	$tittype=$_POST['tittype'];//商品型号
	$color=$_POST['colorSelected'];//颜色
	
require("../../class/db_sql.php");
require("../../class/connect.php");
$link=db_connect();
$empire=new mysqlquery();
	if(empty($id)){
		exit;
	}
	if(empty($classid)){
		exit;
	}
	$userid   =getcvar('mluserid');
	if($userid==0){
		echo '<meta http-equiv="refresh" content="0;url=/e/member/login/">';
		exit;
	}
?>
<!DOCTYPE html>
<html lang="ch-ZN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title>法兰山德官方网站</title>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/base.css">
	<link rel="stylesheet" type="text/css" href="/css/member-center.css">
	<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/member-center.js"></script>
</head>
<body>
	<!-- 头部··························································· -->
<?php
	include_once 'header_1.php';
?>
	<!-- 头部结束························································ -->
	<!-- 商品列表页······················································ -->
	<section class="main">
		<div class="all-list-warp">
			<!-- 列表头部广告············································ -->
			<div class="list-head-img">
				<img src="/images/list-head.jpg" alt="">
			</div>
			<!-- 列表头部广告············································ -->
			<!-- 列表内容················································ -->
			<div class="all-list clearfix">
				<form name="alipayment" action="/e/demo/alipayapi.php" method=post>
				<!-- 第一部分,地址选择``````````````````````````````````` -->
				<div class="address-select common-warp">
					<div class="address-select-head common-head">
						<h3>收货地址：</h3>
					</div>
					<div class="address-select-content">
<?php
$sql=$empire->query("select * from phome_enewsyhdizhi where userid=$userid"); 
while($r=$empire->fetch($sql)) 
{ 
?>
<div class="radio">
						  <label>
						    <input type="radio" name="address" id="optionsRadios3" value="<?=$r[consignee]?>::::::<?=$r[phone]?>::::::<?=$r[code]?>::::::<?=$r[addre_1]?>::::::<?=$r[addre_2]?>::::::<?=$r[addre_3]?>::::::<?=$r[address]?>" >
						    <?=$r[consignee]?>  <?=$r[phone]?>  <?=$r[code]?>  <?=$r[addre_1]?> <?=$r[addre_2]?> <?=$r[addre_3]?> <?=$r[address]?>
						  </label>
						</div>
<?
} 
?>
                        
					</div>
					<div class="manage-address">
						<a href="/e/member/friend/">管理地址</a>
					</div>
				</div>
				<!-- 第一部分,地址选择结束``````````````````````````````````` -->
				<!-- 第二部分。支付选择······································ -->
				<div class="common-warp pay-select">
					<div class="pay-select-head clearfix">
						<h3 class="common-head f-l-l">支付方式：</h3>
						<span class="common-msg f-l-l">在线支付</span>
					</div>
				</div>
				<!-- 第三部分。配送方式······································ -->
				<div class="common-warp express-select">
					<div class="express-select-head clearfix">
						<h3 class="common-head f-l-l">配送方式：</h3>
						<span class="common-msg f-l-l">快递配送（免运费）</span>
					</div>
				</div>
				<!-- 第四部分。发票方式······································ -->
				<div class="common-warp invoice-select">
					<div class="invoice-select-head clearfix">
						<h3 class="common-head f-l-l">发票：</h3>
						<span class="common-msg f-l-l">
							<select  class="form-control invoice-change" name="" id="">
								<option value="0">不要发票</option>
								<option value="1">个人</option>
								<option value="2">公司</option>
							</select>
						</span>
						<div class="common-msg company-invoice form-group col-sm-4">
							<label class="sr-only" for="company-invoice">发票抬头</label>
							<input class="form-control" name="invoice" id="company-invoice" type="text" maxlength="60" placeholder="请输入发票抬头">
						</div>
						<span class="common-msg invoice-explain">发票内容：购买商品明细</span>
					</div>
				</div>
				<!-- 第五部分 购物详情······································ -->
				<div class="common-warp show-member-msg-down order-list-down db">
					<div class="address-select-head common-head">
						<h3>购买物品：</h3>
					</div>
					<ul class="list-group">
						<li class="list-group-item order-product">
							<div class="order-list-msg">
								<!-- 订单下班部分·························· -->

								<div class="order-list-msg-down clearfix">
<?php
$r=$empire->fetch1("select * from phome_ecms_photo where classid=$classid and id=$id");
	if($r[money]*$titnum==0){
		echo '<meta http-equiv="refresh" content="1;url='.$r[titleurl].'">';
	}
?>
									<div class="order-list-msg-down-left1 f-l-l">
										<a href="<?=$r[titleurl]?>"><?=$r[title]?></a>
									</div>
									<div class="order-list-msg-down-left5 f-l-r">
										<a href="<?=$r[titleurl]?>"><?=$titnum?></a><!-- 商品数量 -->
									</div>
									<div class="order-list-msg-down-left2 order-price f-l-r"><?php echo $r[youfei]+$r[money]*$titnum?></div>
									
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="order-submit-warp">
					<button  type="submit" class="btn f-l-r btn-warning col-sm-2">提交并支付</button>
				</div>

				<!-- 右侧详细列表结束··················································· -->
			</div>
<input type="hidden" name="id" value="<?=$id?>">      
<input type="hidden" name="titnum" value="<?=$titnum?>">
<input type="hidden" name="tittype" value="<?=$tittype?>">
<input type="hidden" name="color" value="<?=$color?>">

			</form>
			<!-- 列表内容················································ -->
		</div>
	</section>
</body>
</html>
<!-- 
 * By Freed 
 * flyxz@126.com
 * 2016-6-27
 -->