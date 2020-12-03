<meta http-equiv="Content-Type" content="text/html; charset=utf-8; ">
<?php
include("../conn/conn.php");
$id=$_GET['id'];
$sql=mysql_query("delete from tb_reader where id='$id'");
if($sql){
echo "<script language=javascript>alert('读者信息删除成功！');window.location.href='reader.php';</script>";
}
else{
echo "<script language=javascript>alert('读者信息删除失败！');window.location.href='reader.php';</script>";
}
?>