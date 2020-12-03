<?php session_start();?>
<?php  
include("../check_login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8; ">
<link href="../css/style.css" rel="stylesheet">
<script src="../JS/function.JS"></script>
</head>
<body>
<div class="container">
	<div><?php include("../navigation.php");?>
	</div>
	<div class="content">
		<div class="position">
			<p align="left" >当前位置：更改口令 &gt;&gt;&gt;</p>
		</div>
		<div align="center">
			<form name="form1" method="post" action="pwd_ok.php">
  <table width="47%"  border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bordercolordark="#D2E3E6" bordercolorlight="#FFFFFF">
<?php
include("../conn/conn.php");
$query3=mysql_query("select pwd from tb_manager where name='$_SESSION[admin_name]'");
$info3=mysql_fetch_array($query3);
?>
  <tr align="center">
    <td width="27%" align="left" style="padding:5px;">管理员名称：</td>
    <td width="73%" align="left">
      <input name="name" type="text" id="name" value="<?php echo $_SESSION['admin_name'];?>" readonly="yes" size="30">    </td>
    <tr>
    <td align="left" style="padding:5px;">原密码：</td>
    <td align="left"><input name="oldpwd" type="password" id="oldpwd" size="30">
      <input name="holdpwd" type="hidden" id="holdpwd" value="<?php echo $info3['pwd'];?>"></td>
    </tr>
    <tr>
      <td align="left" style="padding:5px;">新密码：</td>
      <td align="left"><input name="pwd" type="password" id="pwd" size="30"></td>
    </tr>
    <tr>
      <td align="left" style="padding:5px;">确认新密码：</td>
      <td align="left"><input name="pwd1" type="password" id="pwd1" size="30"></td>
    </tr>
    <tr>
      <td height="65" align="left" style="padding:5px;">&nbsp;</td>
      <td><input name="Submit" type="submit" class="btn_grey" value="保存" onClick="return checkForm(form1)">
        &nbsp;
        <input name="Submit2" type="reset" class="btn_grey" value="取消"></td>
    </tr>
</table>
</form>
		</div>
	<br>
	</div>
	<div class="footer"><?php include("../copyright.php"); ?></div>
</div>
</body>
</html>