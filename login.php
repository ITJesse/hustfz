<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

<link rel="icon" href="/favicon.ico" mce_href="/favicon.ici" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" mce_href="/favicon.ico" type="image/x-icon">

<title>登陆HustFZ</title> 
<link rel="stylesheet" type="text/css" href="css/login.css"/>
</head> 
<body> 
<?php 
session_start();  
if (isset($_SESSION['username'])) {  
?>
	<div id="logofont">Welcome</div>
    <div id="infotable">
    	<form id="form3" name="form3" method="post" action="">
        	<div class="w200">欢迎您</div>
            <div class="w300">
			     <?php 
	                 echo $_SESSION['name'];
	                 header("Refresh:5;url=./index.php");
	             ?>
            </div>
            <div class="w510" style="font-size:30px ;padding-top:30px;">5s后跳转到主页，或者点击Go Home</div>
            <div class="w300" style="float:right ;margin-right:20; "><a href="index.php"><img src="images/gohome.png" border="0"></a></div>
         </form>
     </div>

<?php 
}else {  
?> 
     <div id="logofont">Login</div>
     <div id="infotable">
       <form id="form1" name="form1" method="post" action="login_.php"> 
     
        <div class="w150">用户名</div>
        
        <div class="w350">  <input name="username" type="text" id="textfield" size="10" style="width: 340px; height: 100px;" /> </div>
        
        <div class="w150" >密&nbsp;&nbsp;&nbsp;&nbsp;码</div>
        
        <div class="w350"><input name="password" type="password" id="textfield2" size="10" style="width: 340px; height: 100px;" /> </div>
        
        <div class="w250" ><input type="submit" class="button" name="submit" id="button1" value=""/>  </div>
        
        <div class="w250" ><input type="reset"  class="button"  name="reset" id="button2"  value=""/> </div>
        
       </form> 
	   <div class="w300" style="float:right ;margin-right:20; "><a href="index.php"><img src="images/gohome.png" border="0"></a></div>
     </div>


<?php 
}  
?> 


</body> 
</html> 