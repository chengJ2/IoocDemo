<?php

	// 1.获取数据 2.将获取到的数据组装成接口数据提通信
	require_once '../db.php';
	
	$connect = Db::getInstance()->connect();
	
	$sql = "select * from hit as a join book as b on a.bookid=b.id order by a.count desc";
	
	$result = mysql_query($sql,$connect);
	
	while ($row = mysql_fetch_assoc($result)){
		$res[] = $row;
	}
	
	
	return show(1,'success',$res);
	
//	print_r($res);

	function show($code=0,$message='error',$data=array()){
		$result = array(
			'code'=>$code,
			'message'=>$message,
			'data'=>$data,
		);
		
		echo  json_encode($result);
	}
?>