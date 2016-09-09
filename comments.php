<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Comments</title>
<link rel="stylesheet" type="text/css" href="css/comments.css"/>
<link type="text/css" href="css/jquery.jscrollpane.css" rel="stylesheet" media="all" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript">
		$(function()
		{
		
			var bars = '.jspHorizontalBar, .jspVerticalBar';
		
			$('.comment').bind('jsp-initialised', function (event, isScrollable) {
				
				//hide the scroll bar on first load
				$(this).find(bars).hide();
			
			}).jScrollPane().hover(
			
				//hide show scrollbar
				function () {
					$(this).find(bars).stop().fadeTo('fast', 0.9);
				},
				function () {
					$(this).find(bars).stop().fadeTo('fast', 0);
				}

			);				

		});
</script>

</head>

<body>
	<div id="content">
     	<div class="comment">		
		<?php
		include("./include/config.php");
		if(isset($_GET['id'])){
		    $tid=$_GET['id'];
		    $q="SELECT * FROM fz_comments WHERE tid=$tid ORDER BY time DESC";
			$result=mysql_query($q) or die("查询数据出错！".mysql_error());
			$id=mysql_num_rows($result)+1;
			while($row=mysql_fetch_array($result)){
				$id--;
			    echo "<div id=\"i$id\" class=\"floor\">#".$id."</div>";
				echo "<div id=\"n$id\" class=\"name\">".$row['name']."</div>";
				echo "<div id=\"f$id\" class=\"com\">".$row['comment']."</div>";
			}
			mysql_close();
		}
		?>
        </div>
     </div>
</body>
</html>