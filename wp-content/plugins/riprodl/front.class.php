<?php
/**
 * @package    WPMES    
 * @author     WPMES
 */
class RIPRODL_DownLoadFront{

    public $post_id = 0;

	public function __construct(){
//		if(!is_single()) return;
			add_action( 'wp_head', array( $this, 'wp_head' ), 50 );
			add_action( 'wp_footer', array( $this, 'wp_foot' ), 60 );
	}

	public function wp_head(){
		$post_id = get_the_ID();
        if ( is_single() ) {
	        echo "<link rel='stylesheet' id='wbs-style-dlipp-css'  href='".plugin_dir_url(RIPRODL_BASE_FILE) . "assets/riprodl.css' type='text/css' media='all' />";
	        echo "<link rel='stylesheet' id='aliicon'  href='//at.alicdn.com/t/font_839916_ncuu4bimmbp.css?ver=5.4-alpha-46770' type='text/css' media='all' />";
	        echo "<link rel='stylesheet' id='wbs-style-dlipp-css'  href='".plugin_dir_url(RIPRODL_BASE_FILE) . "assets/prism.css' type='text/css' media='all' />";
        }
    }
    public function wp_foot(){
		$post_id = get_the_ID();
        if ( is_single() ) {
			echo "<script type='text/javascript' src='https://cdn.staticfile.org/twitter-bootstrap/4.4.1/js/bootstrap.min.js'></script>";
			echo "<script type='text/javascript' src='".plugin_dir_url(RIPRODL_BASE_FILE) . "assets/riprodl.js'></script>";
			
					echo "<script type='text/javascript' src='".plugin_dir_url(RIPRODL_BASE_FILE) . "assets/prism.js'></script>";
			
        }
    }
}


