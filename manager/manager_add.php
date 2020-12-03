<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>添加管理员</title>
<link href="../css/style.css" rel="stylesheet">
<script src="../JS/function.JS"></script>
</head>
<body>
<div class="modify">
	<form name="form1" method="post" action="manager_ok.php">
	<table height="123"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="97" height="30" align="center">管理员名称：</td>
        <td width="126">
          <input name="name" type="text"> </td>
      </tr>
      <tr>
        <td height="28" align="center">管理员密码：</td>
        <td><input name="pwd" type="password" id="pwd"></td>
      </tr>
      <tr>
        <td height="28" align="center">确认密码：</td>
        <td><input name="pwd1" type="password" id="pwd1"></td>
      </tr>
      <tr>
        <td height="37" align="center">&nbsp;</td>
        <td><input name="submit" type="submit" class="btn_grey" value="保存" onClick="check(form1)">&nbsp;
			<input name="submit2" type="button" class="btn_grey" value="关闭" onClick="window.close();"></td>
      </tr>
    </table>
	</form>
</div>
</body>
</html>