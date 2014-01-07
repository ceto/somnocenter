<?php
/**
 * Custom functions
 */


/********* Custom MetaBoxes for Regular Pages and Posts ****************/


add_filter( 'cmb_meta_boxes', 'cmb_page_metaboxes' );
function cmb_page_metaboxes( array $meta_boxes ) {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_cmb_';

  $meta_boxes['page_metabox'] = array(
    'id'         => 'page_metabox',
    'title'      => __( 'Additional Content', 'root' ),
    'pages'      => array( 'page', 'post'), // Post type
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    //'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
    'fields'     => array(
      array(
        'name' => __( 'Video url', 'root' ),
        'desc' => __( 'Beágyazandó videó url-je', 'root' ),
        'id'   => $prefix . 'video',
        'type' => 'text',
        // 'repeatable' => true,
        // 'on_front' => false, // Optionally designate a field to wp-admin only
      ),
    ),
  );
  // Add other metaboxes as needed

  return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
function cmb_initialize_cmb_meta_boxes() {
  if ( ! class_exists( 'cmb_Meta_Box' ) )
    require_once 'cmb/init.php';

}