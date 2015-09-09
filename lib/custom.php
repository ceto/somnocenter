<?php
/**
 * Custom functions
 */

define('ICL_DONT_LOAD_NAVIGATION_CSS', TRUE);
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', TRUE);
define('ICL_DONT_LOAD_LANGUAGES_JS', TRUE);


remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );



if ( file_exists(  __DIR__ . '/CMB2/init.php' ) ) {
  require_once  __DIR__ . '/CMB2/init.php';
}





/********* Custom MetaBoxes for Regular Pages and Posts ****************/


add_filter( 'cmb2_meta_boxes', 'cmb_page_metaboxes' );
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
        'name' => __( 'Alcím', 'root' ),
        'desc' => __( 'Ez jelenik meg a főcím alatt a fejben', 'root' ),
        'id'   => $prefix . 'subtitle',
        'type' => 'text',
      ),
      array(
        'name' => __( 'Video url', 'root' ),
        'desc' => __( 'Beágyazandó videó url-je', 'root' ),
        'id'   => $prefix . 'video',
        'type' => 'text',
        // 'repeatable' => true,
        // 'on_front' => false, // Optionally designate a field to wp-admin only
      ),
      array(
        'name' => __( 'Kiegészítő tartalom', 'root' ),
        'desc' => __( 'Pl. Galléria vagy Kérdő0v shortcode', 'root' ),
        'id'   => $prefix . 'addcont',
        'type' => 'text',
        // 'repeatable' => true,
        // 'on_front' => false, // Optionally designate a field to wp-admin only
      ),

    ),
  );


  $meta_boxes['home'] = array(
      'id'         => 'homemeta',
      'title'      => 'Slider & Adblock',
      'object_types'  => array( 'page'),
      'show_on'      => array( 'key' => 'page-template', 'value' => 'page-home.php' ),
      'context'    => 'normal',
      'priority'   => 'high',
      'show_names' => true,
      'fields'     => array (
              array (
                  'id' => 'slides',
                  'type' => 'group',
                  'description' => 'Slide show',
                  'options'     => array (
                      'group_title'   => 'Slide {#}', 
                      'add_button'    => 'Új Slide',
                      'remove_button' => 'Slide törlése',
                      'sortable'      => true, // beta
                  ),
                  'fields'     => array(
                      array (
                          'name' => 'Cím',
                          'id'   => 'title',
                          'type' => 'text_medium',
                      ),
                      array (
                          'name' => 'Alcím',
                          'id'   => 'subtitle',
                          'type' => 'text',
                      ),
                      array (
                          'name' => 'Gomb szöveg',
                          'id'   => 'button',
                          'type' => 'text_small',
                      ),
                      array (
                          'name' => 'Gomb link',
                          'id'   => 'url',
                          'type' => 'text_url',
                      ),

                      array (
                          'name' => 'Kép',
                          'description' => 'min: 1600×600',
                          'id'   => 'photo',
                          'type' => 'file',
                      ),
              ) // end of fields
          ),

          array (
                  'id' => 'ads',
                  'type' => 'group',
                  'description' => 'Kiemelt ajánlatok',
                  'options'     => array (
                      'group_title'   => 'Ad {#}', 
                      'add_button'    => 'Új Ad',
                      'remove_button' => 'Ad törlése',
                      'sortable'      => true, // beta
                  ),
                  'fields'     => array(
                      array (
                          'name' => 'Cím',
                          'id'   => 'title',
                          'type' => 'text_medium',
                      ),
                      array (
                          'name' => 'Szöveg',
                          'id'   => 'paragpraph',
                          'type' => 'text_medium',
                      ),
                      array (
                          'name' => 'Gomb szöveg',
                          'id'   => 'button',
                          'type' => 'text_small',
                      ),
                      array (
                          'name' => 'Link',
                          'id'   => 'url',
                          'type' => 'text_url',
                      ),
                      array (
                          'name' => 'Kép',
                          'description' => 'min: 800×400',
                          'id'   => 'photo',
                          'type' => 'file',
                      ),
              ) // end of fields
          )

      ) 
  );



  $meta_boxes['landing'] = array(
    'id'         => 'landingmeta',
    'title'      => 'Kísérő információk',
    'object_types'  => array( 'page'),
    'show_on'      => array( 'key' => 'page-template', 'value' => array('page-landing.php', 'page-kozpontok.php') ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'fields'     => array (
      array (
        'id' => 'tabs',
        'type' => 'group',
        'description' => 'Fülek',
        'options'     => array (
            'group_title'   => 'Fül {#}', 
            'add_button'    => 'Új Fül',
            'remove_button' => 'Fül törlése',
            'sortable'      => true // beta
        ),
        'fields'     => array(
          array (
            'name' => 'Fül címe',
            'description' => 'Légyszi nagyon rövid',
            'id'   => 'tabtitle',
            'type' => 'text_small'
          ),
          array (
              'name' => 'Fül tartalma',
              'id'   => 'tabcontent',
              'type'    => 'wysiwyg',
              'options' => array(
                  'wpautop' => true, // use wpautop?
                  'media_buttons' => false, // show insert/upload button(s)
                  'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
                  'teeny' => true
              )
          )
               
       ) // end of group fields
     )

    ) 
  );


  /**
   * Metabox for the user profile screen
   */
  $meta_boxes['user_edit'] = array(
    'id'            => 'user_edit',
    'title'         => __( 'User Profile Metabox', 'root' ),
    'pages'         => array( 'user' ), // Tells CMB to use user_meta vs post_meta
    'show_names'    => true,
    // 'cmb_styles' => true, // Show cmb bundled styles.. not needed on user profile page
    'fields'        => array(
      array(
        'name' => __( 'Megjelenik az orvosok listában', 'root' ),
        'id'   => $prefix . 'orvose',
        'type' => 'checkbox',
      ),
      array(
        'name'    => __( 'Portré fotó', 'root' ),
        'desc'    => __( 'Aspect ratio 3×4', 'root' ),
        'id'      => $prefix . 'portre',
        'type'    => 'file',
        'save_id' => true,
      ),
      array(
        'name' => __( 'Foglalkozás, titulus', 'root' ),
        'id'   => $prefix . 'titulus',
        'type' => 'textarea_small',
      ),
      array(
        'name' => __( 'Város', 'root' ),
        'id'   => $prefix . 'city',
        'type' => 'text_small',
      ),
      array(
        'name' => __( 'Orvos önéletrajz', 'root' ),
        'id'   => $prefix . 'cv',
        'type' => 'wysiwyg',
      ),
    )
  );
  // Add other metaboxes as needed

  return $meta_boxes;
}




