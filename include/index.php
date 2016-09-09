<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php 
include("./include/config.php");
session_start();
if(!isset($_SESSION['username'])){
	$login="<p><a href=\"./login.php\">登录</a></p><p><a href=\"./register.html\">加入我们</a></p>";
}else{
    if($_SESSION['gm']==1){
        $login="<p>欢迎!</p><p>".$_SESSION['name']."</p><p><a href=\"./WTF/index.php\">进入后台</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"./logout.php\">注销</a></p>";
	}else{
	    $login="<p>欢迎!</p><p>".$_SESSION['name']."</p><p><a href=\"./logout.php\">注销</a></p>";
    }
}
?>
</body>
</html>