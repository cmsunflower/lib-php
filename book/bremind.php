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
</head>
<body>
<div class="container">
	<div><?php include("../navigation.php");?>
	</div>
	<div class="content">
		<div class="position">
			<p align="left" >当前位置：系统查询 &gt; 借阅到期提醒 &gt;&gt;&gt;</p>
		</div>
		<div align="center">
		<?php 
		include("../conn/conn.php");
		$time=date("Y-m-d");
		$sql=mysql_query("select book.barcode,book.bookname,reader.barcode as readerbarcode,reader.name,borr.borrowTime,borr.backTime,borr.ifback from tb_bookinfo book join tb_borrow  as borr on book.id=borr.bookid join tb_reader as reader on borr.readerid=reader.id  where borr.backTime<='$time' and borr.ifback=0");
		$info=mysql_fetch_array($sql);
		if($info==false){
		?>
			<table width="96%" height="30"  border="0" cellpadding="0" cellspacing="0">
            	<tr>
              		<td height="36" align="center">暂无到期提醒信息！</td>
            	</tr>
          	</table>
        <?php
		}else{
		?>
        	<table width="96%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bordercolordark="#D2E3E6" bordercolorlight="#FFFFFF">
  				<tr align="center" bgcolor="#e3F4F7">
    				<td width="15%">图书条形码</td>
    				<td width="28%">图书名称</td>
    				<td width="17%">读者条形码</td>
    				<td width="9%">读者名称</td>
    				<td width="15%">借阅时间</td>
    				<td width="16%">应还时间</td>
    			</tr>
		<?php
		do{
		?>
  				<tr>
    				<td style="padding:5px;">&nbsp;<?php echo $info['barcode'];?></td>
    				<td style="padding:5px;"><?php echo $info['bookname'];?></td>
   					<td style="padding:5px;">&nbsp;<?php echo $info['readerbarcode'];?></td>
    				<td style="padding:5px;">&nbsp;<?php echo $info['name'];?></td>
    				<td style="padding:5px;">&nbsp;<?php echo $info['borrowTime'];?></td>
    				<td style="padding:5px;">&nbsp;<?php echo $info['backTime'];?></td>
    			</tr>
		<?php
  		}while($info=mysql_fetch_array($sql));
		}
		?>
			</table>
		</div>
		<br>
	</div>
	<div class="footer"><?php include("../copyright.php"); ?></div>
</div>
</body>
</html>