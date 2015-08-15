<?php
	include_once 'response.php';
	
	require_once 'file.php';
	
	$data = array(
		'id'=>'1',
		'name'=>'cj',
		'type'=>array(1,
					array(
						'data1'=>"sunday",
						'data2'=>"monday",
						'data3'=>"Tuesday",
					),3),
		'data'=>array(
			'data1'=>"sunday",
			'data2'=>"monday",
			'data3'=>"Tuesday",
		)
	);
	
//	Response::json(200,'success',$data);
	
//	Response::xmlEncode(200,'success',$data);

	Response::show(200,'success');

	$file = new File();
//	if($file->cacheData("index_mk_cache",$data)){
//		echo "success";
//	}else{
//		echo "error";
//	}

//	if($file->cacheData("index_mk_cache")){
//		var_dump($file->cacheData("index_mk_cache"));
//		exit;
//		echo "success";
//	}else{
//		echo "error";
//	}
	
//	if($file->cacheData("index_mk_cache",null)){
//		echo "success";
//	}else{
//		echo "error";
//	}
	
?>