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
			<p align="left" >当前位置：读者管理 &gt; 读者档案管理 &gt;&gt;&gt;</p>
		</div>
		<div align="center">
		<?php 
		include("../conn/conn.php");
		$sql=mysql_query("select r.id,r.barcode,r.name,t.name as typename,r.paperType,r.paperNO,r.tel,r.email from tb_reader as r join (select * from tb_readertype) as t on r.typeid=t.id");
		$info=mysql_fetch_array($sql);
		if($info==false){
		?> 
		<table width="96%"  border="0" cellspacing="0" cellpadding="0">
			<tr>
  			<td width="87%">&nbsp;</td>
				<td width="13%"><a href="reader_add.php">添加读者信息</a></td>	  
  		</tr>
		</table>
		<table width="96%" height="30"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="36" align="center">暂无读者信息！</td>
      </tr>
    </table>
		<?php 
		}else{
  	?>
  	<table width="96%"  border="0" cellspacing="0" cellpadding="0">
  		<tr>
  			<td width="87%">&nbsp;</td>
				<td width="13%"><a href="reader_add.php">添加读者信息</a></td>	  
  		</tr>
		</table>  
  	<table width="96%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bordercolordark="#D2E3E6" bordercolorlight="#FFFFFF">
  		<tr align="center" bgcolor="#e3F4F7">
    		<td width="13%">条形码</td>  
    		<td width="10%">姓名</td>
    		<td width="8%">读者类型</td>
    		<td width="10%">证件类型</td>
    		<td width="18%">证件号码</td>
    		<td width="15%">电话</td>
    		<td width="15%">E-mail</td>
    		<td colspan="2">操作</td>
  		</tr>
		<?php 
		do{
		?> 
			<tr>
    		<td style="padding:5px;"><?php echo $info['barcode'];?> </td>  
    		<td style="padding:5px;"><a href="reader_info.php?id=<?php echo $info['id']; ?> "><?php echo $info['name'];?> </a></td>
    		<td style="padding:5px;"><?php echo $info['typename'];?> </td>
    		<td align="center"><?php echo $info['paperType'];?> </td>
    		<td align="center"><?php echo $info['paperNO'];?> </td>
    		<td>&nbsp;<?php echo $info['tel'];?> </td>
    		<td align="left">&nbsp;<?php echo $info['email'];?> </td>
    		<td width="6%" align="center"><a href="reader_modify.php?id=<?php echo $info['id'];?>">修改</a></td>
    		<td width="5%" align="center"><a href="reader_del.php?id=<?php echo $info['id'];?> ">删除</a></td>
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