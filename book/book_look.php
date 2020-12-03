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
<script language="javascript">
function history_back(){
window.location.href="bookQuery.php";
}
</script>
</head>
<body>
<div class="container">
	<div>
    <?php 
  include('../navigation.php');
  ?>
	</div>
	<div class="content">
		<div class="position">
			<p align="left" >当前位置：图书档案管理 &gt; 图书详细信息 &gt;&gt;&gt;</p>
		</div>
		<div align="center">
		<?php 
        include("../conn/conn.php");
        $sql=mysql_query("select book.barcode,book.id as bookid,book.bookname,bt.typename,book.author,book.translator,pb.pubname,book.price,book.page,bc.name from tb_bookinfo book join tb_booktype bt on book.typeid=bt.id join tb_publishing pb on book.ISBN=pb.ISBN join tb_bookcase bc on book.bookcase=bc.id where book.id=$_GET[id]");
		$info=mysql_fetch_array($sql);
		?>
	<table width="600" height="432"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td width="173" align="center">条&nbsp;形&nbsp;码：</td>
        <td width="427" height="39">
          <input name="barcode" type="text" id="barcode" value="<?php echo $info['barcode'];?>"></td>
      </tr>
      <tr>
        <td align="center">图书名称：</td>
        <td height="39"><input name="bookName" type="text" id="bookName" value="<?php echo $info['bookname'];?>" size="50"> 
        * </td>
      </tr>
      <tr>
        <td align="center">图书类型：</td>
        <td>
		<input type="text" value="<?php echo $info['typename'];?>">
         </td>
      </tr>
      <tr>
        <td align="center">作&nbsp;&nbsp;者：</td>
        <td><input name="author" type="text" id="author" value="<?php echo $info['author'];?>" size="40"></td>
      </tr>
      <tr>
        <td align="center">译&nbsp;&nbsp;者：</td>
        <td><input name="translator" type="text" id="translator" value="<?php echo $info['translator'];?>" size="40"></td>
      </tr>
      <tr>
        <td align="center">出&nbsp;版&nbsp;社：</td>
        <td>
		<input name="isbn" type="text" class="wenbenkuang" value="<?php echo $info['pubname'];?>">
        </td>
      </tr>
      <tr>
        <td align="center">价&nbsp;&nbsp;格：</td>
        <td><input name="price" type="text" id="price" value="<?php echo $info['price'];?>">
        (元)</td>
      </tr>
      <tr>
        <td align="center">页&nbsp;&nbsp;码：</td>
        <td><input name="page" type="text" id="page" value="<?php echo $info['page'];?>"></td>
      </tr>
      <tr>
        <td align="center">书&nbsp;&nbsp;架：</td>
        <td><input name="bookcaseid" class="wenbenkuang" value="<?php echo $info['name'];?>">
      </tr>
      <tr>
        <td colspan="2" align="center">
			  <input name="Submit2" type="button" class="btn_grey" value="返回" onClick="history_back();"></td>
        </tr>
    </table>	
		</div>
	</div>
	<div class="footer"><?php include("../copyright.php"); ?></div>
</div>
</body>
</html>