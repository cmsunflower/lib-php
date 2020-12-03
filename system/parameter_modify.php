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
			<p align="left" >当前位置：系统设置 &gt; 参数设置 &gt;&gt;&gt;</p>
		</div>
		<div align="center">
		<form name="form1" method="post" action="parameter_modify_ok.php">
		<?php
		include("../conn/conn.php");
		$sql=mysql_query("select * from tb_parameter");
		$info=mysql_fetch_object($sql);
		?>
  			<table width="43%"  border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bordercolordark="#D2E3E6" bordercolorlight="#FFFFFF">
  				<tr align="center">
    				<td width="24%" align="left" style="padding:5px;">办证费：</td>
    				<td width="76%" align="left"><input name="cost" type="text" id="cost" value="<?php echo $info->cost; ?>" size="30">(元) </td>
    			<tr>
    				<td align="left" style="padding:5px;">有效期限：</td>
    				<td align="left"><input name="validity" type="text" id="validity" size="30" value="<?php echo $info->validity; ?>" >(月)</td>
    			</tr>
    			<tr>
      				<td height="65" align="left" style="padding:5px;">&nbsp;</td>
      				<td><input name="Submit" type="submit" class="btn_grey" value="保存">&nbsp;&nbsp;&nbsp;&nbsp;
        			<input name="Submit2" type="reset" class="btn_grey" value="取消"></td>
    			</tr>
			</table>
		</form>
		</div>
	</div>
	<div class="footer"><?php include("../copyright.php"); ?></div>
</div>
</body>
</html>