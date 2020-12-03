<?php  
include("../check_login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>校园图书管理系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8; ">
<link href="../css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<div><?php include("../navigation.php");?>
	</div>
	<div class="content">
		<div class="position">
			<p align="left" >当前位置：系统设置 &gt; 书架设置 &gt;&gt;&gt;</p>
		</div>
		<div align="center">
			<?php
include("../conn/conn.php");       //连接数据源信息
$sql=mysql_query("select * from tb_bookcase order by id desc");      //查询图书书架信息表中的数据信息
$info=mysql_fetch_array($sql);      //执行SQL语句
if($info==false){      //如果图书书架信息表中为空值，则弹出“暂无书架信息”
?>
          <table width="80%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="84%">&nbsp;      </td>
<td width="16%" align="right">
      <a href="#" onClick="window.open('bookcase_add.php','','width=334,height=200')">添加书架信息&nbsp;</a> </td>    
  </tr>
</table> 
          <table width="80%" height="30"  border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="36" align="center">暂无书架信息！</td>
            </tr>
          </table>     
</table>
 <?php
}else{   //否则输出书架信息
  ?>
 <table width="80%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="84%">&nbsp;      </td>
<td width="16%" align="right">
      <a href="#" onClick="window.open('bookcase_add.php','','width=334,height=200')">添加书架信息&nbsp;</a> </td>	  
  </tr>
</table>  
  <table width="80%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bordercolordark="#D2E3E6" bordercolorlight="#FFFFFF">
  <tr align="center" bgcolor="#e3F4F7">
    <td width="80%">书架名称</td>
    <td width="20%">删除</td>
  </tr>
<?php
	do{    //应用do...while循环语句输出图书书架信息
?> 
  <tr>
    <td style="padding:5px;" align="center"><?php echo $info['name']; ?></td>
    <td align="center"><a href="bookcase_del.php?id=<?php echo $info['id'];?>">删除</a></td>
  </tr>
<?php
  }while($info=mysql_fetch_array($sql));          //do...while循环语句结束
}
?>  
</table>
		</div>
		<br>
	</div>
	<div class="footer"><?php include("../copyright.php"); ?></div>
</div>
</body>
</html>