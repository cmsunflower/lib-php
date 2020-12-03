<?php session_start();?>
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
			<p align="left" >当前位置：读者管理 &gt; 读者类型管理  &gt;&gt;&gt;</p>
		</div>
		<div align="center">
		<?php 
		include("../conn/conn.php");
		$sql=mysql_query("select * from tb_readertype");
		$info=mysql_fetch_array($sql);
		if($info==false){
		?>
			<table width="90%"  border="0" cellspacing="0" cellpadding="0">
  			<tr>
    			<td align="right"><a href="#" onClick="window.open('readerType_add.php','','width=334,height=200')">添加读者类型信息</a> </td>
				</tr>
			</table> 
      <table width="90%" height="30"  border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="36" align="center">暂无读者类型信息！</td>
        </tr>
      </table>
 		<?php
		}else{
 		?>
 			<table width="80%"  border="0" cellspacing="0" cellpadding="0">
  			<tr>
    			<td align="right"><a href="#" onClick="window.open('readerType_add.php','','width=334,height=200')">添加读者类型信息</a> </td>
				</tr>
			</table>  
  		<table width="80%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bordercolordark="#D2E3E6" bordercolorlight="#FFFFFF">
  			<tr align="center" bgcolor="#e3F4F7">
    			<td width="35%">读者类型名称</td>
    			<td width="35%">可借数量</td>
    			<td width="14%">删除</td>
  			</tr>
		<?php 
		do{
		?> 
  			<tr align="center">
    			<td style="padding:5px;">&nbsp;<?php echo $info['name'];?></td>
    			<td style="padding:5px;">&nbsp;<?php echo $info['number'];?></td>
    			<td align="center"><a href="readerType_del.php?id=<?php echo $info['id'];?>">删除</a></td>
  			</tr>
		<?php
  	}while($info=mysql_fetch_array($sql));
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