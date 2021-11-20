<?php
$arr = array (
		
		// 索引值 0  微信小程序友情链接	
		[
		      array(
				  'title'=>'聊仁云屋',
				  'appid'=>'wx3adac93b69afee24',
				  'url'=>'pages/index/index',
				  'img'=>'https://www.liaoren.vip/wp-center/uploads/2019/11/1573174125-f10c4d43d461631.png',
				  'introduce'=>'一位只想找富婆的傻屌'
			  )
		],
		
		// 索引值 1  QQ小程序友情链接 最多添加10个有限制
		[
		      //array('title'=>'聊仁云屋','appid'=>'1109768965','url'=>'pages/index/index','img'=>'https://www.liaoren.vip/wp-center/uploads/2019/11/1573174125-f10c4d43d461631.png','introduce'=>'一位只想找富婆的傻屌')
		    
		],

);

echo json_encode($arr);

    

?>