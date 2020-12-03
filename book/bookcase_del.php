<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<?php
include("../conn/conn.php");
$id=$_GET['id'];
$query=mysql_query("delete from tb_bookcase where id='$id'");
if($query){
	echo "<script language='javascript'>alert('书架删除成功！');history.go(-1);</script>";
}else{
	echo "<script language='javascript'>alert('书架删除失败！');history.go(-1);</script>";
}
?>