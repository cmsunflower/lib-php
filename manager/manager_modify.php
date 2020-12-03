<?php session_start();?>
<?php  
include("../check_login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<link href="../css/style.css" rel="stylesheet">
</head>
<body>
<div class="modify">
<form name="form1" method="post" action="manager_modify_ok.php">
<?php 
include("../conn/conn.php");
$id=$_GET[id];
$query=mysql_query("select m.id,m.name,p.sysset,p.readerset,p.bookset,p.borrowback,p.sysquery from tb_manager as m left join (select * from tb_purview)as p on m.id=p.id where m.id='$id'");
$info=mysql_fetch_array($query);
?>
	<table height="126"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="85" height="29" align="center">管理员名称：		</td>
        <td width="173">
          <input name="id" type="hidden" value="<?php echo $info['id'];?>"><input name="name" type="text" readonly="yes" value="<?php echo $info['name'];?>">        </td>
      </tr>
      <tr>
        <td height="74" align="center">拥有的权限：</td>
        <td><table width="100%" height="67" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="47%"><input name="sysset" type="checkbox" class="noborder" id="sysset" value="1" <?php if($info['sysset']==1){ echo("checked");}?>>系统设置</td>
            <td width="53%"><input name="readerset" type="checkbox" class="noborder" id="readerset" value="1" <?php if($info['readerset']==1){ echo("checked");}?>>读者管理</td>
          </tr>
          <tr>
            <td><input name="bookset" type="checkbox" class="noborder" id="bookset" value="1" <?php if($info['bookset']==1){echo("checked");}?>>图书管理</td>
            <td><input name="borrowback" type="checkbox" class="noborder" id="borrowback" value="1" <?php if($info['borrowback']==1){echo("checked");}?>>图书借还</td>
          </tr>
          <tr>
            <td height="23"><input name="sysquery" type="checkbox" class="noborder" id="sysquery" value="1" <?php if($info['sysquery']==1){echo("checked");}?>>系统查询</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="15" align="center">&nbsp;</td>
        <td><input name="submit" type="submit" class="btn_grey" value="保存">&nbsp;
						<input name="Submit2" type="button" class="btn_grey" value="关闭" onClick="window.close();"></td>
      </tr>
    </table>
</form>
</div>
</body>
</html>