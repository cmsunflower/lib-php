<meta http-equiv="Content-Type" content="text/html; charset=utf-8; ">
<?php
include("../conn/conn.php");
if($_POST['submit']!=""){
$name=$_POST['name'];          //获取管理员名称
$pwd=$_POST['pwd'];          //获取管理员密码
$sql=mysql_query("insert into tb_manager (name,pwd) values('$name','$pwd')");//向数据表中添加管理员信息，并根据添加结果给出提示信息
if($sql==true){
	echo "<script language=javascript>alert('管理员添加成功！');window.close();
	 window.opener.location.reload();
	 </script>";
}
else{
	echo "<script language=javascript>alert('管理员添加失败！');window.close();
	 window.opener.location.reload();</script>";
}
}
?>
