<?php
if(!defined('InEmpireCMS'))
{
	exit();
}

//--------------- 界面参数 ---------------

//会员界面附件地址前缀
$memberskinurl=$public_r['newsurl'].'skin/member/images/';

//LOGO图片地址
$logoimgurl=$memberskinurl.'logo.jpg';

//加减号图片地址
$addimgurl=$memberskinurl.'add.gif';
$noaddimgurl=$memberskinurl.'noadd.gif';

//上下横线背景色
$bgcolor_line='#4FB4DE';

//其它色调可修改CSS部分

//--------------- 界面参数 ---------------


//识别并显示当前菜单
function EcmsShowThisMemberMenu(){
	global $memberskinurl,$noaddimgurl;
	$selffile=eReturnSelfPage(0);
	if(stristr($selffile,'/member/msg'))
	{
		$menuname='menumsg';
	}
	elseif(stristr($selffile,'e/DoInfo'))
	{
		$menuname='menuinfo';
	}
	elseif(stristr($selffile,'/member/mspace'))
	{
		$menuname='menuspace';
	}
	elseif(stristr($selffile,'e/ShopSys'))
	{
		$menuname='menushop';
	}
	elseif(stristr($selffile,'e/payapi')||stristr($selffile,'/member/buygroup')||stristr($selffile,'/member/card')||stristr($selffile,'/member/buybak')||stristr($selffile,'/member/downbak'))
	{
		$menuname='menupay';
	}
	else
	{
		$menuname='menumember';
	}
	echo'<script>turnit(do'.$menuname.',"'.$menuname.'img");</script>';
	?>
	<script>
	do<?=$menuname?>.style.display="";
	document.images.<?=$menuname?>img.src="<?=$noaddimgurl?>";
	</script>
	<?php
}

//网页标题
$thispagetitle=$public_diyr['pagetitle']?$public_diyr['pagetitle']:'会员中心';
//会员信息
$tmgetuserid=(int)getcvar('mluserid');	//用户ID
$tmgetusername=RepPostVar(getcvar('mlusername'));	//用户名
$tmgetgroupid=(int)getcvar('mlgroupid');	//用户组ID
$tmgetgroupname='游客';

$ber=$empire->fetch1("select * from {$dbtbpre}enewsmember where userid=$tmgetuserid");
$add=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid=$tmgetuserid");
//会员组名称
if($tmgetgroupid)
{
	$tmgetgroupname=$level_r[$tmgetgroupid]['groupname'];
	if(!$tmgetgroupname)
	{
		include_once(ECMS_PATH.'e/data/dbcache/MemberLevel.php');
		$tmgetgroupname=$level_r[$tmgetgroupid]['groupname'];
	}
}

//模型
$tgetmid=(int)$_GET['mid'];
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
	<script type="text/javascript" src="/js/jquery.SuperSlide.2.1.1.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/member-center.js"></script>
	<!-- <script src="../js/jquery.fullPage.min.js"></script> -->
	<!-- <script type="text/javascript" src="../js/index.js"></script> -->
	<script type="text/javascript" src="/js/list.js"></script>
	<script type="text/javascript" src="/js/index.js"></script>
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
				<!-- 列表左侧分类········································ -->
				<div class="all-list-left f-l-l">
					<h2 class="all-list-left-head">个人中心</h2>
					<dl class="all-list-left-type type1 list-group">
						<dd class="list-group-item all-list-left-title"><a>账户管理</a></dd>
						<dt class="list-group-item all-list-left-con"><a href="/e/member/my/">个人信息</a></dt>
						<dt class="list-group-item all-list-left-con"><a href="/e/member/EditInfo/EditSafeInfo.php">修改密码</a></dt>
					</dl>
					<dl class="all-list-left-type type2 list-group">
						<dd class=" list-group-item all-list-left-title "><a>订单中心</a></dd>
                        <dt class="list-group-item all-list-left-con"><a href="/e/member/friend/">管理收获地址</a></dt>
						<dt class="list-group-item all-list-left-con"><a href="/e/ShopSys/ListDd/">我的订单</a></dt>
					</dl>
					<dl class="all-list-left-type type3 list-group">
						<dd class="list-group-item all-list-left-title"><a>个人中心</a></dd>
						<dt class="list-group-item all-list-left-con"><a href="/e/member/cp/">我的个人中心</a></dt>
					</dl>
					<dl class="all-list-left-type type4 list-group">
						<dd class=" list-group-item all-list-left-title"><a>我的收藏</a></dd>
						<dt class=" list-group-item all-list-left-con"><a href="/e/member/fava/">收藏的商品</a></dt>
					</dl>
				</div>
				<!-- 左侧种类列表结束··············································· -->