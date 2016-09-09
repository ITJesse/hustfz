<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

<link rel="icon" href="/favicon.ico" mce_href="/favicon.ici" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" mce_href="/favicon.ico" type="image/x-icon">
 
<title>正在注销。。。</title>  
</head>  
<body>  
<?php  
    session_start();  
    unset($_SESSION['username']);  
    session_destroy();  
    echo "<script>alert('注销成功！');window.location.href='index.php';</script>";  
?>  
</body>  
</html> 