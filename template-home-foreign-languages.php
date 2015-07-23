<?php
/**
 * Template Name: Home - Foreign Languages
 */
get_header(); ?>

<div id="middlepgbg">
    <div id="sectiontitle"><?php bloginfo( $show ); ?></div>
<!--


-->
<div id="middle1col">
<div id="content">
      <?php
    if (has_post_thumbnail()) {
        the_post_thumbnail( array(915,200) );  // Other resolutions
    }
    ?>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          <?php if ( is_front_page() ) { ?>
          <?php } else { ?>
          <?php } ?>
          <?php the_content(); ?>
          <?php endwhile; ?>
  <div style="clear:both"></div>
</div>
<?php get_footer(); ?>
