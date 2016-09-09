<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>老师页面</title>

<link rel="stylesheet" type="text/css" href="css/tPage.css"/>
<link type="text/css" href="css/jquery.jscrollpane.css" rel="stylesheet" media="all" />

<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>


<!--[if lt IE 7]>
<div style='border: 1px solid #F7941D; background: #FEEFDA; text-align: center; clear: both; height: 75px; position: relative;'>    
<div style='position: absolute; right: 3px; top: 3px; font-family: courier new; font-weight: bold;'>
<a href='#' onclick='javascript:this.parentNode.parentNode.style.display="none"; return false;'><img src='images/ie6nomore-cornerx.jpg' style='border: none;' alt='Close this notice'/></a>
</div>    
<div style='width: 640px; margin: 0 auto; text-align: left; padding: 0; overflow: hidden; color: black;'>      
<div style='width: 75px; float: left;'><img src='images/ie6nomore-warning.jpg' alt='Warning!'/></div>      
<div style='width: 275px; float: left; font-family: Arial, sans-serif;'>        
<div style='font-size: 14px; font-weight: bold; margin-top: 12px;'>您正在使用已经过时的IE 6浏览器！</div>        
<div style='font-size: 12px; margin-top: 6px; line-height: 12px;'>由于IE 6的安全问题以及对互联网标准的支持问题，建议您升级您的浏览器，以达到更好的浏览效果！</div>     
</div>      
<div style='width: 75px; float: left;'><a href='http://www.firefox.com' target='_blank'><img src='images/ie6nomore-firefox.jpg' style='border: none;' alt='Get Firefox'/></a></div>      
<div style='width: 75px; float: left;'><a href='http://www.browserforthebetter.com/download.html' target='_blank'><img src='images/ie6nomore-ie8.jpg' style='border: none;' alt='Get Internet Explorer 8 or newer'/></a></div>      
<div style='width: 73px; float: left;'><a href='http://www.apple.com/safari/download/' target='_blank'><img src='images/ie6nomore-safari.jpg' style='border: none;' alt='Get Safari 4'/></a></div>      
<div style='float: left;'><a href='http://www.google.com/chrome' target='_blank'><img src='images/ie6nomore-chrome.jpg' style='border: none;' alt='Get Google Chrome'/></a></div>    
</div>  
</div>  
<![endif]-->

<!--[if lt IE 9]> 
    <script src="js/html5shiv-printshiv.js"></script> 
<![endif]--> 
<script> 
     $(function(){ 
          //autofocus 
          $('[autofocus]:not(:focus)').eq(0).focus(); 
           //placeholder 
          var input = document.createElement("input"); 
          if(('placeholder' in input)==false) { 
               $('[placeholder]').focus(function() { 
                    var i = $(this); 
                    if(i.val() == i.attr('placeholder')) { 
                         i.val('').removeClass('placeholder'); 
                         if(i.hasClass('password')) { 
                              i.removeClass('password'); 
                              this.type='password'; 
                         }               
                    } 
               }).blur(function() { 
                    var i = $(this);     
                    if(i.val() == '' || i.val() == i.attr('placeholder')) { 
                         if(this.type=='password') { 
                              i.addClass('password'); 
                              this.type='text'; 
                         } 
                         i.addClass('placeholder').val(i.attr('placeholder')); 
                    } 
               }).blur().parents('form').submit(function() { 
                    $(this).find('[placeholder]').each(function() { 
                         var i = $(this); 
                         if(i.val() == i.attr('placeholder')) 
                              i.val(''); 
                    }) 
               }); 
          } 
     });          
</script> 



</head>
<?php
if(isset($_GET['id'])){
require("./include/tPage.php");
?>
<body>
	  <div id="logofont"><?php  echo $grade ,"&nbsp;&nbsp;",$subject; ?></div>
      <div id="content">
      	<div class="f450">
      		<div class="f100" style="text-align:center;" ><a href="index.php"><img src="./images/Home.png" border="0" title="返回主页"></a></div>
            <div class="f250">
            	<div class="f250h100" style="text-align:center;"><?php  echo $name; ?></div>
                <div class="f250h300"><?php  echo "<img src=\"$image\" width=\"250\" height=\"300\" border=\"0\">";  ?></div>
            </div>
            <div class="f100"><a href="#"><img src="./images/Next.png" border="0" title="下一个"></a></div>   
            <div class="f150"><a href="./tPage.php?id=<?php echo $id; ?>&mark=1">+1(<?php echo $plus; ?>)</a></div>
            <div class="f150"><a href="./tPage.php?id=<?php echo $id; ?>&mark=2">HATE(<?php echo $hate; ?>)</a></div>
            <div class="f150"><a href="./tPage.php?id=<?php echo $id; ?>&mark=3">这谁啊？</a></div>
            <div class="fh200" style="text-align:center;"><p>
			<form name="form1"onkeydown="if(event.keyCode==13){return true;}" method="post" action="./tPage.php?id=<?php echo $id; ?>">
			    <input id="comment" name="comment"  type="text" maxlength="100" placeholder="评论一句吧…猛击回车键提交~" />
			</form>
			  </p>
			</div>
        </div>
        <div class="f450">COMMENTS<iframe scrolling="no" src="comments.php?id=<?php echo $id; ?>" style="border:0px; width:450px; height:520px; overflow-y:hidden">评论</iframe></div> 
      </div>
</body>
<?php 
mysql_close();
}  ?>
</html>