// add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
// function cmb_initialize_cmb_meta_boxes() {
//   if ( ! class_exists( 'cmb_Meta_Box' ) )
//     require_once 'cmb/init.php';

// }

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


// add tag support to pages
function somno_tags_support_all() {
  register_taxonomy_for_object_type('post_tag', 'page');
}

// ensure all tags are included in queries
function somno_tags_support_query($wp_query) {
  if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
}

// tag hooks
add_action('init', 'somno_tags_support_all');
add_action('pre_get_posts', 'somno_tags_support_query');


# Deregister style files
function somno_DequeueYarppStyle()
{
  wp_dequeue_style('yarppRelatedCss');
  wp_deregister_style('yarppRelatedCss');
}
add_action('wp_footer', somno_DequeueYarppStyle);


# WPSS Styles Remove
function somno_remove_wpss_styles() {
  if(!is_admin()){ 
    wp_deregister_style( 'wpss-style' );
    wp_deregister_style( 'wpss-custom-db-style' );
  }
}
add_action( 'wp_print_styles', 'somno_remove_wpss_styles', 100 );

# Deregister scripts file
function somno_remove_scripts () {
  if(!is_admin()){ 
    wp_deregister_script('jquery-wp-simple-survey');
    wp_deregister_script('wpss');
    wp_deregister_script('bootstrap-shortcodes-tooltip');
    wp_deregister_script('bootstrap-shortcodes-popover');

  }
}
add_action('wp_print_scripts', 'somno_remove_scripts', 11);
