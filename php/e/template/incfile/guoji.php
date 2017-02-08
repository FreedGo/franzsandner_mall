<?php
//接收商品信息
$china = $_GET['china'];

require("../../class/db_sql.php");
require("../../class/connect.php");
$link = db_connect();
$empire = new mysqlquery();
if (empty($china)) {
	exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>销售网络 - 德国钢琴，世界一等钢琴，世界顶级钢琴，法兰山德钢琴</title>
	<link rel="stylesheet" type="text/css" href="/css/base.css">
	<link href="/css/xin-sale-net.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="/js/sale-net.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include_once 'header_1.php';
?>
<div id="body_container">
	<div class="banner">
		<div class="banner-content">
			<script src="http://www.franzsandner.com/d/js/acmsd/thea19.js"></script>
		</div>
	</div>
	<div class="divsd clearfix">
		<div class="m_n">
			<div class="main_new2">

				<div class="list-menu clearfix">
					<div class="list-new-logo f-l-l">
						<h3>德国法兰山德</h3>
					</div>
					<div class="list-page-num f-l-l">
						<h2 class="f-l-l">销售网络&gt;</h2>
						<h3 class="f-l-l">全球代理商&gt;</h3>
						<h3 class="f-l-l"><?= $china ?></h3>
					</div>
				</div>
				<!-- 左侧菜单开始···················································· -->
				<div class="nn_left2">
					<div class="leftcate">
						<ul style="margin-top:10px;">
							<li class="hov"><a href="/xiaoshou/">全球代理商</a></li>
							<li class="big"><a href="/xiaoshou/shopone/">中国代理商</a></li>
						</ul>
					</div>
					<!-- 搜索框开始················································ -->
					<div class="search-warp clearfix">
						<form action="">

							<div class="form-group f-l-l">
								<label class="sr-only" for="search-con">输入各地琴行</label>
								<input class="form-control f-l-l" id="search-con " type="text" placeholder="输入搜索内容">
							</div>
							<button class="btn  btn-warning f-l-l" type="submit ">搜索</button>
						</form>
					</div>
					<!-- 搜索框结束················································ -->
					<div class="clear" style="height:20px"></div>
					<div class="clear" style="height:20px"></div>
				</div>
				<!-- 右侧菜单开始················································ -->
				<div class="nn_right">

					<!-- 省代理商列表 -->
					<div class="province-sale-list">
						<table class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>琴行名称</th>
								<th>琴行地址</th>
								<th>琴行电话</th>
								<th>代理产品</th>
								<th>其他信息</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$sql = $empire->query("select * from {$dbtbpre}ecms_shop where guojidi='$china'");
							while ($r = $empire->fetch($sql)) {
								?>
								<tr>
									<td class="list-title"><a href="<?= $r[titleurl] ?>"><?= $r[title] ?></a></td>
									<td><?= $r[intro] ?></td>
									<td><?= $r[phone] ?></td>
									<td><?= $r[china] ?></td>
									<td><a href="<?= $r[titleurl] ?>">更多资讯</a></td>
								</tr>
								<?
							}
							?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<?php
		include_once 'footer.php';
		?>
</body>
</html>