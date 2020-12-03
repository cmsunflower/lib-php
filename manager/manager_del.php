<meta http-equiv="Content-Type" content="text/html; charset=utf-8; ">
<?php
include("../conn/conn.php");
$id=$_GET['id']; //获取管理员ID
$sql=mysql_query("delete from tb_manager where id='$id'");//删除管理员表中与id对应的管理员信息
$query=mysql_query("delete from tb_purview where id='$id'");//删除权限表中与id对应的管理员权限
if($sql==true and $query==true ){
echo "<script language=javascript>alert('管理员删除成功！');history.back();</script>";
}
else{
echo "<script language=javascript>alert('管理员删除失败！');history.back();</script>";
}
?>