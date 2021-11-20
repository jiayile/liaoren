<?php
/*
Plugin Name: 百度搜索推送管理
Plugin URI: https://www.liaoren.vip/
Description: 百度搜索推送管理插件是一款针对WP开发的功能非常强大的百度搜索引擎收录辅助插件。利用该插件，站长可以快速实现百度搜索资源平台基础收录推送（主动和自动推送，sitemap推送）；快速收录推送及网站百度收录数据查询等。目的在于进一步提升网站的百度搜索引擎收录效率，提升网站SEO优化效果；及帮助站长通过该插件了解网站百度收录数据情况，基于数据统计参考进一步对网站内容进行调整与优化。
Author: wbolt team
Version: 3.2.7
Author URI: https://www.liaoren.vip/
Requires PHP: 5.4.0
*/

if(!defined('ABSPATH')){
    return;
}

define('BSL_PATH',dirname(__FILE__));
define('BSL_BASE_FILE',__FILE__);
define('BSL_VERSION','3.2.7');

require_once BSL_PATH.'/classes/conf.class.php';
require_once BSL_PATH.'/classes/baidu.class.php';
require_once BSL_PATH.'/classes/utils.class.php';
require_once BSL_PATH.'/classes/cron.class.php';
require_once BSL_PATH.'/classes/site.class.php';
require_once BSL_PATH.'/classes/app.class.php';
require_once BSL_PATH.'/classes/daily.class.php';
require_once BSL_PATH.'/classes/stats.class.php';
require_once BSL_PATH.'/classes/admin.class.php';

//new BSL_Admin();
BSL_Admin::init();
