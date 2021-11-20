<?php
$arr = array (
		// 索引值 0 首页金刚区域 ，其中类型type分为2中情况1.xs_default默认值跳二级，2.xs_tab跳转底部导航，3.xs_program跳转小程序
		[
		    array(
				'title'=>'搜索',
				'type'=>'xs_tap',
				'appid'=>'',
				'route'=>'/pages/search/search',
				'himg'=>'../../static/index/1.png'
			),
		    array(
			    'title'=>'分类',
				'type'=>'xs_tap',
				'appid'=>'',
				'route'=>'../category/category',
				'himg'=>'../../static/index/2.png'
			),
		    array(
				'title'=>'星球',
				'type'=>'xs_tap',
				'appid'=>'',
				'route'=>'pages/index/index',
				'himg'=>'../../static/index/3.png'
			),
			array(
				'title'=>'资源',
				'type'=>'xs_tap',
				'appid'=>'',
				'route'=>'../download/download',
				'himg'=>'../../static/index/5.png'
			),
			 array(
				'title'=>'商店',
				'type'=>'xs_program',
				'appid'=>'wx1fcdeeb8783bc707',
				'route'=>'pages/index/index',
				'himg'=>'../../static/index/4.png'
			)
		    
		],
		

);

echo json_encode($arr);

    

?>