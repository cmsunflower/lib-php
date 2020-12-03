<?php session_start();?>
<?php  
include("check_login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>校园图书管理系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8; ">
<link href="css/style.css" rel="stylesheet">
</head>
<body>

<div class="container">
	
	<div><?php include("navigation.php");?></div>
	
	<div class="content">
		<div align="center">
			<table width="738" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="753" height="44" background="Images/main_booksort.gif">&nbsp;</td>
				</tr>
				<tr>
					<td height="72" valign="top" background="Images/main_booksort_1.gif"><table width="740" border="1px" cellpadding="0" cellspacing="0" bordercolor="#DFDFDF" bordercolordark="#D2E3E6" bordercolorlight="#FFFFFF">
					<tr align="center">
						<td width="4%" height="25">排名</td>
						<td width="10%" >图书条形码</td>
						<td width="22%" >图书名称</td>
						<td width="11%" >图书类型</td>
						<td width="9%" >书架</td>
						<td width="13%" >出版社</td>
						<td width="15%" >作者</td>
						<td width="8%" >定价（元）</td>
						<td width="8%" >借阅次数</td>
					</tr>
					<?php 
					include("conn/conn.php");
					$sql=mysql_query("select * from (select bookid,count(bookid) as degree from 
						tb_borrow group by bookid) as borr join (select b.*,c.name as bookcasename,
						p.pubname,t.typename from tb_bookinfo b left join tb_bookcase c on b.bookcase=c.id 
						join tb_publishing p on b.ISBN=p.ISBN join tb_booktype t on b.typeid=t.id where b.del=0) 
						as book on borr.bookid=book.id order by borr.degree desc limit 10");
					$info=mysql_fetch_array($sql);  //检索图书借阅信息
					$i=1;
					do{         //循环语句显示图书信息
					?>
					<tr>
						<td height="25" align="center"><?php echo $i; ?></td>
						<td style="padding:5px;">&nbsp;<?php echo $info['barcode']; ?></td>
						<td style="padding:5px;"><?php echo $info['bookname']; ?></td>
						<td style="padding:5px;"><?php echo $info['typename']; ?></td>
						<td align="center">&nbsp;<?php echo $info['bookcasename']; ?></td>
						<td align="center">&nbsp;<?php echo $info['pubname']; ?></td>
						<td align="center"><?php echo $info['author']; ?></td>
						<td align="center"><?php echo $info['price']; ?></td>
						<td align="center"><?php echo $info['degree']; ?></td>
					</tr>
					<?php 
					$i=$i+1;           //变量自加1
					}while($info=mysql_fetch_array($sql));  //循环语句结束
					?>
					</table></td>
				</tr>
				<tr>
					<td height="19" background="Images/main_booksort_2.gif">&nbsp;</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="footer"><?php include("copyright.php"); ?></div>
</div>
</body>
</html>