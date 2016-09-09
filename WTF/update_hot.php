<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="/favicon.ico" mce_href="/favicon.ici" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" mce_href="/favicon.ico" type="image/x-icon">
<title>重新计算Hot评分中。。。</title>
</head>
<body>
<?php
include("../include/config.php");
include("./include/check.php");
echo "<p>正在计算老师的数量。。。</p>";
$q1="SELECT * FROM fz_teachers ORDER BY id DESC";
$result1=mysql_query($q1) or die("数据查询失败！".mysql_error());
$row1=mysql_fetch_assoc($result1);
$stop=$row1['id'];
$num=mysql_num_rows($result1);
echo "<p>找到".$num."名老师，最终id为$stop</p>";
echo "<p>正在检索所有的评论和评分。。。</p>";
for($a=1;$a<=$stop;$a++){
    $q2="SELECT * FROM fz_plus_hate WHERE tid='$a'";
	$result2=mysql_query($q2) or die("数据查询失败！".mysql_error());
	if(mysql_num_rows($result2)>0){
	    while($row2=mysql_fetch_array($result2)){
	        $plus_hate=$row2['plus_hate'];
	        switch($plus_hate){
		        case '1':
			        $hot=$hot+$plus_x;
				
				    break;
			    case '2':
			        $hot=$hot+$hate_x;
				    break;
				case '3':
			        $hot=$hot+$known_x;
				    break;
		    }
	    }
	}
	$q3="SELECT * FROM fz_comments WHERE tid='$a'";
	$result3=mysql_query($q3) or die("数据查询失败！".mysql_error());
	$num_comments=mysql_num_rows($result3);
	$hot=$hot+$num_comments*$comment_x;
	$q4="UPDATE fz_teachers SET hot='$hot' WHERE id='$a'";
	mysql_query($q4) or die("写入数据失败！".mysql_error());
	$plus_hate=0;
	$hot=0;
	$percent=floor($a/$stop*100);
	echo "<p>".$percent."%</p>";
}
echo "<p>Hot评分更新完毕！</p>";
echo "<title>Hot评分更新完毕！</title>";
echo "<script>alert('Hot评分更新完毕！');window.location.href='./index.php';</script>";
mysql_close();
?>
</body>
</html>
