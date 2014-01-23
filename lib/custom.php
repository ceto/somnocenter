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

/*--------------------------------------------------------------------------------------
    *
    * modified bs_collapse footer support
    *
    * @author Gabor Szabó
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/
  function ceto_collapse( $atts, $content = null ) {

    if( !isset($GLOBALS['current_collapse']) )
      $GLOBALS['current_collapse'] = 0;
    else
      $GLOBALS['current_collapse']++;

    extract(shortcode_atts(array(
      "title" => '',
      "footer" => '',
      "type" => 'default',
      "active" => false
    ), $atts));

    $collapse_class='collapsed';

    if ($active) {
      $active = 'in';
      $collapse_class='';
    }
    $mod_footer=($footer!='')?'<div class="panel-footer">'.$footer.'</div>':'';
    $return = '<div class="panel panel-' . $type . '"><div class="panel-heading"><h3 class="panel-title"><a class="accordion-toggle '.$collapse_class.'" data-toggle="collapse" data-parent="#accordion-' . $GLOBALS['collapsibles_count'] . '" href="#collapse_' . $GLOBALS['current_collapse'] . '_'. sanitize_title( $title ) .'">' . $title . ' <span class="accordion-toggle-btn ion-ios7-close-empty"></span></a></h3></div><div id="collapse_' . $GLOBALS['current_collapse'] . '_'. sanitize_title( $title ) .'" class="panel-collapse collapse ' . $active . '"><div class="panel-body">' . do_shortcode($content) . ' </div></div>'.$mod_footer.'</div>';
    return $return;
  }

  
  add_action( 'init', 'somno_theme_setup' );
  function somno_theme_setup() {
    remove_shortcode( 'collapse' );
    add_shortcode('collapse', 'ceto_collapse' );
  }

