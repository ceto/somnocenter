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
  <?php
    foreach($users as $user)
    {
      ?>
      <div id="orvos-<?php echo $user->ID; ?>" class="orvoskocka">
        <div class="authorAvatar">
          <a class="orvos-figure" data-toggle="modal" data-target="#orvosmodal-<?php echo $user->ID; ?>">
            <img src="http://placehold.it/300x400" alt="<?php echo $user->display_name; ?>">
          </a>
        </div>
        <div class="authorInfo">
          <h3>
            <a class="" data-toggle="modal" data-target="#orvosmodal-<?php echo $user->ID; ?>">
              <?php echo $user->display_name; ?>
            </a>
          </h3>
          <p class="titulus"><?php echo get_user_meta($user->ID, '_cmb_titulus', true); ?></p>
          <p class="city"><?php echo get_user_meta($user->ID, '_cmb_city', true); ?></p>
          <!--p class="authorLinks"><a href="<?php echo get_author_posts_url( $user->ID ); ?>">View Author Links</a></p -->
        </div>

        <div id="orvosmodal-<?php echo $user->ID; ?>" class="authorCv modal fade">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, laborum, dolorum, eaque, qui aliquid ex at deserunt ut ea nihil quis voluptate ratione voluptatibus molestias rerum vitae expedita nemo optio.</p>
        </div>
      </div>
      <?php
    }
  ?>
</section>