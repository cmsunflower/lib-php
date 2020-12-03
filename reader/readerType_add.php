<?php  
include("../check_login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>添加读者类型信息</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8; ">
<link href="../css/style.css" rel="stylesheet">
<script language="javascript">
function check(form){
	if(form.name.value==""){
		alert("请输入类型名称!");form.name.focus();return false;
	}
	if(form.number.value==""){
		alert("请输入可借数量!");form.number.focus();return false;
	}	
}
</script>
</head>
<body>
<div class="modify">
	<form name="form1" method="post" action="readerType_ok.php">
	<table height="100"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
       <td width="84" align="center">类型名称：</td>
       <td width="180" height="39"><input name="name" type="text" ></td>
    </tr>
    <tr>
      <td width="84" align="center">可借数量：</td>
      <td height="35"><input name="number" type="text" id="number">(本)</td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td><input name="Submit" type="submit" class="btn_grey" value="保存" onClick="check(form1)">&nbsp;
          <input name="Submit2" type="button" class="btn_grey" value="关闭" onClick="window.close();"></td>
    </tr>
  </table>
	</form>
</div>
</body>
</html>