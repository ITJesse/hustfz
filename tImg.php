<?php
//写这段代码的时候，我依稀明白它是干嘛的
//写完了还勉强能回忆起某些段落的作用
//现在就只有上帝才知道了
//节哀~~

if(!$_GET['id']){
    echo "<script>alert('请通过正确途径访问！');window.location.href='index.php';</script>";
}else{
    $id=$_GET['id'];
}

session_start();
include("./include/config.php");
include("./WTF/include/img_fun.php");
$upload_dir = "./images/teachers"; 				// The directory for the images to be saved in
$upload_path = $upload_dir."/";				// The path to where the image will be saved
$max_file = "5242880"; 						// Approx 1MB
$max_width = "1000";							// Max width allowed for the large image
$thumb_width = "170";						// Width of thumbnail image
$thumb_height = "170";						// Height of thumbnail image
$thumb_width2 = "250";						// Width of thumbnail image
$thumb_height2 = "300";						// Height of thumbnail image
$al_ph_type=array('image/jpg','image/jpeg');

?>

<!doctype html public "-//w3c//dtd xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.111cn.net/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="icon" href="/favicon.ico" mce_href="/favicon.ici" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" mce_href="/favicon.ico" type="image/x-icon">
    <title>更换照片</title>
	<script type="text/javascript" src="./js/jquery-pack.js"></script>
	<script type="text/javascript" src="./js/jquery.imgareaselect-0.3.min.js"></script>
</head>
<body>
<?php
if($_GET['step']=='1'){
?>
<h1>第一步——上传照片</h1>
<form name="photo" enctype="multipart/form-data" action="tAdd.php" method="post">
	请选择一个大小在5M一下的JPEG格式图片<input type="file" name="image" size="30" />
	<input type="submit" name="upload" value="上传" />
</form>
<?php
}
if(isset($_POST['upload'])){
	$userfile_name = $_FILES['image']['name'];
	$userfile_tmp = $_FILES['image']['tmp_name'];
	$userfile_size = $_FILES['image']['size'];
	$filename = basename($_FILES['image']['name']);
	$file_type = $_FILES['image']['type'];
    $datetime=date("YmdHis");
    $large_image_name = $datetime.".jpg"; 		// New name of the large image
    $thumb_image_name = "small_".$large_image_name;	// New name of the thumbnail image
	$mini_image_name = "mini_".$large_image_name;

    //Image Locations
    $large_image_location = $upload_path.$large_image_name;
    $thumb_image_location = $upload_path.$thumb_image_name;
	$mini_image_location = $upload_path.$mini_image_name;

	//传递图像路径
	$_SESSION['large_image_location']=$large_image_location;
	$_SESSION['thumb_image_location']=$thumb_image_location;
	$_SESSION['mini_image_location']=$mini_image_location;

	//Only process if the file is a JPG and below the allowed limit
	if((!empty($_FILES["image"])) && ($_FILES['image']['error'] == 0)) {
		if ((!in_array($file_type,$al_ph_type)) || ($userfile_size > $max_file)) {
			$error= "只能上传小于5M的JPEG图像！";
		}
	}else{
		$error= "请选择一个用来上传的有效图像！";
	}
	//Everything is ok, so we can upload the image.
	if (strlen($error)==0){

		if (isset($_FILES['image']['name'])){

			move_uploaded_file($userfile_tmp, $large_image_location);
			chmod($large_image_location, 0777);

			$width = getWidth($large_image_location);
			$height = getHeight($large_image_location);
			//Scale the image if it is greater than the width set above
			if ($width > $max_width){
				$scale = $max_width/$width;
				$uploaded = resizeImage($large_image_location,$width,$height,$scale);
			}else{
				$scale = 1;
				$uploaded = resizeImage($large_image_location,$width,$height,$scale);
			}
		}

		$_SESSION['thumb_photo_exists'] = "";
		$_SESSION['mini_photo_exists'] = "";

   	    $_SESSION['large_photo_exists'] = "<img src=\"".$large_image_location."\" alt=\"大图像\"/>";
		echo "<script>alert('上传成功！');window.location.href='tAdd.php?step=2';</script>";
	}
	if(strlen($error)>0){
	    echo "<script>alert('$error');window.location.href='tAdd.php?id=$id&step=1';</script>";
	}
}

