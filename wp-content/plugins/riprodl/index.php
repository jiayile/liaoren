<?php
/*
Plugin Name: RIPRO下载信息框
Plugin URI: https://www.wpmes.cn
Description: 为RIPRO主题文章内容增强插件.RIPRO5.4以下自行测试,非ripro主题请勿使用！请勿使用！请勿使用！
Author: wpmes team
Version: 1.3.3
Author URI:https://www.wpmes.cn
*/



define('RIPRODL_PATH',dirname(__FILE__));
define('RIPRODL_BASE_FILE',__FILE__);
define('RIPRODL_VERSION','1.3');
require_once RIPRODL_PATH.'/front.class.php';
require_once RIPRODL_PATH.'/theme-options.php';
new RIPRODL_DownLoadFront();
$theme = wp_get_theme(); 
if (strcmp($theme,"RiPro" )==0) {
/**
 * 文章引用
 */
function riprodl_insert_posts( $atts, $content = null ){
    extract( shortcode_atts( array(

        'ids' => ''

    ),
        $atts ) );
    global $post;
    $content = '';
    $postids =  explode(',', $ids);
    $inset_posts = get_posts(array('post__in'=>$postids));
    foreach ($inset_posts as $key => $post) {
        setup_postdata( $post );
        $category = get_the_category(get_the_ID());
        $content .=  '<div class="post-pushed-item d-flex flex-row my-4 bg-light">
    <div class="media media-3x2 rounded col-4 col-md-3">
        <a href="'.get_the_permalink().'" target="_blank" class="media-content" style="background-image:url('. esc_url(_get_post_timthumb_src()) .')"></a>
    </div>
    <div class="post-pushed-body pl-3">
        <div class="post-pushed-content ">
            <a href="'.get_the_permalink().'" target="_blank" class="post-pushed-title text-lg h-2x">'.get_the_title().'</a>
            <div class="post-pushed-desc d-none d-md-block text-sm text-secondary mt-2">
                <div class="h-2x ">'._get_excerpt($limit = 200, $after = '...').'</div>
            </div>
        </div>
        <div class="post-pushed-footer text-muted text-xs">
            <span class="d-none d-md-inline-block"><a href="'.get_category_link($category[0]).'" target="_blank">'.$category[0]->cat_name.'</a></span>
            <i class="d-none d-md-inline-block text-primary mx-1 mx-md-2">&#8212;</i>
            <time>'._timeago( get_gmt_from_date(get_the_time('Y-m-d G:i:s')) ).'</time>
        </div>
    </div>
</div>';
    }
    wp_reset_postdata();
    return $content;
}
add_shortcode('riprodl_insert_post', 'riprodl_insert_posts');
}elseif (strcmp($theme,"RiPro-子主题" )==0) {
	
	/**
 * 文章引用
 */
function riprodl_insert_posts( $atts, $content = null ){
    extract( shortcode_atts( array(

        'ids' => ''

    ),
        $atts ) );
    global $post;
    $content = '';
    $postids =  explode(',', $ids);
    $inset_posts = get_posts(array('post__in'=>$postids));
    foreach ($inset_posts as $key => $post) {
        setup_postdata( $post );
        $category = get_the_category(get_the_ID());
        $content .=  '<div class="post-pushed-item d-flex flex-row my-4 bg-light">
    <div class="media media-3x2 rounded col-4 col-md-3">
        <a href="'.get_the_permalink().'" target="_blank" class="media-content" style="background-image:url('. esc_url(_get_post_timthumb_src()) .')"></a>
    </div>
    <div class="post-pushed-body pl-3">
        <div class="post-pushed-content ">
            <a href="'.get_the_permalink().'" target="_blank" class="post-pushed-title text-lg h-2x">'.get_the_title().'</a>
            <div class="post-pushed-desc d-none d-md-block text-sm text-secondary mt-2">
                <div class="h-2x ">'._get_excerpt($limit = 200, $after = '...').'</div>
            </div>
        </div>
        <div class="post-pushed-footer text-muted text-xs">
            <span class="d-none d-md-inline-block"><a href="'.get_category_link($category[0]).'" target="_blank">'.$category[0]->cat_name.'</a></span>
            <i class="d-none d-md-inline-block text-primary mx-1 mx-md-2">&#8212;</i>
            <time>'._timeago( get_gmt_from_date(get_the_time('Y-m-d G:i:s')) ).'</time>
        </div>
    </div>
</div>';
    }
    wp_reset_postdata();
    return $content;
}
add_shortcode('riprodl_insert_post', 'riprodl_insert_posts');

}


