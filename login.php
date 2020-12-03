<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>校园图书管理系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="CSS/style.css" rel="stylesheet">
<script language="javascript">
	function check(form){  //自定义一个JS函数
		if (form.name.value=="") {  //若管理员名称为空，则弹出提示信息并重新返回焦点
			alert("请输入管理员名称!")；form.name.focus();return false;
		}
		if (form.pwd.value=="") {   //若管理员密码为空，则弹出提示信息并重新返回焦点
			alert("请输入密码!")；form.pwd.focus();return false;
		}
	}
</script>
</head>
<body>
<div class="container" >
<div class="header" style="height:205px"><?php include("navigation.php");?></div>
<div>
<form name="form1" method="post" action="chklogin.php">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="30%" bgcolor="#FFFFFF">&nbsp;</td>
			<td width="40%" style="background:url(Images/bg3.gif) no-repeat center;">
				<table width="603" height="325" border="0" align="center" cellpadding="0" cellspacing="0" bordercolorlight="#FFFFFF" bordercolordark="#D2E3E6">
				<tr>
					<td width="50%" height="75" align="center">&nbsp;</td>
					<td width="50%">&nbsp;</td>
				</tr>
				<tr>
					<td  height="30" width="100%"  align="center"><font  color="red"><strong>管理员名称：</strong></font><input name="name" type="txet" class="logininput" id="name3" size="25"></td>
					
				</tr>
				<tr>
					<td height="30" width="100%" align="center"><font  color="red"><strong>管理员密码：</strong></font><input name="pwd" type="password" class="logininput" id="pwd2" size="25"></td>
					
				</tr>
				<tr>
					<td height="30" align="center">
						<input name="submit" type="submit" class="btn_grey" value="确定" onClick="return check(form1)">&nbsp;
						<input name="submit3" type="reset" class="btn_grey" value="重置" >&nbsp;
						<input name="submit2" type="button" class="btn_grey" value="关闭" onClick="window.close();">
					</td>
					<td height="30" align="center" valign="top">&nbsp;</td>
				</tr>
				<tr>
          <td height="53" colspan="2" align="center"></td>
        </tr>
			</table></td>
			<td width="30%" bgcolor="#FFFFFF"><br></td>
		</tr>
	</table>
</form>
</div>
<div id="footer" align="center"><br>
<?php include("copyright.php"); ?>
</div>
</div>
</body>
</html>