if($_GET['step']=='2'){
$large_image_location=$_SESSION['large_image_location'];
$mini_image_location=$_SESSION['thumb_image_location'];
$large_photo_exists=$_SESSION['large_photo_exists'];
$mini_photo_exists=$_SESSION['thumb_photo_exists'];
//Only display the javacript if an image has been uploaded
if(strlen($large_photo_exists)>0){
	$current_large_image_width = getWidth($large_image_location);
	$current_large_image_height = getHeight($large_image_location);?>
<script type="text/javascript">
function preview(img, selection) {
	var scaleX = <?php echo $thumb_width;?> / selection.width;
	var scaleY = <?php echo $thumb_height;?> / selection.height;

	$('#thumbnail + div > img').css({
		width: Math.round(scaleX * <?php echo $current_large_image_width;?>) + 'px',
		height: Math.round(scaleY * <?php echo $current_large_image_height;?>) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px'
	});
	$('#x1').val(selection.x1);
	$('#y1').val(selection.y1);
	$('#x2').val(selection.x2);
	$('#y2').val(selection.y2);
	$('#w').val(selection.width);
	$('#h').val(selection.height);
}

$(document).ready(function () {
	$('#save_mini').click(function() {
		var x1 = $('#x1').val();
		var y1 = $('#y1').val();
		var x2 = $('#x2').val();
		var y2 = $('#y2').val();
		var w = $('#w').val();
		var h = $('#h').val();
		if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
			alert("你必须先做出一个选区！");
			return false;
		}else{
			return true;
		}
	});
});

$(window).load(function () {
	$('#thumbnail').imgAreaSelect({ aspectRatio: '1:1', onSelectChange: preview });
});

</script>
<?php
}

		if(strlen($large_photo_exists)>0){?>
		<h1>第二步——创建头像</h1>
		<h3>鼠标拖动创建一个选区</h3>
		<div align="center">
			<img src="<?php echo $large_image_location;?>" style="float: left; margin-right: 10px;" id="thumbnail" alt="生成头像" />
			<div style="float:left; position:relative; overflow:hidden; width:<?php echo $thumb_width;?>px; height:<?php echo $thumb_height;?>px;">
				<img src="<?php echo $large_image_location;?>" style="position: relative;" alt="头像预览" />
			</div>
			<br style="clear:both;"/>
			<form name="thumbnail" action="tAdd.php" method="post">
				<input type="hidden" name="x1" value="" id="x1" />
				<input type="hidden" name="y1" value="" id="y1" />
				<input type="hidden" name="x2" value="" id="x2" />
				<input type="hidden" name="y2" value="" id="y2" />
				<input type="hidden" name="w" value="" id="w" />
				<input type="hidden" name="h" value="" id="h" />
			    <p><input type="submit" name="upload_mini" value="保存头像" id="save_mini" /></p>
	        </form>
		</div>
	<hr />
	<?php
 	    }
}

if (isset($_POST["upload_mini"])) {
    $large_image_location=$_SESSION['large_image_location'];
    $mini_image_location=$_SESSION['mini_image_location'];
	//Get the new coordinates to crop the image.
	$x1 = $_POST["x1"];
	$y1 = $_POST["y1"];
	$x2 = $_POST["x2"];
	$y2 = $_POST["y2"];
	$w = $_POST["w"];
	$h = $_POST["h"];
	//Scale the image to the thumb_width set above
	$scale = $thumb_width/$w;
	$cropped = resizeThumbnailImage($mini_image_location, $large_image_location,$w,$h,$x1,$y1,$scale);
	//Reload the page again to view the thumbnail
	echo "<script>alert('创建头像成功！');window.location.href='tAdd.php?id=$id&step=3';</script>";
}

