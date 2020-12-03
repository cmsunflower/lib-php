<?php
if(!session_id()) session_start();   //初始化SESSION变量
include("conn/conn.php");//连接数据库文件
$query=mysql_query("select m.id,m.name,p.id,p.sysset,p.readerset,p.bookset,
	p.borrowback,p.sysquery from tb_manager as m left join (select * from tb_purview)
	as p on m.id=p.id where name='$_SESSION[admin_name]'");
$info=mysql_fetch_array($query);  //检索用户权限
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8;">
<link href="../css/style.css" rel="stylesheet">

<style type="text/css">

#menu { width:650px; height:35px; margin:0 auto; }
#menu ul { list-style: none; margin: 0px; padding: 0px; }
#menu ul li { float:left; margin-left:2px;padding: 0 12px;}
#menu ul li a { color:#fff;display:block;   height:28px; line-height:28px; text-align:center; font-size:14px;}
#menu ul li a:hover { color:red;}
#menu ul li ul { border:1px solid #ccc; display:none; position:absolute;}
#menu ul li ul li { float:none; padding: 0 12px; background:#eee; margin:0;text-align:center;}
#menu ul li ul li:hover {  background:#333;color:#fff;}
#menu ul li ul li a { color:#333; background:none;}
#menu ul li ul li a:hover { background:#333; color:#fff;}
#menu ul li:hover ul { display:block;}
#menu ul li.sfhover ul { display:block;}
</style>
<script type="text/javascript"><!--  //--><![CDATA[//><!--
function menuFix() {
  var sfEls = document.getElementById("menu").getElementsByTagName("li");
  for (var i = 0; i < sfEls.length; i++) {
    sfEls[i].onmouseover = function () {
      this.className += (this.className.length > 0 ? " " : "") + "sfhover";
    }
    sfEls[i].onMouseDown = function () {
      this.className += (this.className.length > 0 ? " " : "") + "sfhover";
    }
    sfEls[i].onMouseUp = function () {
      this.className += (this.className.length > 0 ? " " : "") + "sfhover";
    }
    sfEls[i].onmouseout = function () {
      this.className = this.className.replace(new RegExp("( ?|^)sfhover\\b"),
    "");
    }
  }
}
window.onload = menuFix;
//--><!]]>
</script>
</head>
<body>
<form>
	<table width="960" border="0" align="center" cellpadding="0" cellspacing="0" >
	<tr>
	  <td height="170" align="right" valign="bottom" bgcolor="#FFFFFF" style="background:url(../Images/banner.jpg) no-repeat center">
	  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		    <td height="26" align="right"><font color="red"><strong>当前登录的用户：</strong><?php echo $_SESSION['admin_name'];?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		  </tr>
		</table></td>
	</tr>
	<tr>
	  <td height="35" align="right" style="background:url(../Images/menu_line1.jpg) no-repeat center;" bgcolor="#DFDFDF">
	    <table width="960" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		    <td width="30"></td>
			<td width="180"><script type=text/javascript>
			document.write("<span id='labtime' width='120px' Font-Size='9pt'></span>")
			setInterval("labtime.innerText=new Date().toLocaleString()",1000)
			</script></td>
			<!--检索用户对应的权限，若权限为1，则说明该功能可用，并输出到浏览器，否则不显示-->
			<td width="750" align="right">
			<div id="menu">
				<ul>
				  <li><a href="../index.php"><strong>首页</strong></a></li>
				  <li><a href="">系统设置</a>
				    <ul>
				      <li><a href="<?php if($info['sysset']==1){ echo '../system/library_modify.php';}else{echo '../nopermissions.php';}?>">图书馆信息</a></li>
				      <li><a href="<?php if($info['sysset']==1){ echo '../manager/manager.php';}else{echo '../nopermissions.php';}?>">管理员设置</a></li>
				      <li><a href="<?php if($info['sysset']==1){ echo '../system/parameter_modify.php';}else{echo '../nopermissions.php';}?>">参数设置</a></li>
				      <li><a href="<?php if($info['sysset']==1){ echo '../book/bookcase.php';}else{echo '../nopermissions.php';}?>">书架设置</a></li>
				    </ul>
				  </li>
				  <li><a href="">读者管理</a>
				    <ul>
				      <li><a href="<?php if($info['readerset']==1){ echo '../reader/readerType.php';}else{echo '../nopermissions.php';}?>">读者类型</a></li>
				      <li><a href="<?php if($info['readerset']==1){ echo '../reader/reader.php';}else{echo '../nopermissions.php';}?>">读者档案</a></li>
				    </ul>
				  </li>
				  <li><a href="<?php if($info['bookset']==1){ echo '../book/book.php';}else{echo '../nopermissions.php';}?>">图书档案管理</a></li>
				  <li><a href="">图书借还</a>
				    <ul>
				      <li><a href="<?php if($info['borrowback']==1){ echo '../book/bookBorrow.php';}else{echo '../nopermissions.php';}?>">图书借阅</a></li>
				      <li><a href="<?php if($info['borrowback']==1){ echo '../book/bookRenew.php';}else{echo '../nopermissions.php';}?>">图书续借</a></li>
				      <li><a href="<?php if($info['borrowback']==1){ echo '../book/bookBack.php';}else{echo '../nopermissions.php';}?>">图书归还</a></li>
				    </ul>
				  </li>
				  <li><a href="">系统查询</a>
				    <ul>
				      <li><a href="<?php if($info['sysquery']==1){ echo '../book/bookQuery.php';}else{echo '../nopermissions.php';}?>">图书档案查询</a></li>
				      <li><a href="<?php if($info['sysquery']==1){ echo '../book/borrowQuery.php';}else{echo '../nopermissions.php';}?>">图书借阅查询</a></li>
				      <li><a href="<?php if($info['sysquery']==1){ echo '../book/bremind.php';}else{echo '../nopermissions.php';}?>">借阅到期提醒</a></li>
				    </ul>
				  </li>
 				  <li><a href="../manager/pwd_Modify.php">更改口令</a></li>
 				  <li><a href="../system/safequit.php">注销</a></li>
				 </ul>
				 </div>
			</td>
		  </tr>
		</table></td>
	</tr>
</table></form>
</body>
</html>