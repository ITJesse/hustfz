<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
$q1="SELECT * FROM fz_teachers ORDER BY hot DESC";
$result=mysql_query($q1) or die("查询数据失败！".mysql_error());
$num=mysql_num_rows($result);
if($num<10 && $num>0){
    for($a;$a<$num;$a++){
	    $row=mysql_fetch_array($result);
		$img=$row['mini_image'];
		$id=$row['id'];
		$name=$row['name'];
?>
     		<div class="w170">
            <img src="<?php echo $img; ?>" width="170px" height="170px">
            	<a href="./tPage.php?id=<?php echo $id; ?>" >
                    
                            <span class="outer">
                			<span class="inner">
                            <span class="note"><?php echo $name; ?></span>
                            </span>
                            </span>
                </a>      
            </div>
<?php
    }
    for($b;$b<(10-$num);$b++){
	    echo "<div class=\"w170\"></div>";
	}
}else{
    for($c;$c<10;$c++){
	    $row=mysql_fetch_array($result);
		$img=$row['mini_image'];
		$id=$row['id'];
		$name=$row['name'];
?>
     		<div class="w170">
            	<a href="./tPage.php?id=<?php echo $id; ?>"">
                     <img src="<?php echo $img; ?>" width="170px" height="170px">
                 </a>
                 <a href="./tPage.php?id=<?php echo $id; ?>">
                     
             
                  	        <span class="outer">
                			<span class="inner">
                            <span class="note"><?php echo $name; ?></span>
                            </span>
                            </span>
                </a>      
            </div>
<?php
    }
}
?>
</body>
</html>