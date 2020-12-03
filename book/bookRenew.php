<?php session_start();?>
<?php  
include("../check_login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8; ">
<link href="../css/style.css" rel="stylesheet">
<script src="../JS/function.JS"></script>
</head>
<body>
<div class="container">
	<div><?php include("../navigation.php");?>
	</div>
	<div class="content">
		<div class="position">
			<p align="left" >当前位置：图书借还 &gt; 图书续借 &gt;&gt;&gt;</p>
		</div>
		<div class="bolist" align="center">
			<?php
include("../conn/conn.php");
@$sql=mysql_query("select r.*,t.name as typename,t.number from tb_reader r left join tb_readerType t on r.typeid=t.id where r.barcode='".$_POST[barcode]."'");
//$sql=mysql_query("select borr.id as borrid,borr.borrowTime,borr.backTime,borr.ifback,r.*,t.name as typename,t.number,book.bookname,book.price,pub.pubname,bc.name as bookcase from tb_borrow as borr join tb_reader r on borr.readerid=r.id join tb_readerType t on r.typeid=t.id join tb_bookinfo as book on book.id=borr.bookid join tb_publishing as pub on book.ISBN=pub.ISBN  join tb_bookcase as bc on book.bookcase=bc.id where r.barcode='".$_POST["barcode"]."' and borr.ifback=0");
$info=mysql_fetch_array($sql);
 ?>
		<form name="form1" method="post" action="" >
		<table width="96%" border="0" cellpadding="0" cellspacing="0" class="tableBorder_gray">
   <tr>
     <td valign="top"><table width="100%" border="0" cellpadding="02" cellspacing="2" bordercolor="#AABBBD">
       <tr>
         <td width="739" height="34" background="../Images/bookxj.gif">&nbsp;</td>
       </tr>
       <tr>
         <td valign="top" bgcolor="#D2E5F1">

		 <table width="96%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
           <tr>
             <td width="33%"><table width="100%" height="74" border="0" cellpadding="0" cellspacing="0">
               <tr>
                 <td height="27" colspan="2" align="center"><table width="90%" height="21" border="0" cellpadding="0" cellspacing="0">
                   <tr>
                     <td width="132" background="../Images/bg_line.gif">&nbsp;</td>
                     <td>&nbsp;</td>
                   </tr>
                 </table></td>
               </tr>
               <tr>
                 <td width="8%" height="27">&nbsp;</td>
                 <td width="92%">读者条形码：</td>
               </tr>
               <tr>
                 <td height="27" colspan="2" align="center"><input name="barcode" type="text" id="barcode" value="<?php echo $info['barcode'];?>" size="24">
                   &nbsp;
                   <input name="Button" type="button" class="btn_grey" value="确定" onClick="checkreader(form1)"></td>
               </tr>
             </table></td>
             <td width="1%" align="center" valign="bottom"><img src="../Images/borrow_fg.gif" width="18" height="111"></td>
             <td width="66%" align="right">
			 <table width="96%" border="0" cellpadding="0" cellspacing="0">
               <tr>
                 <td height="27">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：
                       <input name="readername" type="text" id="readername" value="<?php echo $info['name'];?>"></td>
                 <td>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：
                   <input name="sex" type="text" id="sex" value="<?php echo $info['sex'];?>"></td>
               </tr>
               <tr>
                 <td height="27">证件类型：
                   <input name="paperType" type="text" id="paperType" value="<?php echo $info['paperType'];?>"></td>
                 <td>证件号码：
                   <input name="paperNo" type="text" id="paperNo" value="<?php echo $info['paperNO'];?>"></td>
               </tr>
               <tr>
                 <td height="27">读者类型：
                   <input name="readerType" type="text" id="readerType" value="<?php echo $info['typename'];?>"></td>
                 <td>可借数量：
                   <input name="number" type="text" id="number" value="<?php echo $info['number'];?>" size="17">
                   册
                   &nbsp;</td>
               </tr>
             </table>			 </td>
           </tr>
         </table>		 </td>
       </tr>
       <tr>
         <td valign="top" bgcolor="#D2E5F1"><table width="100%" height="35" border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#D2E3E6" bgcolor="#FFFFFF">
                   <tr align="center" bgcolor="#e3F4F7">
                     <td width="24%" height="25" bgcolor="#F1F9FF">图书名称</td>
                     <td width="12%" bgcolor="#F1F9FF">借阅时间</td>
                     <td width="13%" bgcolor="#F1F9FF">应还时间</td>
                     <td width="14%" bgcolor="#F1F9FF">出版社</td>
                     <td width="12%" bgcolor="#F1F9FF">书架</td>
                     <td bgcolor="#F1F9FF">定价(元)</td>
                     <td width="12%" bgcolor="#F1F9FF"><input name="Button22" type="button" class="btn_grey" value="完成续借" onClick="window.location.href='bookRenew.php'"></td>
                   </tr>
<?php 
if($info){
$readerid=$info['id'];
$sql1=mysql_query("select r.*,borr.borrowTime,borr.backTime,book.bookname,book.price,pub.pubname,bc.name as bookcase from tb_borrow as borr join tb_bookinfo as book on book.id=borr.bookid join tb_publishing as pub on book.ISBN=pub.ISBN  join tb_bookcase as bc on book.bookcase=bc.id join tb_reader as r on borr.readerid=r.id  where borr.readerid='$readerid' and borr.ifback=0");
//$sql1=mysql_query("select t.days from tb_bookinfo b left join tb_booktype t on b.typeid=t.id where b.barcode='".$_POST[barcode]."'");
$info1=mysql_fetch_array($sql1);
$borrowNumber=mysql_num_rows($sql1);     //获取结果集中行的数目
do{
?>
                     <tr>
                       <td height="25" style="padding:5px;">&nbsp;<?php echo $info1['bookname'];?></td>
                       <td style="padding:5px;">&nbsp;<?php echo $info1['borrowTime'];?></td>
                       <td style="padding:5px;">&nbsp;<?php echo $info1['backTime'];?></td>
                       <td align="center">&nbsp;<?php echo $info1['pubname'];?></td>
                       <td align="center">&nbsp;<?php echo $info1['bookcase'];?></td>
                       <td width="14%" align="center">&nbsp;<?php echo $info1['price'];?></td>
                       <td width="12%" align="center"><a href="borrow_oncemore.php?barcode=<?php echo $info['barcode'];?>&borrid=<?php echo $info['borrid'];?>&backTime=<?php echo $info['backTime'];?>">续借</a>&nbsp;</td>
                     </tr>
<?php 
}while($info1=mysql_fetch_array($sql1));
/*do{ ?>
                   <tr>
                     <td height="25" style="padding:5px;">&nbsp;<?php echo $info['bookname'];?></td>
                     <td style="padding:5px;">&nbsp;<?php echo $info['borrowTime'];?></td>
                     <td style="padding:5px;">&nbsp;<?php echo $T=$info['backTime'];?></td>
                     <td align="center">&nbsp;<?php echo $info['pubname'];?></td>
                     <td align="center">&nbsp;<?php echo $info['bookcase'];?></td>
                     <td width="13%" align="center">&nbsp;<?php echo $info['price'];?></td>
                     <td width="12%" align="center"><a href="borrow_oncemore.php?barcode=<?php echo $info['barcode'];?>&borrid=<?php echo $info['borrid'];?>&backTime=<?php echo $info['backTime'];?>">续借</a>&nbsp;</td>
                   </tr>
<?php }while($info=mysql_fetch_array($sql));*/

}?>
                 </table>                 </td>
       </tr>
     </table></td>
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