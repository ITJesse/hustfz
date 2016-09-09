<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link rel="icon" href="/favicon.ico" mce_href="/favicon.ici" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" mce_href="/favicon.ico" type="image/x-icon">
<title>检索老师</title>  
</head>  
<body>
<?php
include("./include/check.php");
include("../include/config.php");

//显示检索方式
if(!$_GET['method']){
?>
    <p>请选择检索方式</p>
    <p><a href="./tSearch.php?method=1">按姓名检索</a></p>
    <p><a href="./tSearch.php?method=2">按年级检索</a></p>
    <p><a href="./tSearch.php?method=3">按科目检索</a></p>
	<p><a href="./tSearch.php?method=4">显示所有老师</a></p>
<?php
}

//按名字检索
if($_GET['method']==1){
?>
    <form method="get" action="tSearch.php">
        输入姓名：<input name="name" maxlength="10" />
		<input name="method" type="hidden" value="1" />
	    <input name="submit" type="submit" value="提交" />
    </form>
<?php
	if($_GET['name']){
	    $name=$_GET['name'];
	    $q="SELECT * FROM fz_teachers WHERE name='$name'";
		$result=mysql_query($q) or die("查询数据出错！".mysql_error());
?>
            <table border="1">
                <tr>
                    <th>头像</th>
                    <th>姓名</th>
					<th>科目</th>
					<th>年级</th>
					<th>&nbsp;</th>
                </tr>
<?php
		while($row=mysql_fetch_array($result)){
		    $tid=$row['id'];
			$grade=$row['grade'];
			$img=$row['mini_image'];
			$subject=$row['subject'];
?>
                <tr>
                    <td width="80" align="center"><img width="80" height="80" src="<?php echo ".".$img; ?>" /></td>
                    <td width="100" align="center"><?php echo $name; ?></td>
					<td width="100" align="center"><?php echo $subject; ?></td>
					<td width="100" align="center"><?php echo $grade; ?></td>
					<td width="100" align="center"><a href="./tEdit.php?id=<?php echo $tid; ?>">编辑</a></td>
                </tr>
<?php
		}
		echo "</table>";
		echo "<p><a href=\"./tSearch.php\">返回</a></p>";
	}
}

//按年级检索
if($_GET['method']==2){
?>
    <form method="get" action="tSearch.php">
	    年级：
	    <select id="grade" name="grade">
			<option <?php if($_GET['grade']==1) echo("selected");?> value="1">初一</option>
	        <option <?php if($_GET['grade']==2) echo("selected");?> value="2">初二</option>
			<option <?php if($_GET['grade']==3) echo("selected");?> value="3">初三</option>
			<option <?php if($_GET['grade']==4) echo("selected");?> value="4">高一</option>
	        <option <?php if($_GET['grade']==5) echo("selected");?> value="5">高二</option>
			<option <?php if($_GET['grade']==6) echo("selected");?> value="6">高三</option>
		</select>
		<input name="method" type="hidden" value="2" />
		<input name="submit" type="submit" value="提交" />
	</form>
<?php
	if($_GET['grade']){
	    $grade=$_GET['grade'];
	    if($_GET['subject']){
		    $subject=$_GET['subject'];
		    $q="SELECT * FROM fz_teachers WHERE subject='$subject' AND grade='$grade'";
		}else{
		    $q="SELECT * FROM fz_teachers WHERE grade='$grade'";
		}
		$result=mysql_query($q) or die("查询数据出错！".mysql_error());
?>

    <form method="get" action="tSearch.php">
    你可以在这里选择学科进一步筛选。
	    <select name="subject">
			<option <?php if($_GET['subject']=='语文') echo("selected");?> value="语文">语文</option>
	        <option <?php if($_GET['subject']=='数学') echo("selected");?> value="数学">数学</option>
			<option <?php if($_GET['subject']=='英语') echo("selected");?> value="英语">英语</option>
			<option <?php if($_GET['subject']=='政治') echo("selected");?> value="政治">政治</option>
	        <option <?php if($_GET['subject']=='历史') echo("selected");?> value="历史">历史</option>
			<option <?php if($_GET['subject']=='地理') echo("selected");?> value="地理">地理</option>
			<option <?php if($_GET['subject']=='物理') echo("selected");?> value="物理">物理</option>
	        <option <?php if($_GET['subject']=='化学') echo("selected");?> value="化学">化学</option>
			<option <?php if($_GET['subject']=='生物') echo("selected");?> value="生物">生物</option>
	        <option <?php if($_GET['subject']=='计算机') echo("selected");?> value="计算机">计算机</option>
			<option <?php if($_GET['subject']=='美术') echo("selected");?> value="美术">美术</option>
			<option <?php if($_GET['subject']=='音乐') echo("selected");?> value="音乐">音乐</option>
	        <option <?php if($_GET['subject']=='体育') echo("selected");?> value="体育">体育</option>
			<option <?php if($_GET['subject']=='通用技术') echo("selected");?> value="通用技术">通用技术</option>
		</select>
		<input name="method" type="hidden" value="2" />
		<input name="grade" type="hidden" value="<?php echo $grade; ?>" />
		<input name="submit" type="submit" value="提交" />
	</form>
	
	
            <table border="1">
                <tr>
                    <th>头像</th>
                    <th>姓名</th>
					<th>科目</th>
					<th>年级</th>
					<th>&nbsp;</th>
                </tr>
<?php
		while($row=mysql_fetch_array($result)){
		    $tid=$row['id'];
			$name=$row['name'];
			$img=$row['mini_image'];
			$subject=$row['subject'];
?>
                <tr>
                    <td width="80" align="center"><img width="80" height="80" src="<?php echo ".".$img; ?>" /></td>
                    <td width="100" align="center"><?php echo $name; ?></td>
					<td width="100" align="center"><?php echo $subject; ?></td>
					<td width="100" align="center"><?php echo $grade; ?></td>
					<td width="100" align="center"><a href="./tEdit.php?id=<?php echo $tid; ?>">编辑</a></td>
                </tr>
<?php
		}
		echo "</table>";
		echo "<p><a href=\"./tSearch.php\">返回</a></p>";
	}
}

