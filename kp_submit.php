<?php
session_start();
include('./include/config.php');
include('./include/functions.php');
if(!isset($_SESSION['uid'])){
    echo "<script>alert('请先登录！');window.location.href='login.php';</script>";
}elseif(!$_POST['name']){
    echo "<script>alert('请输入名字！');history.go(-1);</script>";
}elseif(!preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",$_POST['name'])){
    echo "<script>alert('名字只能是中文！');history.go(-1);</script>";
}elseif((mb_strwidth($_POST['name'],'UTF8')<4 || mb_strwidth($_POST['name'],'UTF8')>10)){
    echo "<script>alert('名字长度必须在2-5个汉字之间！！');history.go(-1);</script>";
}elseif(!$_POST['grade']){
    echo "<script>alert('请选择年级！');history.go(-1);</script>";
}elseif(($_POST['grade']<4 || $_POST['grade']>6)){
    echo "<script>alert('请输入正确的年级！');history.go(-1);</script>";
}elseif(!($_POST['goodat'])){
    echo "<script>alert('两次输入密码不匹配！');history.go(-1);</script>";
}elseif((mb_strwidth($_POST['goodat'],'UTF8')<2 || mb_strwidth($_POST['goodat'],'UTF8')>10)){
    echo "<script>alert('你似乎有一些很奇怪的特长~');history.go(-1);</script>";   	
}elseif((strlen($_POST['class'])!=2)||!ereg("[0-9]+",$_POST['class'])){
	echo "<script>alert('班级只能是两位数字哦~');history.go(-1);</script>"; 
}else{
	$uid=$_SESSION['uid'];
	$q1="SELECT * FROM kp_user WHERE uid = '$uid'"; 
    $result1=mysql_query($q1) or die("查询数据出错！".mysql_error());
    $numrows1=mysql_num_rows($result1); 
    if (!($numrows1 == 0)) {  
        echo "<script>alert(\"你已经报名过了！\");window.location.href='index.php';</script>"; 
    }else{
		$name=$_POST['name'];
		$grade=$_POST['grade'];
		$class=$_POST['class'];
		$goodat=$_POST['goodat'];
		$sql="INSERT INTO kp_user (uid,name,grade,class,goodat,time) VALUES ('$uid','$name','$grade','$class','$goodat',NOW())";
		mysql_query($sql) or die("写入数据库出错！".mysql_error());
        echo "<script>alert('信息登记成功！请随时登陆大附中主页查看您的审核情况~');window.location.href='index.php';</script>";
	}
}