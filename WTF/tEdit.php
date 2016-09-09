<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link rel="icon" href="/favicon.ico" mce_href="/favicon.ici" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" mce_href="/favicon.ico" type="image/x-icon">
<title>编辑老师</title>
</head>  
<body>
<?php
include("./include/check.php");
include("../include/config.php");
if($_GET['id']){
    $id=$_GET['id'];
    $q="SELECT * FROM fz_teachers WHERE id=$id";
	$result=mysql_query($q) or die("查询数据出错！".mysql_error());
	$row=mysql_fetch_assoc($result);
	$name=$row['name'];
	$grade=$row['grade'];
	$subject=$row['subject'];
	$img=$row['mini_image'];
?>
<form name="info" method="post" action="tEdit.php?id=<?php echo $id; ?>" >
    <table border="1">
        <tr>
            <th>头像</th>
            <th>姓名</th>
			<th>科目</th>
			<th>年级</th>
        </tr>
		
        <tr>
            <td width="80" align="center"><a href="../tImg.php?id=<?php echo $id; ?>" alt="点击更换图片" ><img width="80" height="80" src="<?php echo ".".$img; ?>" /></a></td>
            <td width="100" align="center"><input name="name" maxlength="10" value="<?php echo $name; ?>" /></td>
			<td width="100" align="center">
	            <select name="subject">
			        <option <?php if($subject=='语文'){ echo("selected"); } ?> value="语文">语文</option>
	                <option <?php if($subject=='数学'){ echo("selected"); } ?> value="数学">数学</option>
	                <option <?php if($subject=='英语'){ echo("selected"); } ?> value="英语">英语</option>		                <option <?php if($subject=='政治') echo("selected");?> value="政治">政治</option>
	                <option <?php if($subject=='历史'){ echo("selected"); } ?> value="历史">历史</option>
			        <option <?php if($subject=='地理'){ echo("selected"); } ?> value="地理">地理</option>
                    <option <?php if($subject=='物理'){ echo("selected"); } ?> value="物理">物理</option>                        <option <?php if($subject=='化学') echo("selected");?> value="化学">化学</option>
			        <option <?php if($subject=='生物'){ echo("selected"); } ?> value="生物">生物</option>
	                <option <?php if($subject=='计算机'){ echo("selected"); } ?> value="计算机">计算机</option>
                    <option <?php if($subject=='美术'){ echo("selected"); } ?> value="美术">美术</option>		                <option <?php if($subject=='音乐') echo("selected");?> value="音乐">音乐</option>
	                <option <?php if($subject=='体育'){ echo("selected"); } ?> value="体育">体育</option>
			        <option <?php if($subject=='通用技术'){ echo("selected"); } ?> value="通用技术">通用技术</option>
		        </select>
			</td>
			
			<td width="100" align="center">
	    	    <select name="grade">
		    	    <option <?php if($grade==1){ echo("selected"); } ?> value="1">初一</option>
		    	    <option <?php if($grade==2){ echo("selected"); } ?> value="2">初二</option>
		    	    <option <?php if($grade==3){ echo("selected"); } ?> value="3">初三</option>
		    	    <option <?php if($grade==4){ echo("selected"); } ?> value="4">高一</option>
	 	    	    <option <?php if($grade==5){ echo("selected"); } ?> value="5">高二</option>
		    	    <option <?php if($grade==6){ echo("selected"); } ?> value="6">高三</option>
		    	</select>
			</td>
        </tr>
	</table>
	<input type="submit" name="submit" value="提交" />
</form>
<?php
}
if($_POST['submit']){
    if($_POST['name'] && $_POST['grade'] && $_POST['subject'] && $_GET['id']){
        $name=$_POST['name'];
	    $grade=$_POST['grade'];
	    $subject=$_POST['subject'];
	    $q="UPDATE fz_teachers SET name='$name',grade='$grade',subject='$subject' WHERE id='$id'";
	    mysql_query($q) or die("写入数据出错！".mysql_error());
	    echo "<script>alert('修改成功！');window.location.href='index.php';</script>";
    }else{
        echo "<script>alert('信息不全！');history.go(-1);</script>";
    }
}
?>