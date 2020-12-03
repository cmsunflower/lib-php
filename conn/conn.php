<?php
	// 绑定链接
     $conn=mysql_connect(主机,用户名,密码) or die("数据库服务器连接错误".mysql_error());
	 // 数据库配置文件
     mysql_select_db("数据库名",$conn) or die("数据库访问错误".mysql_error());
     mysql_query("set names utf8");
	 
?>
