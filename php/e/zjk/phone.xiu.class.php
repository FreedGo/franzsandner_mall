<?php
	require('../class/connect.php'); //�������ݿ������ļ��͹��������ļ�
	require('../class/db_sql.php'); //�������ݿ�����ļ�
	$link=db_connect(); //����MYSQL
	$empire=new mysqlquery(); //�������ݿ������</p> <p>db_close(); //�ر�MYSQL����
	
	
	$yuan_phone=$_POST['yuan_phone'];
	$xin_phone=$_POST['xin_phone'];
	$que_phone=$_POST['que_phone'];
	$userid=$_POST['userid'];
	
if(empty($yuan_phone)){
	$yuan_phone=0;
}	
if(empty($xin_phone)){
	$xin_phone=0;
}	
if(empty($que_phone)){
	$que_phone=0;
}	
	
	$r=$empire->fetch1("select phone from {$dbtbpre}enewsmemberadd where userid='$userid'");
	if($yuan_phone==$r[phone]){
		if($que_phone==$xin_phone){
			//һ�����޸ĳɹ�
			$empire->query("UPDATE {$dbtbpre}enewsmemberadd SET phone = '$que_phone' WHERE userid='$userid' LIMIT 1");
			echo "1";//�޸ĳɹ�
		}else{
			echo "2";//�������벻һ��
		}
	}else{
		echo "3";//ԭ�������
	}
	
$empire=null; //ע�����������	

?>
<meta http-equiv="refresh" content="0;url=/e/member/my/">