<?php 
	
// 1.连接数据库，从数据库里面获取数据
// 2.把获取到的数据填充到模板文件里面
// 3.需要把动态的页面转化为静态页面

// 为页面设置缓存时间
if (is_file('./index.shtml') && (time()-filemtime('./index.shtml'))<300){
	require_once './index.shtml';
}else{
	require_once './db.php';
	
	$connect = Db::getInstance()->connect();
	
	$sql = "select * from book";
	
	$result = mysql_query($sql,$connect);
	
	$books = array();
	
	while($row = mysql_fetch_array($result)){
		$books[] = $row;
	}
		
	ob_start();
	// 引入模板文件
	require_once './templates/tpl.php';
	
	file_put_contents('index.shtml', ob_get_contents());
	
	/*if (file_put_contents('index.shtml', ob_get_clean())){
		echo 'success';
	}else{
		echo "error";
	}*/
}
?>


