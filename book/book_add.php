<?php  
include("../check_login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>校园图书管理系统</title>
<link href="../css/style.css" rel="stylesheet">
<script language="javascript">
function check(form){
	if(form.barcode.value==""){
		alert("请输入条形码1!");form.barcode.focus();return false;
	}
	if(form.bookName.value==""){
		alert("请输入图书姓名!");form.bookName.focus();return false;
	}
	if(form.price.value==""){
		alert("请输入图书定价!");form.price.focus();return false;
	}
form.submit();
}
</script>
</head>
<body>
<div class="container">
	<div><?php include("../navigation.php");?></div>
  <div class="content">
    <div class="position">
      <p align="left" >当前位置：图书档案管理 &gt; 添加图书信息 &gt;&gt;&gt;</p>
    </div>
    <div align="center">
    	<form name="form1" method="post" action="book_ok.php">
			<table width="600" height="432"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      	<tr>
        	<td width="173" align="center">条&nbsp;形&nbsp;码：</td>
        	<td width="427" height="39"><input name="barcode" type="text" id="barcode"></td>
      	</tr>
      	<tr>
        	<td align="center">图书名称：</td>
        	<td height="39"><input name="bookName" type="text" id="bookName" size="50"> * </td>
      	</tr>
      	<tr>
        	<td align="center">图书类型：</td>
        	<td><select name="typeId" class="wenbenkuang" id="typeId">
					<?php 
        	include("../conn/conn.php");
					$sql=mysql_query("select * from tb_booktype");
					$info=mysql_fetch_array($sql);
					do{
					?> 		
        		<option value="<?php echo $info['id'];?>"><?php echo $info['typename'];?></option>
					<?php }while($info=mysql_fetch_array($sql));?> 
        	</select></td>
      	</tr>
      	<tr>
        	<td align="center">作&nbsp;&nbsp;者：</td>
        	<td><input name="author" type="text" id="author" size="40"></td>
      	</tr>
      	<tr>
        	<td align="center">译&nbsp;&nbsp;者：</td>
        	<td><input name="translator" type="text" id="translator" size="40"></td>
      	</tr>
      	<tr>
        	<td align="center">出&nbsp;版&nbsp;社：</td>
        	<td><select name="isbn" class="wenbenkuang">
					<?php
					$sql2=mysql_query("select * from tb_publishing");
					$info2=mysql_fetch_array($sql2);
					do{
					?> 		
        		<option value="<?php echo $info2['ISBN'];?>"><?php echo $info2['pubname'];?></option>
					<?php }while($info2=mysql_fetch_array($sql2));?> 
        	</select></td>
      	</tr>
      	<tr>
        	<td align="center">价&nbsp;&nbsp;格：</td>
       		<td><input name="price" type="text" id="price">(元)</td>
      	</tr>
      	<tr>
        	<td align="center">页&nbsp;&nbsp;码：</td>
        	<td><input name="page" type="text" id="page"></td>
      	</tr>
      	<tr>
        	<td align="center">书&nbsp;&nbsp;架：</td>
        	<td><select name="bookcaseid" class="wenbenkuang" id="bookcaseid">
					<?php
					$sql3=mysql_query("select * from tb_bookcase");
					$info3=mysql_fetch_array($sql3);
					do{
					?> 		
          	<option value="<?php echo $info3['id'];?>"><?php echo $info3['name'];?></option>
					<?php }while($info3=mysql_fetch_array($sql3));?> 
        	</select><input name="operator" type="hidden" id="operator" value="<?php echo $info3['name'];?>"></td>
      	</tr>
      	<tr>
      		<td align="center">库&nbsp;&nbsp;存：</td>
        	<td><input name="storage" type="text" id="storage"></td>
      	</tr>
		<input name="operator" type="hidden" id="operator" value="<?php echo $info3['name'];?>">
      	<tr>
      		<td align="center">&nbsp;</td>
        	<td><input name="Submit" type="submit" class="btn_grey" value="保存" onClick="return check(form1)">&nbsp;
							<input name="Submit2" type="button" class="btn_grey" value="返回" onClick="history.back();"></td>
      	</tr>
    	</table>
			</form>
    </div>
   </div><br>
</div>
<div class="footer"><?php include("../copyright.php"); ?></div>
</div>
</body>
</html>