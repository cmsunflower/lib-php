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
<script language="jscript">
function check(form){
	if(form.name.value==""){
		alert("请输入读者姓名!");form.name.focus();return false;
	}
	if(form.barcode.value==""){
		alert("请输入条形码!");form.barcode.focus();return false;
	}
	if(form.paperNO.value==""){
		alert("请输入证件号码!");form.paperNO.focus();return false;
	}
}
</script>
</head>
<body>
<div class="container">
	<div><?php include("../navigation.php");?>
	</div>
	<div class="content">
		<div class="position">
			<p align="left" >当前位置：读者管理 &gt; 读者档案管理 &gt; 添加读者信息 &gt;&gt;&gt;</p>
		</div>
		<div align="center">
			<form name="form1" method="post" action="reader_ok.php">
			<table width="600" height="432"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
     		<tr>
        	<td width="173" align="center">姓名：</td>
        	<td width="427" height="39"><input name="name" type="text"> * </td>
      	</tr>
      	<tr>
        	<td width="173" align="center">性别：</td>
        	<td height="35"><input name="sex" type="radio" class="noborder" id="radiobutton" value="男" checked>
          <label for="radiobutton">男 </label>
          <label><input name="sex" type="radio" class="noborder" value="女">女</label></td>
      	</tr>
      	<tr>
        	<td align="center">条形码：</td>
        	<td><input name="barcode" type="text" id="barcode">* </td>
      	</tr>
      	<tr>
        	<td align="center">读者类型：</td>
        	<td><select name="typeid" class="wenbenkuang" id="typeid">
					<?php
  				include("../conn/conn.php");
  				$sql=mysql_query("select * from tb_readertype");
  				$info=mysql_fetch_array($sql);
  				do{
					?> 		
						<option value="<?php echo $info['id'];?>"><?php echo $info['name'];?></option>
					<?php
					}while($info=mysql_fetch_array($sql));
					?> 
        	</select></td>
      	</tr>
      	<tr>
        	<td align="center">职业：</td>
        	<td><input name="vocation" type="text" id="vocation"></td>
      	</tr>
      	<tr>
        	<td align="center">出生日期：</td>
        	<td><input name="birthday" type="text" id="birthday"></td>
      	</tr>
      	<tr>
        	<td align="center">有效证件：</td>
        	<td><select name="paperType" class="wenbenkuang" id="paperType">
          	<option value="身份证" selected>身份证</option>
          	<option value="学生证">学生证</option>
          	<option value="军官证">军官证</option>
          	<option value="工作证">工作证</option>
          </select></td>
      	</tr>
      	<tr>
        	<td align="center">证件号码：</td>
        	<td><input name="paperNO" type="text" id="paperNO"> * </td>
      	</tr>
      	<tr>
        	<td align="center">电话：</td>
        	<td><input name="tel" type="text" id="tel"></td>
      	</tr>
      	<tr>
        	<td align="center">E-mail：</td>
        	<td><input name="email" type="text" id="email" size="50">
          	<input name="operator" type="hidden" id="operator" value="<?php echo $_SESSION['admin_name'];?>"></td>
      	</tr>
      	<tr>
        	<td align="center">备注：</td>
        	<td><textarea name="remark" cols="50" rows="5" class="wenbenkuang" id="remark"></textarea></td>
      	</tr>
      	<tr>
        	<td align="center">&nbsp;</td>
        	<td><input name="Submit" type="submit" class="btn_grey" value="保存" onClick="return check(form1)">&nbsp;&nbsp;&nbsp;&nbsp;
						<input name="Submit2" type="button" class="btn_grey" value="返回" onClick="history.back()"></td>
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