<?php 
	
// 1.�������ݿ⣬�����ݿ������ȡ����
// 2.�ѻ�ȡ����������䵽ģ���ļ�����
// 3.��Ҫ�Ѷ�̬��ҳ��ת��Ϊ��̬ҳ��

// Ϊҳ�����û���ʱ��
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
	// ����ģ���ļ�
	require_once './templates/tpl.php';
	
	file_put_contents('index.shtml', ob_get_contents());
	
	/*if (file_put_contents('index.shtml', ob_get_clean())){
		echo 'success';
	}else{
		echo "error";
	}*/
}
?>


