<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 
session_start();           //初始化
$A_name=$_POST['name'];          //接收表单提交的用户名
$A_pwd=$_POST['pwd'];           //接收表单提交的密码
class chkinput              //定义类
{
	var $name;
	var $pwd;
	function chkinput($x,$y)
	{
		$this->name=$x;
		$this->pwd=$y;
		
	}
	function checkinput()
	{
		include("conn/conn.php"); 		  //连接数据源 
		$sql=mysql_query("select * from tb_manager where name='".$this->name."'and pwd='".$this->pwd."'",$conn);
		$info=mysql_fetch_array($sql);   //检索管理员名称和密码是否正确，并弹出相关提示信息
		if ($info==false) {
			echo "<script language='javascript'>alert('您输入的管理员名称错误，请重新输入！');history.back();</script>";
			exit;
		}
		else{
			echo "<script>alert('管理员登录成功!');window.location='index.php';</script>";
			$_SESSION[admin_name]=$info[name];
			$_SESSION[pwd]=$info[pwd];
		}
	}
}
$obj=new chkinput(trim($A_name),trim($A_pwd));    //创建对象
$obj->checkinput();    				    //调用类
?>