if($_GET['step']=='3'){
$large_image_location=$_SESSION['large_image_location'];
$thumb_image_location=$_SESSION['thumb_image_location'];
$large_photo_exists=$_SESSION['large_photo_exists'];
$thumb_photo_exists=$_SESSION['thumb_photo_exists'];
//Only display the javacript if an image has been uploaded
if(strlen($large_photo_exists)>0){
	$current_large_image_width = getWidth($large_image_location);
	$current_large_image_height = getHeight($large_image_location);?>
<script type="text/javascript">
function preview(img, selection) {
	var scaleX = <?php echo $thumb_width2;?> / selection.width;
	var scaleY = <?php echo $thumb_height2;?> / selection.height;

	$('#thumbnail + div > img').css({
		width: Math.round(scaleX * <?php echo $current_large_image_width;?>) + 'px',
		height: Math.round(scaleY * <?php echo $current_large_image_height;?>) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px'
	});
	$('#x1').val(selection.x1);
	$('#y1').val(selection.y1);
	$('#x2').val(selection.x2);
	$('#y2').val(selection.y2);
	$('#w').val(selection.width);
	$('#h').val(selection.height);
}

$(document).ready(function () {
	$('#save_thumb').click(function() {
		var x1 = $('#x1').val();
		var y1 = $('#y1').val();
		var x2 = $('#x2').val();
		var y2 = $('#y2').val();
		var w = $('#w').val();
		var h = $('#h').val();
		if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
			alert("你必须先做出一个选区！");
			return false;
		}else{
			return true;
		}
	});
});

$(window).load(function () {
	$('#thumbnail').imgAreaSelect({ aspectRatio: '5:6', onSelectChange: preview });
});

</script>
<?php
}

		if(strlen($large_photo_exists)>0){?>
		<h1>第三步——创建缩略图</h1>
		<h3>鼠标拖动创建一个选区</h3>
		<div align="center">
			<img src="<?php echo $large_image_location;?>" style="float: left; margin-right: 10px;" id="thumbnail" alt="创建缩略图" />
			<div style="float:left; position:relative; overflow:hidden; width:<?php echo $thumb_width2;?>px; height:<?php echo $thumb_height2;?>px;">
				<img src="<?php echo $large_image_location;?>" style="position: relative;" alt="缩略图预览" />
			</div>
			<br style="clear:both;"/>
			<form name="thumbnail" action="tAdd.php" method="post">
				<input type="hidden" name="x1" value="" id="x1" />
				<input type="hidden" name="y1" value="" id="y1" />
				<input type="hidden" name="x2" value="" id="x2" />
				<input type="hidden" name="y2" value="" id="y2" />
				<input type="hidden" name="w" value="" id="w" />
				<input type="hidden" name="h" value="" id="h" />
			    <p><input type="submit" name="upload_thumb" value="保存缩略图" id="save_thumb" /></p>
	        </form>
		</div>
	<hr />
	<?php
 	    }
}

if (isset($_POST["upload_thumb"])) {
    $large_image_location=$_SESSION['large_image_location'];
    $thumb_image_location=$_SESSION['thumb_image_location'];
	//Get the new coordinates to crop the image.
	$x1 = $_POST["x1"];
	$y1 = $_POST["y1"];
	$x2 = $_POST["x2"];
	$y2 = $_POST["y2"];
	$w = $_POST["w"];
	$h = $_POST["h"];
	//Scale the image to the thumb_width set above
	$scale = $thumb_width2/$w;
	$cropped = resizeThumbnailImage($thumb_image_location, $large_image_location,$w,$h,$x1,$y1,$scale);
	//Reload the page again to view the thumbnail
	echo "<script>alert('创建头像成功！');window.location.href='tAdd.php?id=$id&step=4';</script>";
}

if ($_GET['step']==4){
    $thumb_image=$_SESSION['thumb_image_location'];
	$mini_image=$_SESSION['mini_image_location'];
    $large_image=$_SESSION['large_image_location'];
	echo "正在获取原图片。。。";
	$q="SELECT * FROM fz_teachers WHERE id='$id'";
	$result=mysql_query($q) or die("查询数据失败！".mysql_error());
	$row=mysql_fetch_assoc($result);
	$del_thumb=$row['thumb_image'];
	$del_mini=$row['mini_image'];
	$del_large=$row['image'];
    echo "正在更新数据库。。。";
	$q="UPDATE fz_teachers SET image='$large_image',thumb_image='$thumb_image',mini_image='$mini_image'";
    mysql_query($q) or die("写入数据失败！".mysql_error());
	echo "正在删除原文件。。。";
	unlink($del_thumb) or die("删除文件失败！");
	unlink($del_mini) or die("删除文件失败！");
	unlink($del_large) or die("删除文件失败！");
	echo "<script>alert('更新图片成功！');window.location.href='index.php';</script>";
}
?>