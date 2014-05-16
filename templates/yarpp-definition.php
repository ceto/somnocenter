<?php 

$reference_ID=get_the_id();

yarpp_related(array(
  // Pool options: these determine the "pool" of entities which are considered
  'post_type' => array('post', 'page' ),
  'show_pass_post' => false, // show password-protected posts
  'past_only' => false, // show only posts which were published before the reference post
  'exclude' => array(1200, 1202), // a list of term_taxonomy_ids. entities with any of these terms will be excluded from consideration.
  'recent' => false, // to limit to entries published recently, set to something like '15 day', '20 week', or '12 month'.
  // Relatedness options: these determine how "relatedness" is computed
  // Weights are used to construct the "match score" between candidates and the reference post
  'weight' => array(
    'body' => 1,
    'title' => 2, // larger weights mean this criteria will be weighted more heavily
    'tax' => array(
      'post_tag' => 3, // put any taxonomies you want to consider here with their weights
    )
  ),
  // Specify taxonomies and a number here to require that a certain number be shared:
  'require_tax' => array(
    'post_tag' => 1 // for example, this requires all results to have at least one 'post_tag' in common.
  ),
  // The threshold which must be met by the "match score"
  'threshold' => 2,

  // Display options:
  'template' => 'yarpp-template-somno.php', // either the name of a file in your active theme or the boolean false to use the builtin template
  'limit' => 4, // maximum number of results
  'order' => 'score DESC'
  ),
  $reference_ID, // second argument: (optional) the post ID. If not included, it will use the current post.
  true // third argument: (optional) true to echo the HTML block; false to return it
); 


?>