<?php
/*
Plugin Name: HTML代码优化工具
Plugin URI: https://wordpress.org/plugins/clear-html-tags/
Description: HTML代码优化工具（Clear HTML Tags）是一款站长实用的WordPress文章编辑辅助插件，可以帮助站长快速实现删除HTML代码不需要的常见HTML标签及标签属性，常用的代码格式优化。
Author: wbolt team
Version: 1.1.1
Author URI: http://www.wbolt.com/
Requires PHP: 5.3.3
*/
define('CLEAR_HTML_TAGS_PATH',dirname(__FILE__));
define('CLEAR_HTML_TAGS_BASE_FILE',__FILE__);
define('CLEAR_HTML_TAGS_VERSION','1.1.1');
define('CLEAR_HTML_TAGS_URI',plugin_dir_url(CLEAR_HTML_TAGS_BASE_FILE));

require_once CLEAR_HTML_TAGS_PATH.'/classes/admin.class.php';

new Clear_HTML_Tags_Admin();