if (strcmp($theme,"RiPro" )==0) {


if ( c7v5_get_option( 'dl_mod' ) ){
add_filter('single_template', 'my_custom_template');
function my_custom_template($single) {
    global $post;
    /* Checks for single template by post type */
        if ( c7v5_get_option('dl_style') == 'old' ) : 
            return RIPRODL_PATH. '/old.php';
		 else :
				  return RIPRODL_PATH. '/themebetter.php';
			endif;
    return $single;
}
}

add_action( 'after_setup_theme', 'opt_ver' );
function opt_ver() {
    $prefix_post_opts = '_cao_single_ver';
    CSF::createMetabox($prefix_post_opts, array(
        'title'     => '资源版本设置',
        'post_type' => 'post',
        'data_type' => 'unserialize',
        'priority'  => 'high',
    ));
    CSF::createSection($prefix_post_opts, array(
        'fields' => array(
            array(
                'id'         => 'cao_ver',
                'type'       => 'repeater',
                'title'      => '版本设置',
                'fields'     => array(
                    array(
                        'id'      => 'title',
                        'type'    => 'text',
                        'title'   => '版本号',
                        'default' => '写上该版本的版本号',
                    ),
                      array(
                        'id'      => 'time',
                        'type'    => 'text',
                        'title'   => '更新时间',
                        'default' => '此版本更新的时间如2020年1月2日',
                    ),
                    array(
                        'id'      => 'desc',
                        'type'    => 'text',
                        'title'   => '更新内容',
                        'default' => '写更新的主要内容',
                    ),
                ),
            ),
        ),
    ));
}

}elseif (strcmp($theme,"RiPro-子主题" )==0) {

if ( c7v5_get_option( 'dl_mod' ) ){
add_filter('single_template', 'my_custom_template');
function my_custom_template($single) {
    global $post;
    /* Checks for single template by post type */
        if ( c7v5_get_option('dl_style') == 'old' ) : 
            return RIPRODL_PATH. '/old.php';
		 else :
				  return RIPRODL_PATH. '/themebetter.php';
			endif;
    return $single;
}
}

add_action( 'after_setup_theme', 'opt_ver' );
function opt_ver() {
    $prefix_post_opts = '_cao_single_ver';
    CSF::createMetabox($prefix_post_opts, array(
        'title'     => '资源版本设置',
        'post_type' => 'post',
        'data_type' => 'unserialize',
        'priority'  => 'high',
    ));
    CSF::createSection($prefix_post_opts, array(
        'fields' => array(
            array(
                'id'         => 'cao_ver',
                'type'       => 'repeater',
                'title'      => '版本设置',
                'fields'     => array(
                    array(
                        'id'      => 'title',
                        'type'    => 'text',
                        'title'   => '版本号',
                        'default' => '写上该版本的版本号',
                    ),
                      array(
                        'id'      => 'time',
                        'type'    => 'text',
                        'title'   => '更新时间',
                        'default' => '此版本更新的时间如2020年1月2日',
                    ),
                    array(
                        'id'      => 'desc',
                        'type'    => 'text',
                        'title'   => '更新内容',
                        'default' => '写更新的主要内容',
                    ),
                ),
            ),
        ),
    ));
}


}


if ( c7v5_get_option( 'prismjs' ) ){
    //添加代码插入按钮
add_action('admin_init', 'insert_code_button');
function insert_code_button(){
    if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
            return;
    }
    add_filter( 'mce_external_plugins', 'add_highlight_button_plugin' );
    add_filter( 'mce_buttons', 'register_highlight_button' );
}
function register_highlight_button( $buttons ) {
    array_push( $buttons, "|", "highlight" );
    return $buttons;
}
function add_highlight_button_plugin(){
    $plugin_array['highlight'] = plugin_dir_url(RIPRODL_BASE_FILE) . '/assets/myhtml.js';
    return $plugin_array;
}
}
 if ( c7v5_get_option( 'gutenberg_mod' ) ){
// 古腾堡编辑器扩展
function zibll_block()
{
    wp_register_script(
        'zibll_block',
        plugin_dir_url(RIPRODL_BASE_FILE) . '/assets/gutenberg-extend.js',
        array('wp-blocks', 'wp-element', 'wp-rich-text')
    );
    wp_register_style(
        'zibll_block',
       plugin_dir_url(RIPRODL_BASE_FILE) . '/assets/editor-style.css',
        array('wp-edit-blocks')
    );
    wp_register_style(
        'font_awesome',
        plugin_dir_url(RIPRODL_BASE_FILE) . '/assets/font-awesome.min.css',
        array('wp-edit-blocks')
    );
    register_block_type('zibll/block', array(
        'editor_script' => 'zibll_block',
        'editor_style'  => ['zibll_block', 'font_awesome'],
    ));
}
if (function_exists('register_block_type')) {
    add_action('init', 'zibll_block');
    add_filter('block_categories', function ($categories, $post) {
        return array_merge(
            $categories,
            array(
                array(
                    'slug' => 'zibll_block_cat',
                    'title' => __('RiPRO模块', 'zibll-blocks'),
                ),
            )
        );
    }, 10, 2);
}
}
