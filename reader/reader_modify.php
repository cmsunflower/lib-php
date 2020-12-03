
<?php  
include("../check_login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>校园图书管理系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8; ">
<link href="../css/style.css" rel="stylesheet">
<script language="javascript">
function check(form){
	if(form.name.value==""){
		alert("请输入读者姓名!");form.name.focus();return false;
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
			<p align="left" >当前位置：读者管理 &gt; 读者档案管理 &gt; 修改读者信息 &gt;&gt;&gt;</p>
		</div>
		<div align="center">
		<?php 
 		include("../conn/conn.php");
		$query=mysql_query("select * from tb_reader where id='".$_GET['id']."'");
		$result=mysql_fetch_array($query);
		?>
			<form name="form1" method="post" action="reader_modify_ok.php">
      <table width="600" height="432"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td width="173" align="center">姓名：</td>
          <td width="427" height="39">
            <input name="name" type="text" value="<?php echo $result['name'];?>">* 
        		<input name="readerid" type="hidden" id="readerid" value="<?php echo $result['id'];?>"></td>
        </tr>
        <tr>
          <td width="173" align="center">性别：</td>
          <td height="35">
		  			<input name="sex" type="radio" class="noborder" id="radiobutton"  value="男" <?php if($result['sex']=="男"){?> checked <?php }?>>男
          	<input name="sex" type="radio" class="noborder" value="女" <?php if($result['sex']=="女"){?> checked <?php }?>>女</td>
        </tr>
        <tr>
          <td align="center">条形码：</td>
          <td><input name="barcode" type="text" id="barcode" value="<?php echo $result['barcode'];?>"></td>
        </tr>
        <tr>
          <td align="center">读者类型：</td>
          <td>
            <select name="typeid" class="wenbenkuang" id="typeid">
		<?php
  	$sql=mysql_query("select * from tb_readertype");
  	$info=mysql_fetch_array($sql);
  	do{
		?>
              <option value="<?php echo $info['id'];?>" <?php if($result['typeid']==$info['id']){?> selected<?php }?>><?php echo $info['name'];?></option>
    <?php
		}while($info=mysql_fetch_array($sql));
		?>
            </select></td>
        </tr>
        <tr>
          <td align="center">职业：</td>
          <td><input name="vocation" type="text" id="vocation" value="<?php echo $result['vocation'];?>"></td>
        </tr>
        <tr>
          <td align="center">出生日期：</td>
          <td><input name="birthday" type="text" id="birthday" value="<?php echo $result['birthday'];?>"></td>
        </tr>
        <tr>
          <td align="center">有效证件：</td>
          <td>
						<select name="paperType" class="wenbenkuang" id="paperType">
              <option value="身份证" <?php if($result['paperType']=="身份证"){?> selected <?php }?>>身份证</option>
              <option value="学生证" <?php if($result['paperType']=="学生证"){?>  selected <?php }?>>学生证</option>
              <option value="军官证" <?php if($result['paperType']=="军官证"){?>  selected <?php }?>>军官证</option>
              <option value="工作证" <?php if($result['paperType']=="工作证"){?>  selected <?php }?>>工作证</option>
         	</select></td>
        </tr>
        <tr>
          <td align="center">证件号码：</td>
          <td><input name="paperNO" type="text" id="paperNO" value="<?php echo $result['paperNO'];?>">* </td>
        </tr>
        <tr>
          <td align="center">电话：</td>
          <td><input name="tel" type="text" id="tel" value="<?php echo $result['tel'];?>"></td>
        </tr>
        <tr>
          <td align="center">E-mail：</td>
          <td><input name="email" type="text" id="email" value="<?php echo $result['email'];?>" size="50"></td>
        </tr>
        <tr>
          <td align="center">备注：</td>
          <td><textarea name="remark" cols="50" rows="5" class="wenbenkuang" id="remark"><?php echo $result['remark'];?></textarea></td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
          <td><input name="Submit" type="submit" class="btn_grey" value="保存" onClick="return check(form1)">&nbsp;&nbsp;&nbsp;&nbsp;
        			<input name="Submit2" type="button" class="btn_grey" value="返回" onClick="history.back()"></td>
        </tr>
      </table>
    </form>
		</div>
	</div>
	<div class="footer"><?php include("../copyright.php"); ?></div>
</div>
</body>
</html>