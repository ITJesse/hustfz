<?php
  //数据库设置
  $ip="localhost";
  $user="hustfz";
  $pass="";
  $dbname="hustfz";
  
  //分数权重
  $plus_x='2';
  $hate_x='1';
  $comment_x='3';    $known_x='-1';
  
  //数据库连接参数，不要动！
  $conn=mysql_connect($ip,$user,$pass) or die('不能连接服务器'.mysql_error());  
  mysql_select_db("$dbname",$conn) or die("数据库访问错误".mysql_error());  
  mysql_query("set names utf8");   
?>
