<?php

/*
  Plugin Name: Thumbnails
  Plugin URI: https://www.satollo.net/plugins/thumbnails
  Description: Enhances the WordPress thumbnail functions generating and caching thumbnails of any size.
  Version: 1.1.5
  Author: Stefano Lissa
  Author URI: https://www.satollo.net
  License: GPLv2 or later
  Requires at least: 4.6
  Requires PHP: 5.6
 */

class Thumbnails {

    var $options;
    static $instance;

    public function __construct() {
        self::$instance = $this;
        add_action('init', array($this, 'init'));
        $this->options = get_option('thumbnails', array());
        if (!isset($this->options['crop_horizontal'])) {
            $this->options = array_merge(array('crop_horizontal' => 'center', 'crop_vertical' => 'center'), $this->options);
        }
    }

    function init() {
        if (is_admin()) {
            add_action('admin_menu', array($this, 'admin_menu'));
        } else {
            if (isset($this->options['enable_downsize'])) {
                add_filter('image_resize_dimensions', array($this, 'image_resize_dimensions'), 10, 6);
                add_filter('image_downsize', array($this, 'image_downsize'), 10, 3);
            }
            if (isset($this->options['enable_autowire'])) {
                add_filter('get_post_metadata', array($this, 'get_post_metadata'), 10, 4);
            }
        }
    }

    function admin_menu() {
        add_options_page('Thumbnails', 'Thumbnails', 'manage_options', 'thumbnails/admin/options.php');
    }

    /**
     * This filter allows to scale up the image when it is smaller than required.
     * 
     * @param type $preempt
     * @param type $orig_w
     * @param type $orig_h
     * @param type $new_w
     * @param type $new_h
     * @param type $crop
     * @return type
     */
    function image_resize_dimensions($preempt, $orig_w, $orig_h, $new_w, $new_h, $crop) {

        if (!$crop) {
            return null;
        }

        if (!is_array($crop)) {
            $crop = array($this->options['crop_horizontal'], $this->options['crop_vertical']);
        }

        $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

        $crop_w = round($new_w / $size_ratio);
        $crop_h = round($new_h / $size_ratio);

//        if (!is_array($crop) || count($crop) !== 2) {
//            $crop = array('center', 'center');
//        }

        list( $x, $y ) = $crop;

        if ('left' === $x) {
            $s_x = 0;
        } elseif ('right' === $x) {
            $s_x = $orig_w - $crop_w;
        } else {
            $s_x = floor(( $orig_w - $crop_w ) / 2);
        }

        if ('top' === $y) {
            $s_y = 0;
        } elseif ('bottom' === $y) {
            $s_y = $orig_h - $crop_h;
        } else {
            $s_y = floor(( $orig_h - $crop_h ) / 2);
        }

        return array(0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h);
    }

