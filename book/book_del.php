<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<?php
include("../conn/conn.php");
$id=$_GET['id'];
$info_del=mysql_query("delete from tb_bookinfo where id='$id'");
if ($info_del) {
	echo "<script language='javascript'>alert('图书信息删除成功！');history.back();</script>";
}
?>