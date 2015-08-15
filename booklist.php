<?php

	// 通过正则表达式去分析伪静态URL地址
	// http://localhost:910/php/IoocDemo/booklist.php?type=2&category_id=2
	
	// http://localhost:910/php/IoocDemo/booklist.php/2/2.html
	
	// 2 ==> type=php  2=>category_id=2
	
//	print_r($_SERVER);

	if(preg_match('/^\/(\d+)\/(\d+).html/', $_SERVER['PATH_INFO'],$arr)){
		//	print_r($arr);
		$type=$arr[1];
		$category_id = $arr[2];
		
		if (is_file('./booklist.shtml') && (time()-filemtime('./booklist.shtml'))<300){
			require_once './booklist.shtml';
		}else{
		
			require_once './db.php';
		
			$connect = Db::getInstance()->connect();
			
			$sql = "select * from book where type=".$type." and category_id=".$category_id;
			
			$result = mysql_query($sql,$connect);
			
			$bookslist = array();
			
			while($row = mysql_fetch_array($result)){
				$bookslist[] = $row;
			}
			
			ob_start();
			// 引入模板文件
			require_once './templates/tplist.php';
			
			file_put_contents('booklist.shtml', ob_get_contents());
		}
	}else{
		// todo
	}
?>