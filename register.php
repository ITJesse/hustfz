<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  

<link rel="icon" href="/favicon.ico" mce_href="/favicon.ici" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" mce_href="/favicon.ico" type="image/x-icon">

<title>正在注册。。。</title>  
</head>  
<body>  
<?php
include('./include/config.php');
include('./include/functions.php');
if(!$_POST['username']){
    echo "<script>alert('请输入用户名！');history.go(-1);</script>";
}elseif((strlen($_POST['username'])<3 || strlen($_POST['username'])>12)){
    echo "<script>alert('用户名长度必须在3和10之间！');history.go(-1);</script>";
}elseif(!ereg("[0-9a-zA-Z]+",$_POST['username'])){
    echo "<script>alert('用户名只能是0-9,a-z,A-Z的字符！');history.go(-1);</script>";
}elseif(!$_POST['password1']){
    echo "<script>alert('请输入密码！');history.go(-1);</script>";
}elseif((strlen($_POST['password1'])<6 || strlen($_POST['password1'])>12)){
    echo "<script>alert('密码长度必须在6-20之间！');history.go(-1);</script>";
}elseif(!$_POST['password2']){
    echo "<script>alert('请验证密码！');history.go(-1);</script>";
}elseif(!$_POST['name']){
    echo "<script>alert('请输入名字！');history.go(-1);</script>";
}elseif(!preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",$_POST['name'])){
    echo "<script>alert('名字只能是中文！');history.go(-1);</script>";
}elseif((mb_strwidth($_POST['name'],'UTF8')<4 || mb_strwidth($_POST['name'],'UTF8')>10)){
    echo "<script>alert('名字长度必须在2-5个汉字之间！！');history.go(-1);</script>";
}elseif(!$_POST['grade']){
    echo "<script>alert('请输入年级！');history.go(-1);</script>";
}elseif(($_POST['grade']<1 || $_POST['grade']>4)){
    echo "<script>alert('请输入正确的年级！');history.go(-1);</script>";
}elseif(!$_POST['email']){
    echo "<script>alert('请输入Email！');history.go(-1);</script>"; 
}elseif(!check_email_address($_POST['email'])){
    echo "<script>alert('请输正确的Email地址！');history.go(-1);</script>";
}elseif(!($_POST['password1']==$_POST['password2'])){
    echo "<script>alert('两次输入密码不匹配！');history.go(-1);</script>";   	
}else{	
    $user=$_POST['username'];
	$name=$_POST['name'];
    $pwd=md5($_POST['password1']);
    $email=$_POST['email'];
    $grade=$_POST['grade'];
    $q1="SELECT * FROM fz_user WHERE username = '$user'"; 
    $q2="SELECT * FROM fz_user WHERE email = '$email'";
	$q3="SELECT * FROM fz_user WHERE name = '$name'";
    $result1=mysql_query($q1) or die("查询数据出错！".mysql_error());
	$result2=mysql_query($q2) or die("查询数据出错！".mysql_error());
	$result3=mysql_query($q3) or die("查询数据出错！".mysql_error());;
    $numrows1=mysql_num_rows($result1); 
    $numrows2=mysql_num_rows($result2); 
	$numrows3=mysql_num_rows($result3); 
    if (!($numrows1 == 0)) {  
        echo "<script>alert(\"用户 ".$user." 已存在！\");history.go(-1);</script>"; 
	}elseif(!($numrows2 == 0)) {
	    echo "<script>alert(\"Email ".$email." 已存在!\");history.go(-1);</script>";
	}elseif(!($numrows3 == 0)) {
	    echo "<script>alert(\"昵称 ".$name." 已存在!\");history.go(-1);</script>";
	}else{
        $q="INSERT INTO fz_user (username,name,grade,email,password) VALUES ('$user','$name','$grade','$email','$pwd')";
	    $result=mysql_query($q) or die("写入数据库出错！".mysql_error());
        echo "<script>alert('注册成功，现在去登陆！');window.location.href='login.php';</script>";
	}
	mysql_close();

}
?>

 
</body>  
</html> 