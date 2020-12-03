<?php  
include("../check_login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>校园图书管理系统</title>
<link href="../css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<div>
    <?php include('../navigation.php');?>
  </div>
  <div class="content">
    <div class="position">
      <p align="left" >当前位置:图书档案管理 &gt;&gt;&gt;</p>
    </div>
    <div class="blist" align="center">
    <?php
    include("../conn/conn.php");
    $query=mysql_query("select book.barcode,book.id as bookid,book.bookname,bt.typename,pb.pubname,bc.name from tb_bookinfo book join tb_booktype bt on book.typeid=bt.id join tb_publishing pb on book.ISBN=pb.ISBN join tb_bookcase bc on book.bookcase=bc.id");
    $result=mysql_fetch_array($query);
    if($result==false){
    ?> 
    	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  			<tr>
  				<td width="87%">&nbsp;</td>
    			<td><a href="book_add.php">添加图书信息</a> </td>
  			</tr>
			</table>
    	<table width="100%" height="30"  border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="36" align="center">暂无图书信息！</td>
        </tr>
      </table>
 		<?php
		}else{
		?>
 		<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  		<tr>
    		<td width="87%">&nbsp;</td>
				<td width="13%"><a href="book_add.php">添加图书信息</a></td>	  
  		</tr>
		</table>  
  	<table width="98%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bordercolordark="#D2E3E6" bordercolorlight="#FFFFFF">
  		<tr align="center" bgcolor="#e3F4F7">
    		<td width="13%">条形码</td>  
    		<td width="26%">图书名称</td>
    		<td width="15%">图书类型</td>
    		<td width="14%">出版社</td>
   			<td width="12%">书架</td>
    		<td width="6%">修改</td>
   			<td width="5%">删除</td>
  		</tr>
		<?php do{ ?>
  		<tr>
    		<td style="padding:5px;">&nbsp;<?php echo $result['barcode'];?></td>  
    		<td style="padding:5px;"><a href="book_look.php?id=<?php echo $result['bookid'];?>"><?php echo $result['bookname'];?></a></td>
    		<td style="padding:5px;">&nbsp;<?php echo $result['typename'];?></td>  
    		<td style="padding:5px;">&nbsp;<?php echo $result['pubname'];?></td>  
    		<td style="padding:5px;">&nbsp;<?php echo $result['name'];?></td>  
    		<td align="center"><a href="book_modify.php?id=<?php echo $result['bookid'];?>">修改</a></td>
    		<td align="center"><a href="book_del.php?id=<?php echo $result['bookid'];?>">删除</a></td>
  		</tr>
		<?php
  	}while($result=mysql_fetch_array($query));
		}
		mysql_free_result($query);
		?>  
		</table>
  </div><br>
</div>
<div class="footer"><?php include("../copyright.php"); ?></div>
</div>
</body>
</html>