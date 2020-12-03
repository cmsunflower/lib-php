<?php session_start();?>
<?php  
include("../check_login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8; ">
<link href="../css/style.css" rel="stylesheet">
<script src="../JS/function.js"></script>
<script language="javascript">
function check(myform){
	if(myform.flag1.checked==false && myform.flag2.checked==false){
		alert("请选择查询方式!");return false;
	}
	if (myform.flag2.checked){
		if(myform.sdate.value==""){
			alert("请输入开始日期");myform.sdate.focus();return false;
		}		
		if(CheckDate(myform.sdate.value)){
			alert("您输入的开始日期不正确（如：2007-12-01）\n 请注意闰年!");myform.sdate.focus();return false;
		}
		if(myform.edate.value==""){
			alert("请输入结束日期");myform.edate.focus();return false;
		}		
		if(CheckDate(myform.edate.value)){
			alert("您输入的结束日期不正确（如：2007-12-01）\n 请注意闰年!");myform.edate.focus();return false;
		}
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
			<p align="left" >当前位置：图书借还 &gt; 图书借阅查询&gt;&gt;&gt;</p>
		</div>
		<div align="center" >
          <form name="myform" method="post" action="">
            <table width="96%" height="67"  border="0" cellpadding="1" cellspacing="0" bgcolor="#9ECFEE" class="tableBorder_gray">
              <tr>
                <td width="8%" rowspan="2" align="center">&nbsp;<img src="../Images/search.gif" width="37" height="29"></td>
                <td width="92%" height="29"><input name="flag1" type="checkbox" class="noborder" value="a" checked>
              请选择查询依据：
                <select name="f" class="wenbenkuang" id="f">
                  <option value="k.barcode" >图书条形码</option>
                  <option value="k.bookname">图书名称</option>
                  <option value="r.barcode">读者条形码</option>
                  <option value="r.name">读者名称</option>
                </select>
                <input name="key1" type="text" id="key1" size="50">
                <input name="Submit" type="submit" class="btn_grey" value="查询" onClick="return check(myform);"></td>
              </tr>
              <tr>
                <td height="26">
                  <input name="flag2" type="checkbox" class="noborder" id="flag" value="b">
              借阅时间： 从
              <input name="sdate" type="text" id="sdate">
              到
              <input name="edate" type="text" id="edate">
              (日期格式为：2007-12-01)</td>
              </tr>
            </table>
          </form>
          <?php 
include("../conn/conn.php");
$sql=mysql_query("select b.borrowTime,b.backTime,b.ifback,r.barcode as readerbarcode,r.name,k.id,k.barcode,k.bookname from tb_borrow b join tb_reader r on b.readerid=r.id join tb_bookinfo k on b.bookid=k.id");
@$subm=$_POST['Submit'];
if($subm!=""){
	$f=$_POST['f'];
	$key1=$_POST['key1'];
	$sdate=$_POST['sdate'];
	$edate=$_POST['edate'];
	$flag1=$_POST['flag1'];
	$flag2=$_POST['flag2'];
	if($flag1=="a"){
	$sql=mysql_query("select b.borrowTime,b.backTime,b.ifback,r.barcode as readerbarcode,r.name,k.id,k.barcode,k.bookname from tb_borrow b join tb_reader r on b.readerid=r.id join tb_bookinfo k on b.bookid=k.id where $f like '%$key1%'");
	}
	if($flag2=="b"){
	$sql=mysql_query("select b.borrowTime,b.backTime,b.ifback,r.barcode as readerbarcode,r.name,k.id,k.barcode,k.bookname from tb_borrow b join tb_reader r on b.readerid=r.id join tb_bookinfo k on b.bookid=k.id where borrowTime between '$sdate' and '$edate'");
	}
	if($flag1=="a" && $flag2=="b"){
	$sql=mysql_query("select b.borrowTime,b.backTime,b.ifback,r.barcode as readerbarcode,r.name,k.id,k.barcode,k.bookname from tb_borrow b join tb_reader r on b.readerid=r.id join tb_bookinfo k on b.bookid=k.id where borrowTime between '$sdate' and '$edate' and $f like '%$key1%'");
	}
}
$result=mysql_fetch_array($sql);
if($result==false){
?>
          <table width="100%" height="30"  border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="36" align="center">暂无图书借阅信息！</td>
            </tr>
          </table>
          <?php
}
else{
?>
          <table width="723"  border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bordercolordark="#D2E3E6" bordercolorlight="#FFFFFF">
            <tr align="center" bgcolor="#D0E9F8">
              <td width="13%">图书条形码</td>
              <td width="27%">图书名称</td>
              <td width="15%">读者条形码</td>
              <td width="11%">读者名称</td>
              <td width="13%">借阅时间</td>
              <td width="11%">归还时间</td>
              <td width="10%">是否归还</td>
            </tr>
            <?php
do{
if($result['ifback']=="0"){
		$ifbackstr="未归还";
}else{
		$ifbackstr="已归还";
}
?>
            <tr>
              <td style="padding:5px;">&nbsp;<?php echo $result['barcode'];?></td>
              <td style="padding:5px;"><a href="book_look.php?id=<?php echo $result['id']; ?>"><?php echo $result['bookname'];?></a></td>
              <td style="padding:5px;">&nbsp;<?php echo $result['readerbarcode'];?></td>
              <td style="padding:5px;">&nbsp;<?php echo $result['name'];?></td>
              <td style="padding:5px;">&nbsp;<?php echo $result['borrowTime'];?></td>
              <td style="padding:5px;">&nbsp;<?php echo $result['backTime'];?></td>
              <td style="padding:5px;">&nbsp;<?php echo $ifbackstr;?></td>
            </tr>
            <?php
	}while($result=mysql_fetch_array($sql));
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