    function get_post_metadata($value, $post_id, $meta_key, $single) {
        static $is_recursing = false;

        if ($is_recursing || $meta_key !== '_thumbnail_id') {
            return $value;
        }

        $is_recursing = true; // prevent this conditional when get_post_thumbnail_id() is called
        $value = get_post_thumbnail_id($post_id);

        if (empty($value)) {
            $attachments = get_children(array('numberpost' => 1, 'post_parent' => $post_id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order'));
            if (!empty($attachments)) {
                foreach ($attachments as $id => &$attachment) {
                    $value = $id;
                    if (isset($this->options['enable_persistence']))
                        update_post_meta($post_id, $meta_key, $value);
                    break;
                }
            } else {
                // That avoids feature image search for posts which cannot have one
                if (isset($this->options['enable_persistence']))
                    update_post_meta($post_id, $meta_key, 0);
            }
        }

        $is_recursing = false;
        return $value;
    }

    /**
     * If this function return false, WP continues processing the image.
     * 
     * @global array $_wp_additional_image_sizes
     * @param boolean $downsize ???
     * @param int $id Media id
     * @param string|array $size
     * @return boolean
     */
    function image_downsize($downsize = false, $id, $size = 'medium') {

        // Standard dimensions have already been generated by WordPress
        if (!isset($this->options['enable_core']) && in_array($size, array('thumb', 'thumbnail', 'medium', 'large', 'full'))) {
            return false;
        }

        if (function_exists('wp_get_additional_image_sizes')) {
            $sizes = wp_get_additional_image_sizes();
        } else {
            global $_wp_additional_image_sizes;
            $sizes = &$_wp_additional_image_sizes;
        }

        // If the size is not defined, we need to exit because we do not have the dimenions
        if (is_string($size)) {
            // Is is a custom size? The core ones are not here.
            if (isset($sizes[$size])) {
                $width = $sizes[$size]['width'];
                $height = $sizes[$size]['height'];
                if (isset($sizes[$size]['crop'])) {
                    if ($sizes[$size]['crop']) {
                        $crop = array($this->options['crop_horizontal'], $this->options['crop_vertical']);
                    } else {
                        $crop = false;
                    }
                } else {
                    $crop = false;
                }
            } else {
                if ($size == 'thumb' || $size == 'thumbnail') {
                    $width = intval(get_option('thumbnail_size_w'));
                    $height = intval(get_option('thumbnail_size_h'));
                    $crop = true;
                } else {
                    return false;
                }
            }
        } else {
            $width = $size[0];
            $height = $size[1];
            if (isset($size[2])) {
                if ($size[2]) {
                    $crop = array($this->options['crop_horizontal'], $this->options['crop_vertical']);
                } else {
                    $crop = false;
                }
            } else {
                $crop = false;
            }
        }

        // It seems there are plugins interfering with the file name adding a space at the end (???)
        // Cannot reproduce, anyway
        $relative_file = trim(get_post_meta($id, '_wp_attached_file', true));
        $url = $this->resize($relative_file, $width, $height, $crop);

        return array($url, $width, $height, false);
    }

    function resize($relative_file, $width, $height, $crop = false) {
        // Relative and absolute name of the attached file. See get_attached_file().
        $uploads = wp_upload_dir();
        $absolute_file = $uploads['basedir'] . '/' . $relative_file;
        // Relative and absolute name of the thumbnail.
        $pathinfo = pathinfo($relative_file);
        $relative_thumb = $pathinfo['dirname'] . '/' . $pathinfo['filename'] . '-' . $width . 'x' .
                $height;
        
        // For compatibility, the "center-center" cropping is marked as "-c"
        if (is_array($crop) && $crop[0] != 'center' && $crop[1] != 'center') {
            $relative_thumb .= '-' . $crop[0] . '-' . $crop[1];
        } else if ($crop) {
            $relative_thumb .= '-c';
        }

        $relative_thumb .= '.' . $pathinfo['extension'];
        $absolute_thumb = WP_CONTENT_DIR . '/cache/thumbnails/' . $relative_thumb;

        // Thumbnail generation if needed.
        if (!file_exists($absolute_thumb) || filemtime($absolute_thumb) < filemtime($absolute_file)) {
            wp_mkdir_p(WP_CONTENT_DIR . '/cache/thumbnails/' . $pathinfo['dirname']);

            $editor = wp_get_image_editor($absolute_file);
            if (is_wp_error($editor)) {
                //echo 'error 1';
                return $uploads['baseurl'] . '/' . $relative_file;
            }

            //$editor->set_quality(80);
            $resized = $editor->resize($width, $height, $crop);

            if (is_wp_error($resized)) {
                //echo 'error 2';
                return $uploads['baseurl'] . '/' . $relative_file;
            }

            $saved = $editor->save($absolute_thumb);
            if (is_wp_error($saved)) {
                return $uploads['baseurl'] . '/' . $relative_file;
            }
        }

        return WP_CONTENT_URL . '/cache/thumbnails/' . $relative_thumb;
    }

}

new Thumbnails();