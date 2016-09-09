<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>老师页面</title>
</head>
<?php
    session_start();
	include("./include/config.php");
    include("./include/functions.php");
    $id=$_GET['id'];
	$plus='0';
	$hate='0';
	$known='0';
    $q1="SELECT * FROM fz_teachers WHERE id='$id'";
	$q2="SELECT * FROM fz_plus_hate WHERE tid='$id'";
    $result1=mysql_query($q1) or die("查询数据出错".mysql_error());
	$result2=mysql_query($q2) or die("查询数据出错".mysql_error());
	$row1=mysql_fetch_assoc($result1);
	while($row2=mysql_fetch_array($result2)){
	    if($row2['plus_hate']=='1'){
		    $plus++;
		}
		if($row2['plus_hate']=='2'){
		    $hate++;
		}
		if($row2['plus_hate']=='3'){
		    $known++;
		}
	}
    $name=$row1['name'];
    $image=$row1['thumb_image'];
    $grade=$row1['grade'];
    $subject=$row1['subject'];
	$hot=$row1['hot'];
    switch($grade){
	    case 1:
		    $grade="初一";
		    break;
	    case 2:
		    $grade="初二";
		    break;
	    case 3:
		    $grade="初三";
		    break;
	    case 4:
		    $grade="高一";
		    break;
	    case 5:
		    $grade="高二";
		    break;
	    case 6:
		    $grade="高三";
		    break;
    }

    if(isset($_GET['mark'])){
	    if(isset($_SESSION['uid'])){
            $mark=$_GET['mark'];
			$uid=$_SESSION['uid'];
			$ip1=ip();
			$q7="SELECT * FROM fz_plus_hate WHERE uid='$uid' AND tid='$id'";
			$result7=mysql_query($q7) or die("查询数据出错！".mysql_error());
			$num=mysql_num_rows($result7);
			if($num==0){
                switch($mark){
	                case '1':
			            $hot=$hot+$plus_x;
				        $q3="INSERT INTO fz_plus_hate (uid,tid,plus_hate,time,ip) VALUES ('$uid','$id','1',NOW(),'$ip1')";
		                break;
		            case '2':
				        $hot=$hot+$hate_x;
				        $q3="INSERT INTO fz_plus_hate (uid,tid,plus_hate,time,ip) VALUES ('$uid','$id','2',NOW(),'$ip1')";
			            break;
					case '3':
				        $hot=$hot+$hate_x;
				        $q3="INSERT INTO fz_plus_hate (uid,tid,plus_hate,time,ip) VALUES ('$uid','$id','3',NOW(),'$ip1')";
			            break;
	            }
			    $q4="UPDATE fz_teachers SET hot='$hot' WHERE id='$id'";
                mysql_query($q3) or die("写入数据库出错！".mysql_error());	
			    mysql_query($q4) or die("写入数据库出错！".mysql_error());
	            echo "<script>alert('评论成功，请不要重复刷新！');window.location.href='./tPage.php?id=".$id."';</script>";
			}else{
    			echo "<script>alert('你已经评价过这个老师了，请不要重复刷新！');</script>";
			}
        }else{
		    echo "<script>alert('你还没有登录哦！');window.location.href='login.php';</script>";
		}
	}
	if(isset($_POST['comment'])){
	    if(!isset($_SESSION['uid'])){
	        echo "<script>alert('你还没有登录哦！');window.location.href='login.php';</script>";
	    }else{
		    mb_internal_encoding("UTF-8");
	        $uid=$_SESSION['uid'];
			$uname=$_SESSION['name'];
		    $comment=$_POST['comment'];
			$length=mb_strlen($comment, "UTF-8");
			if($length<50){
			    $hot=$hot+$comment_x;
			    $ip1=ip();
			    $time=strtotime(date("YmdHis"));
			    $q8="SELECT * FROM fz_comments WHERE uid=$uid ORDER BY time DESC";
			    $result8=mysql_query($q8) or die("查询数据出错！".mysql_error());
			    $row8=mysql_fetch_assoc($result8);
			    $time_b=strtotime($row8['time']);
			    if(($time-$time_b)>30){
	                $q5="INSERT INTO fz_comments (uid,tid,name,comment,time,ip) VALUES ('$uid','$id','$uname','$comment',NOW(),'$ip1')";
			        $q6="UPDATE fz_teachers SET hot='$hot' WHERE id='$id'";
		            mysql_query($q5) or die("写入数据库出错！".mysql_error());
			        mysql_query($q6) or die("写入数据库出错！".mysql_error());
		            echo "<script>alert('评论成功！');window.location.href='./tPage.php?id=".$id."';</script>";
				}else{
    			    echo "<script>alert('说话要深思熟虑哦！');</script>";
				}
			}else{
			    echo "<script>alert('话太多了，我记不下，最多50字哟！');</script>";
			}
	    }
	}
?>
</html>