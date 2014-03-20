<?php
/*
Template Name: Központok Sablon
*/
?>
<script>
  var map1, map2, map3;
  var myLatlng1 = new google.maps.LatLng(47.494550, 19.021211);
  var myLatlng2 = new google.maps.LatLng(46.253847, 20.126910);
  var myLatlng3 = new google.maps.LatLng(46.080191, 18.250496);
  
  function initialize() {
      var mapOptions1 = {
        zoom: 14,
        center: myLatlng1
      };
      var mapOptions2 = {
        zoom: 14,
        center: myLatlng2
      };
      var mapOptions3 = {
        zoom: 14,
        center: myLatlng3
      };
      map1 = new google.maps.Map(document.getElementById('map-canvas-1'), mapOptions1);
      map2 = new google.maps.Map(document.getElementById('map-canvas-2'), mapOptions2);
      map3 = new google.maps.Map(document.getElementById('map-canvas-3'), mapOptions3);

      // var panoramaOptions1 = {
      //   position: myLatlng1,
      //   pov: {
      //     heading: 165,
      //     pitch: 0
      //   },
      //   zoom: 1
      // }; 
      // var myPano1 = new google.maps.StreetViewPanorama(document.getElementById('map-canvas-1'),panoramaOptions1);
      // myPano1.setVisible(true);

      //var image = 'images/beachflag.png';
      var cMarker1 = new google.maps.Marker({
          position: myLatlng1,
          map: map1,
          title: 'Somnocenter'
          //icon: image
      });
      var cMarker2 = new google.maps.Marker({
          position: myLatlng2,
          map: map2,
          title: 'Somnocenter'
          //icon: image
      });
      var cMarker3 = new google.maps.Marker({
          position: myLatlng3,
          map: map3,
          title: 'Somnocenter'
          //icon: image
      });
       
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div class="clearfix felteke">
<div class="jobbfel">
<?php
  $the_center=new WP_Query(array(
    'post_type' => 'page;',
    'posts_per_page' => -1,
    'post_parent' => get_the_ID()
    
  ));
?>
<ul class="nav nav-tabs clearfix" id="centerTab">
  <?php while ($the_center->have_posts()) : $the_center->the_post(); ?>
    <li <?php echo (++$i==1)?'class="active"':'' ?>>
      <a href="#center-<?php echo $i; ?>" data-toggle="tab">
        <?php the_title() ?>
      </a>
    </li>
  <?php endwhile; ?>
</ul>
<?php 
  wp_reset_query();
  $i=0;
?>
<div class="tab-content">
  <?php while ($the_center->have_posts()) : $the_center->the_post(); ?>
    <section id="center-<?php echo ++$i; ?>" <?php post_class('tab-pane fade center-'.$i.' '.(($i==1)?'active in':'') ); ?> >
      <figure>
        <div class="map-canvas" id="map-canvas-<?php echo $i; ?>"></div>
      </figure>
      <h2><a href="<?php  the_permalink(); ?>">Somnocenter <?php the_title(); ?></a></h2>
      <p class="excerpt"><?php the_content(); ?></p>
    </section>
  <?php endwhile; ?>
</div>
</div><!-- /.balfel -->
<?php wp_reset_query(); ?>
<div class="balfel">
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
</div><!-- /.jobbfel -->
</div><!-- /.felteke -->
<?php get_template_part('templates/ugyerzi'); ?>
