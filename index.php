<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HustFz&#8480;大附中主页</title>
<link rel="stylesheet" type="text/css" href="css/index.css"/>

<link href="favicon.ico" mce_href="favicon.ico" rel="bookmark" type="image/x-icon" /> 
<link href="favicon.ico" mce_href="favicon.ico" rel="icon" type="image/x-icon" /> 
<link href="favicon.ico" mce_href="favicon.ico" rel="shortcut icon" type="image/x-icon" /> 

<style type="text/css">
a:link {color: #C1C1C1;text-decoration:none;font-weight:lighter}     /* 未被访问的链接 灰色 没有下划线*/
a:visited {color: #C1C1C1;text-decoration:none;font-weight:lighter}  /* 已被访问过的链接 灰色 没有下划线*/
a:hover {color: #FFFFFF;text-decoration:none;font-weight:lighter}   /* 鼠标悬浮在上的链接 白色 没有下划线 下划线为underline 上划线为overline 无下划线为none*/
a:active {color: #FFFFFF;text-decoration:none;font-weight:lighter}   /* 鼠标点中激活链接 白色 没有下划线*/
</style>

<script type="text/javascript" src="./js/radio.js"> </script>
<!--
<script language="javascript">
    function radio(sId) {
		if (sId == 'grade4_img'){
			document.getElementById("grade4_img").style.border = '3px solid #FF6600';
			document.getElementById("grade5_img").style.border = '3px solid #6f155f';
			document.getElementById("grade6_img").style.border = '3px solid #6f155f';
		}
		if (sId == 'grade5_img'){
			document.getElementById("grade4_img").style.border = '3px solid #6f155f';
			document.getElementById("grade5_img").style.border = '3px solid #FF6600';
			document.getElementById("grade6_img").style.border = '3px solid #6f155f';
		}
		if (sId == 'grade6_img'){
			document.getElementById("grade4_img").style.border = '3px solid #6f155f';
			document.getElementById("grade5_img").style.border = '3px solid #6f155f';
			document.getElementById("grade6_img").style.border = '3px solid #FF6600';
		}
    }
    function Check(x) {
        for (i = 1; i <= 1; i++) document.getElementById("grade").value = x
    }
</script>

-->

<!--[if lt IE 8]>
<div style='border: 1px solid #F7941D; background: #FEEFDA; text-align: center; clear: both; height: 75px; position: relative;'>    
<div style='position: absolute; right: 3px; top: 3px; font-family: courier new; font-weight: bold;'>
<a href='#' onclick='javascript:this.parentNode.parentNode.style.display="none"; return false;'><img src='./images/ie6nomore-cornerx.jpg' style='border: none;' alt='Close this notice'/></a>
</div>    
<div style='width: 640px; margin: 0 auto; text-align: left; padding: 0; overflow: hidden; color: black;'>      
<div style='width: 75px; float: left;'><img src='./images/ie6nomore-warning.jpg' alt='Warning!'/></div>      
<div style='width: 275px; float: left; font-family: Arial, sans-serif;'>        
<div style='font-size: 14px; font-weight: bold; margin-top: 12px;'>您正在使用已经过时的IE浏览器,或者兼容模式！</div>        
<div style='font-size: 12px; margin-top: 6px; line-height: 12px;'>由于IE 6的安全问题以及对互联网标准的支持问题，建议您升级您的浏览器，以达到更好的浏览效果！如果你正在使用兼容模式，请将其关闭！</div>     
</div>      
<div style='width: 75px; float: left;'><a href='http://www.firefox.com' target='_blank'><img src='./images/ie6nomore-firefox.jpg' style='border: none;' alt='Get Firefox 3.5'/></a></div>      
<div style='width: 75px; float: left;'><a href='http://www.browserforthebetter.com/download.html' target='_blank'><img src='./images/ie6nomore-ie8.jpg' style='border: none;' alt='Get Internet Explorer 8'/></a></div>      
<div style='width: 73px; float: left;'><a href='http://www.apple.com/safari/download/' target='_blank'><img src='./images/ie6nomore-safari.jpg' style='border: none;' alt='Get Safari 4'/></a></div>      
<div style='float: left;'><a href='http://www.google.com/chrome' target='_blank'><img src='./images/ie6nomore-chrome.jpg' style='border: none;' alt='Get Google Chrome'/></a></div>    
</div>  
</div>  
<![endif]-->
</head>
<?php
require("./include/index.php");
?>
<body>

    <div id="content">
    <div id="header">
	    <div class="w800">
	    <div id="logo">
		    <img src="images/fzlogo.png" alt width="100" height="100" align="absmiddle"></img>
			<font style="font-size:60px; font-weight: lighter;">｜</font> HustFz&#8480;大附中主页
		</div>
	    <div id="login">
	    <?php echo $login; ?>
	    </div>
		</div>
	 
     	<div class="w8901">
            <p><font size=6>HustFz&#8480;附中评师网</font> 试运行</p>
			<p>我们不是要展现其最美好的一面，而是要展现出其最真实的一面</p>		
            <p>Ver 2.0 Beta</p>
            <p><a href="./update.html">更新日志</a></p>
		</div>
		<div class="w8902">
            <p><h2>KingPin新一轮招新</h2></p>
			<p>因为共同爱好，我们相聚在一起；因为有一样的梦想，我们奋斗在这里！</p>		
            </hr>
            <p><a href="./signup.html">加入KingPin</a></p>
		</div>
     </div>
     <div id="top10">
        <?php require("./include/top10.php"); ?>   
     </div>
	 
	 <form id="tSearch" name="tSearch" action="tSearch.php" method="get">
     <div id="select">
     <div id="logofont">
	     请先选择年级：
	 </div>
	 <div class="w890">
	     <input type="radio" value= "4" id= "grade4" name="grade" style="display:none"><img id="grade4_img" width="285" style="border:3px solid #6f155f;" src="./images/button/grade4.png" onclick="radio(this.id)"> 
         <input type="radio" value= "5" id= "grade5" name="grade" style="display:none"><img id="grade5_img" width="285" style="border:3px solid #6f155f;" src="./images/button/grade5.png" onclick="radio(this.id)"> 
         <input type="radio" value= "6" id= "grade6" name="grade" style="display:none"><img id="grade6_img" width="285" style="border:3px solid #6f155f;" src="./images/button/grade6.png" onclick="radio(this.id)">
	</div>
     <div id="logofont">
	     请再选择科目：
	 </div>
     <div class="w890">
            <div class="r1"><input name="subject" type="submit" class="button" id="button1" value="化学" alt="化学" /></div>
            <div class="r1"><input name="subject" type="submit" class="button" id="button2" value="生物" alt="生物" /></div>
            <div class="r2"><input name="subject" type="submit" class="button" id="button3" value="历史" alt="历史" /></div>
            <div class="r3"><input name="subject" type="submit" class="button" id="button4" value="通用技术" alt="通用技术" /></div>
            <div class="r4"><input name="subject" type="submit" class="button" id="button5" value="物理" alt="物理" /></div>
            <div class="r2"><input name="subject" type="submit" class="button" id="button6" value="美术" alt="美术" /></div>
            <div class="r2"><input name="subject" type="submit" class="button" id="button7" value="音乐" alt="音乐" /></div>
            <div class="r1" style="width:222.5px; background-color:#E671B8"><input name="subject" type="submit" class="button" id="button8" value="政治" alt="政治" /></div>
            <div class="r3"><input name="subject" type="submit" class="button" id="button9" value="英语" alt="英语" /></div>
            <div class="r2"><input name="subject" type="submit" class="button" id="button10" value="体育" alt="体育" /></div>
            <div class="r4"><input name="subject" type="submit" class="button" id="button11" value="语文" alt="语文" /></div>
            <div class="r1"><input name="subject" type="submit" class="button" id="button12" value="地理" alt="地理" /></div>
            <div class="r1"><input name="subject" type="submit" class="button" id="button13" value="计算机" alt="计算机" /></div>
            <div class="r4"><input name="subject" type="submit" class="button" id="button14" value="数学" alt="数学" /></div>               
     </div>


   </div>
   </form>
<!--蓝色按钮代码开始-->
<div data-widget="backtop"><script src="./js/backtop.js" charset="utf-8"></script></div>
<!--结束-->

<!--foot-->
    <div id="footer">
	    <hr/>
	    <p><a href="http://www.hustfz.com">HustFz&#8480;附中评师网<a> | © 2012	 Powered by Windows UI , KingPin and WT Project</p>
		<p>Design by Legend & Adivon. In collaboration with <a href="http://www.wangdi.hk.cn">Adivon<a>, <a href="http://www.legendt.tk">Legend<a>, <a href="http://blog.sina.com.cn/u/1763067774">Kaichen Xiao<a> and <a href="http://www.itjesse.cn">Jesse<a>. 不喜请出门右转<a href="http://www.hustfz.cn">隔壁<a></p>
	</div>
	<script type="text/javascript">			
		(function() {
			var jkb = document.createElement('script'); jkb.type = "text/javascript"; jkb.async = true;
			jkb.src = "http://exp.jiankongbao.com/loadtrace.php?host_id=10790&style=1&type=1";
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(jkb, s);
		})();
</script>
</body>
</html>