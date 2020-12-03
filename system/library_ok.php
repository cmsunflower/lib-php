<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
include("../conn/conn.php");
if($_POST['Submit']!=""){
$libraryname=$_POST['libraryname'];
$curator=$_POST['curator'];
$tel=$_POST['tel'];
$address=$_POST['address'];
$email=$_POST['email'];
$url=$_POST['url'];
$createDate=$_POST['createDate'];
$introduce=$_POST['introduce'];
$query=mysql_query("update tb_library set libraryname='$libraryname',curator='$curator',tel='$tel',address='$address',email='$email',url='$url',createDate='$createDate',introduce='$introduce'");
if($query==true){
	echo "<script language=javascript>alert('图书馆信息更新成功！');history.back();</script>";
}else{
	echo "<script language=javascript>alert('图书馆信息更新失败！');history.back();</script>";
}
}
?>