//按科目检索
if($_GET['method']==3){
?>
    <form method="get" action="tSearch.php">
	    学科：
	    <select name="subject">
			<option <?php if($_GET['subject']=='语文') echo("selected");?> value="语文">语文</option>
	        <option <?php if($_GET['subject']=='数学') echo("selected");?> value="数学">数学</option>
			<option <?php if($_GET['subject']=='英语') echo("selected");?> value="英语">英语</option>
			<option <?php if($_GET['subject']=='政治') echo("selected");?> value="政治">政治</option>
	        <option <?php if($_GET['subject']=='历史') echo("selected");?> value="历史">历史</option>
			<option <?php if($_GET['subject']=='地理') echo("selected");?> value="地理">地理</option>
			<option <?php if($_GET['subject']=='物理') echo("selected");?> value="物理">物理</option>
	        <option <?php if($_GET['subject']=='化学') echo("selected");?> value="化学">化学</option>
			<option <?php if($_GET['subject']=='生物') echo("selected");?> value="生物">生物</option>
	        <option <?php if($_GET['subject']=='计算机') echo("selected");?> value="计算机">计算机</option>
			<option <?php if($_GET['subject']=='美术') echo("selected");?> value="美术">美术</option>
			<option <?php if($_GET['subject']=='音乐') echo("selected");?> value="音乐">音乐</option>
	        <option <?php if($_GET['subject']=='体育') echo("selected");?> value="体育">体育</option>
			<option <?php if($_GET['subject']=='通用技术') echo("selected");?> value="通用技术">通用技术</option>
		</select>
		<input name="method" type="hidden" value="3" />
		<input name="submit" type="submit" value="提交" />
	</form>
<?php
	if($_GET['subject']){
	    $subject=$_GET['subject'];
	    if($_GET['grade']){
		    $grade=$_GET['grade'];
		    $q="SELECT * FROM fz_teachers WHERE subject='$subject' AND grade='$grade'";
		}else{
		    $q="SELECT * FROM fz_teachers WHERE subject='$subject'";
		}
		$result=mysql_query($q) or die("查询数据出错！".mysql_error());
?>

    <form method="get" action="tSearch.php">
    你可以在这里选择年级进一步筛选。
	    <select name="grade">
			<option <?php if($_GET['grade']==1) echo("selected");?> value="1">初一</option>
	        <option <?php if($_GET['grade']==2) echo("selected");?> value="2">初二</option>
			<option <?php if($_GET['grade']==3) echo("selected");?> value="3">初三</option>
			<option <?php if($_GET['grade']==4) echo("selected");?> value="4">高一</option>
	        <option <?php if($_GET['grade']==5) echo("selected");?> value="5">高二</option>
			<option <?php if($_GET['grade']==6) echo("selected");?> value="6">高三</option>
		</select>
		<input name="method" type="hidden" value="2" />
		<input name="subject" type="hidden" value="<?php echo $subject; ?>" />
		<input name="submit" type="submit" value="提交" />
	</form>

            <table border="1">
                <tr>
                    <th>头像</th>
                    <th>姓名</th>
					<th>科目</th>
					<th>年级</th>
					<th>&nbsp;</th>
                </tr>
<?php
		while($row=mysql_fetch_array($result)){
		    $tid=$row['id'];
			$name=$row['name'];
			$img=$row['mini_image'];
			$grade=$row['grade'];
?>
                <tr>
                    <td width="80" align="center"><img width="80" height="80" src="<?php echo ".".$img; ?>" /></td>
                    <td width="100" align="center"><?php echo $name; ?></td>
					<td width="100" align="center"><?php echo $subject; ?></td>
					<td width="100" align="center"><?php echo $grade; ?></td>
					<td width="100" align="center"><a href="./tEdit.php?id=<?php echo $tid; ?>">编辑</a></td>
                </tr>
<?php
		}
		echo "</table>";
		echo "<p><a href=\"./tSearch.php\">返回</a></p>";
	}
}

//显示所有老师
if($_GET['method']==4){
    $q="SELECT * FROM fz_teachers";
	$result=mysql_query($q) or die("查询数据出错！".mysql_error());
?>
    <table border="1">
        <tr>
            <th>头像</th>
            <th>姓名</th>
			<th>科目</th>
			<th>年级</th>
			<th>&nbsp;</th>
        </tr>
<?php
	while($row=mysql_fetch_array($result)){
		$tid=$row['id'];
	    $name=$row['name'];
		$img=$row['mini_image'];
		$grade=$row['grade'];
		$subject=$row['subject'];
?>
        <tr>
            <td width="80" align="center"><img width="80" height="80" src="<?php echo ".".$img; ?>" /></td>
            <td width="100" align="center"><?php echo $name; ?></td>
		    <td width="100" align="center"><?php echo $subject; ?></td>
			<td width="100" align="center"><?php echo $grade; ?></td>
			<td width="100" align="center"><a href="./tEdit.php?id=<?php echo $tid; ?>">编辑</a></td>
        </tr>
<?php
	}
	echo "</table>";
	echo "<p><a href=\"./tSearch.php\">返回</a></p>";
}
	
    

