<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Language" content="zh-cn" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="all" />
<title>首页</title>
<link type="text/css" href="public/css/index.css" rel="stylesheet"/>
<script src="public/js/jquery-1.7.2.js" language="javascript"></script>
</head>

<body>
	<ul>
	<?php foreach ($books as $k=>$v) {?>
		<li><?php echo $v['bookname']?></li>
		<?php }?>
	</ul>
	
	<br />
	
	<ul	id="hot_html">
	</ul>
	
	<script src="public/js/hot.js"></script>
</body>

</html>
