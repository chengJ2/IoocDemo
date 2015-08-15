<?php 

	require_once './appaqi/response.php';
	
	require_once './db.php';
	
	$page=isset($_GET['page'])?$_GET['page']:1;
	$pageSize=isset($_GET['pagesize'])?$_GET['pagesize']:10;
	
	if(!is_numeric($page) ||!is_numeric($pageSize)){
		return Response::show(401,'error',"数据不合法");
	}
	
	$offset = ($page-1)*$pageSize;
	$sql = "select * from book where type=1 order by price limit ".$offset.",".$pageSize;
	
	$connect = Db::getInstance()->connect();
	$result = mysql_query($sql,$connect);
	
	$books = array();
	while ($book = mysql_fetch_assoc($result)){
		$books[] = $book;
	}

//	var_dump($books);

	if ($books){
		return Response::show(200, "获取数据成功",$books);
	}
?>