<?php
/*
Template Name: Orvosok Lista
*/
?>
<?php get_template_part('templates/page', 'headerfigure'); ?>

<?php
$allUsers = get_users('orderby=post_count&order=DESC');
$users = array();

// Remove subscribers from the list as they won't write any articles
foreach($allUsers as $currentUser)
{
  if(!in_array( 'subscriber', $currentUser->roles ))
  {
    $users[] = $currentUser;
  }
}

?>
<section class="orvoslista-blokk">
  <?php foreach($users as $user)  { ?>
        <?php if  ( get_user_meta($user->ID, '_cmb_orvose', true) ) :?>
        <div id="orvos-<?php echo $user->ID; ?>" class="orvoskocka">
          <div class="authorAvatar">
            <?php // print_r($user); ?>
            <a class="orvos-figure" data-toggle="modal" data-target="#orvosmodal-<?php echo $user->ID; ?>">
              <?php
                $ima = get_user_meta( $user->ID, '_cmb_portre_id', true );
                $imci = wp_get_attachment_image_src( $ima, 'small34');
              ?>
              <img src="<?php echo $imci[0]; ?>" width="<?php echo $imci[1]; ?>" height="<?php echo $imci[2]; ?>" alt="<?php echo $user->display_name; ?>" class="orvos-thumb">
            </a>
          </div>
          <div class="authorInfo">
            <h3><?php echo $user->display_name; ?></h3>
            <p class="titulus"><?php echo get_user_meta($user->ID, '_cmb_titulus', true); ?></p>
            <p class="city"><?php echo get_user_meta($user->ID, '_cmb_city', true); ?></p>
            <!--p class="authorLinks"><a href="<?php echo get_author_posts_url( $user->ID ); ?>">View Author Links</a></p -->
          </div>

          <div id="orvosmodal-<?php echo $user->ID; ?>" class="authorCv modal fade">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, laborum, dolorum, eaque, qui aliquid ex at deserunt ut ea nihil quis voluptate ratione voluptatibus molestias rerum vitae expedita nemo optio.</p>
          </div>
        </div>
      <?php endif; ?>
      <?php  }  ?>
</section>