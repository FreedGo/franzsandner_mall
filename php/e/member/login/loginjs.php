<?php
require("../../class/connect.php");
if(!defined('InEmpireCMS'))
{
	exit();
}
eCheckCloseMods('member');//关闭模块
$myuserid=(int)getcvar('mluserid');
$mhavelogin=0;
if($myuserid)
{
	include("../../class/db_sql.php");
	include("../../member/class/user.php");
	include("../../data/dbcache/MemberLevel.php");
	$link=db_connect();
	$empire=new mysqlquery();
	$mhavelogin=1;
	//数据
	$myusername=RepPostVar(getcvar('mlusername'));
	$myrnd=RepPostVar(getcvar('mlrnd'));
	$r=$empire->fetch1("select ".eReturnSelectMemberF('userid,username,groupid,userfen,money,userdate,havemsg,checked')." from ".eReturnMemberTable()." where ".egetmf('userid')."='$myuserid' and ".egetmf('rnd')."='$myrnd' limit 1");
	if(empty($r[userid])||$r[checked]==0)
	{
		EmptyEcmsCookie();
		$mhavelogin=0;
	}
	//会员等级
	if(empty($r[groupid]))
	{$groupid=eReturnMemberDefGroupid();}
	else
	{$groupid=$r[groupid];}
	$groupname=$level_r[$groupid]['groupname'];
	//点数
	$userfen=$r[userfen];
	//余额
	$money=$r[money];
	//天数
	$userdate=0;
	if($r[userdate])
	{
		$userdate=$r[userdate]-time();
		if($userdate<=0)
		{$userdate=0;}
		else
		{$userdate=round($userdate/(24*3600));}
	}
	//是否有短消息
	$havemsg="";
	if($r[havemsg])
	{
		$havemsg="<a href='".$public_r['newsurl']."e/member/msg/' target=_blank><font color=red>您有新消息</font></a>";
	}
	//$myusername=$r[username];
	db_close();
	$empire=null;
}
if($mhavelogin==1)
{
?>
document.write("<font color=red><b><?=$myusername?></b></font>&nbsp;&nbsp;<a href=\"http://www.franzsandner.com/e/member/cp/\" target=\"_parent\">个人中心</a>&nbsp;&nbsp;<a href=\"http://www.franzsandner.com/e/member/doaction.php?enews=exit&ecmsfrom=9\" onclick=\"return confirm(\'确认要退出?\');\">退出</a>");
<?
}
else
{
?>
document.write("<form name=login method=post action=\"/e/member/doaction.php\" class=\"form-horizontal\"><input type=hidden name=enews value=login><input type=hidden name=prtype value=1>		        	   <div class=\"form-group\">					      <label for=\"firstname\" class=\"col-sm-2 control-label sr-only\">用户名</label>					      <div class=\"col-sm-8\">					         <input type=\"text\" class=\"form-control input-lg\" id=\"firstname\" 					            placeholder=\"请输入用户名\" name=\"username\">					      </div>					   </div>					   <div class=\"form-group\">					      <label for=\"lastname\" class=\"col-sm-2 control-label sr-only\">密码</label>					      <div class=\"col-sm-8\">					         <input type=\"password\" class=\"form-control input-lg\" id=\"lastname\" 					            placeholder=\"请输入密码\" name=\"password\">					      </div>					   </div>					   <div class=\"form-group\">					      <div class=\"col-sm-offset-2 col-sm-10\">					         <div class=\"checkbox\">					            <label>					               <input type=\"checkbox\"> 请记住我					            </label>					         </div>					      </div>					   </div>					   <div class=\"form-group\">					      <div class=\"col-sm-offset-2 col-sm-8\">					         <button type=\"submit\" class=\"btn btn-success btn-lg col-sm-6 go-login\">登录</button>					         <div class=\"go-reg f-l-l\"><a href=\"\">注册</a></div>					      </div>					   </div>		        </form>");
<?
}
?>