<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>老师检索</title><link rel="stylesheet" type="text/css" href="css/index.css"/></head><?php include("./include/config.php");if($_GET['grade'] && $_GET['subject']){	$grade=$_GET['grade'];	$subject=$_GET['subject'];    $q="SELECT * FROM fz_teachers WHERE grade='$grade' AND subject='$subject' ORDER BY hot DESC";    $result=mysql_query($q) or die("查询数据失败！".mysql_error());	        switch($grade){	        case 1:		        $grade="初一";		        break;	        case 2:		        $grade="初二";		        break;	        case 3:		        $grade="初三";		        break;	        case 4:		        $grade="高一";		        break;	        case 5:		        $grade="高二";		        break;	        case 6:		        $grade="高三";		        break;        }?>              <div id="logofont"><?php echo $grade."&nbsp;&nbsp;".$subject; ?></div>         <div id="content"><?php	while($row=mysql_fetch_array($result)){		$img=$row['mini_image'];		$id=$row['id'];		$name=$row['name'];?>     		<div class="w170">            	<a href="./tPage.php?id=<?php echo $id; ?>"">                     <img src="<?php echo $img; ?>" width="170px" height="170px">                 </a>                 <a href="./tPage.php?id=<?php echo $id; ?>">                                                    	        <span class="outer">                			<span class="inner">                            <span class="note"><?php echo $name; ?></span>                            </span>                            </span>                </a>                  </div><?php    }}else{    echo "<script>alert('信息不全！');window.location.href='./index.php';</script>";}?>        </div>          <body></body></html>