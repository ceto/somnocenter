<?php
/**
 * Roots initial setup and constants
 */
function roots_setup() {
  // Make theme available for translation
  load_theme_textdomain('roots', get_template_directory() . '/lang');

  // Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'roots'),
    'secondary_navigation' => __('Secondary Navigation', 'roots'),

  ));

  // Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
  add_theme_support('post-thumbnails');
  // set_post_thumbnail_size(150, 150, false);

  add_image_size('giant31', 1800, 600, true);

  add_image_size('large31', 1200, 400, true);
  add_image_size('large21', 1180, 590, true);

  add_image_size('medium31', 840, 280, true);
  add_image_size('medium21', 840, 420, true);
  add_image_size('medium11', 768, 768, true);
  
  add_image_size('small43', 480, 320, true);
  add_image_size('small31', 480, 160, true);
  add_image_size('small34', 390, 520, true);
  add_image_size('small21', 480, 240, true);
  
  add_image_size('petit34', 120, 160, true);


  // Add post formats (http://codex.wordpress.org/Post_Formats)
  // add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
  add_theme_support('post-formats', array('video','aside'));

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'roots_setup');

// Backwards compatibility for older than PHP 5.3.0
if (!defined('__DIR__')) { define('__DIR__', dirname(__FILE__)); }
