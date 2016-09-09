<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="/favicon.ico" mce_href="/favicon.ici" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" mce_href="/favicon.ico" type="image/x-icon">
<title>正在登陆。。。</title>
</head>
<body>
<?php
session_start();
include("./include/config.php");
include("./include/functions.php");
if ($_POST['username']){
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $q="SELECT * FROM fz_user WHERE username = '$username' AND password = '$password'";
	$result=mysql_query($q);
	$numrows=mysql_num_rows($result);
	if ($numrows == 1){
	    $row=mysql_fetch_assoc($result);
	    $_SESSION['username']=$row['username'];
	    $_SESSION['uid']=$row['id'];
        $_SESSION['name']=$row['name'];
		$_SESSION['gm']=$row['gm'];
		echo "<script>alert('登陆成功！');window.location.href='login.php';</script>";
	}else{
	    echo "<script>alert('登陆失败！');window.location.href='login.php';</script>";
	}
}else{
    echo "<script>alert('请通过正确途径登陆！');window.location.href='index.php';</script>";
}
mysql_free_result($result);
mysql_close($conn);
?>
</body>
</html>