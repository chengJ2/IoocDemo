$.ajax({
	url:'http://localhost:910/php/IoocDemo/api/host.php',
	type:'get',
	dataType:'json',
	error:function(){
	
	},
	success:function(result){
		if(result.code == 1){
			html = '';
			$.each(result.data,function(key,value){
				html += '<li class=li_ul><a href="/">'+value.bookname+'</a></li>';
			});
			$("#hot_html").html(html);
		}else{
			// 
		}
	},
});
