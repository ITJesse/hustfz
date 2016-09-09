<?php
function ip()    //获取客户端IP
{
  if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown'))
   {
     $ip = getenv('HTTP_CLIENT_IP');
   }
  elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown'))
   {
     $ip = getenv('HTTP_X_FORWARDED_FOR');
   }
  elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown'))
   {
     $ip = getenv('REMOTE_ADDR');
   }
  elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown'))
   {
     $ip = $_SERVER['REMOTE_ADDR'];
   }
  return preg_match("/[\d\.]{7,15}/", $ip, $matches) ? $matches[0] : 'unknown';
}

/*
function mysql_c($ip_m,$user_m,$pass_m)   //MySQL连接
{
    if(!$sql=@mysql_connect($ip_m,$user_m,$pass_m)){
		print mysql_error();
		print "<p>数据库连接失败！</p>";
	}else{
	    print "<p>连接数据库成功！</p>";
	}
}
*/


function sql($query)    //MySQL查询
{

	    if($r=mysql_query($query)){
			print mysql_error();
			print "数据库查询错误";
		}else{
		    print "<p>数据库查询成功！</p>";
		}
    
    return $r;
}



function create_file($file_path,$file_name,$str)    //生成文件
{
    $fp=fopen($file_path.$file_name,"w"); 
    fputs($fp,$str);     
    fclose($fp);
}

    function code_replace($str)
    {
        $str = str_replace("and","",$str);
        $str = str_replace("execute","",$str);
        $str = str_replace("update","",$str);
        $str = str_replace("count","",$str);
        $str = str_replace("chr","",$str);
        $str = str_replace("mid","",$str);
        $str = str_replace("master","",$str);
        $str = str_replace("truncate","",$str);
        $str = str_replace("char","",$str);
        $str = str_replace("declare","",$str);
        $str = str_replace("select","",$str);
        $str = str_replace("create","",$str);
        $str = str_replace("delete","",$str);
        $str = str_replace("insert","",$str);
        $str = str_replace("'","",$str);
        $str = str_replace(" ","",$str);
        $str = str_replace("or","",$str);
        $str = str_replace("=","",$str);
		$str = str_replace(":","",$str);
		$str = str_replace(";","",$str);
		$str = str_replace("*","",$str);
		$str = str_replace("?","",$str);
		$str = str_replace(" ","",$str);
		$str = str_replace("<","",$str);
		$str = str_replace(">","",$str);
		$str = str_replace("|","",$str);
		$str = str_replace('"',"",$str);
		$str = str_replace("\\","",$str);
		$str = str_replace("/","",$str);
		$str = str_replace(".","",$str);
        //echo $str;
        return $str;
    }

function check_email_address($email) {
  //首先，我们检查这里的@符号，然后看其长度是否正确。
    if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
    // email无效，因为某个小段中的字符数量错误或@符号的数量错误
        return false;
  }
  //将其分割成小段
  $email_array = explode("@", $email);
  $local_array = explode(".", $email_array[0]);
  for ($i = 0; $i < sizeof($local_array); $i++) {
    if
(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&
↪'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",
$local_array[$i])) {
      return false;
    }
  }
  //检查域是否是一个IP地址，如果不是，它应该是一个有效的域
  if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
    $domain_array = explode(".", $email_array[1]);
    if (sizeof($domain_array) < 2) {
        return false; // 域长度不够
    }
    for ($i = 0; $i < sizeof($domain_array); $i++) {
      if
(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|
↪([A-Za-z0-9]+))$",
$domain_array[$i])) {
        return false;
      }
    }
  }
  return true;
}	

function chs_replace($str){
    $match="/[\x{4e00}-\x{9fa5}]/u";
    $opt=preg_replace($match,"",$str);
    return $opt;
}
	
function eng_replace($str){
    $match= array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
    $opt= str_replace($match,"",$str);
    return $opt;
}	

function str_insert($str, $i, $substr){    //从后数
    for($j=0; $j<(strlen($str)-$i); $j++){ 
        $startstr .= $str[$j]; 
    } 
    for ($j=$i; $j<(strlen($str)-$i); $j++){ 
        $laststr .= $str[$j]; 
    } 
$str = ($startstr . $substr . $laststr); 
return $str; 
} 
?>
