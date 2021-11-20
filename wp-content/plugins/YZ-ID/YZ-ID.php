<?php
/*
Plugin Name: 终极ID连续
Plugin URI: http://www.aloner.org/
Description: WordPress 文章 ID 连续之终极插件,彻底禁用自动保存和修订版本，新建文章时也不会产生无用的 auto-draft 记录。
Version: 1.0
Author: 影子
Author URI:  http://www.aloner.org/
*/


function keep_id_continuous(){
	global $wpdb;
	$lastID = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_status = 'publish' OR post_status = 'draft' OR post_status = 'private' OR ( post_status = 'inherit' AND post_type = 'attachment' ) ORDER BY ID DESC LIMIT 1");
	$wpdb->query("DELETE FROM $wpdb->posts WHERE ( post_status = 'auto-draft' OR ( post_status = 'inherit' AND post_type = 'revision' ) ) AND ID > $lastID");
	$lastID++;
	$wpdb->query("ALTER TABLE $wpdb->posts AUTO_INCREMENT = $lastID");
}
// 将函数钩在新建文章、上传媒体和自定义菜单之前。
add_filter( 'load-post-new.php', 'keep_id_continuous' );
add_filter( 'load-media-new.php', 'keep_id_continuous' );
add_filter( 'load-nav-menus.php', 'keep_id_continuous' );
// 禁用自动保存，编辑长文章前请注意手动保存。
add_action( 'admin_print_scripts', create_function( '$a', "wp_deregister_script('autosave');" ) );
// 禁用修订版本，重新编辑文章请注意备份。
remove_action( 'pre_post_update' , 'wp_save_post_revision' );