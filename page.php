<?php
/**
 * The template for displaying all pages.
 */
get_header(); ?>

<div id="middlepgbg">
	<div id="sectiontitle"><p><?php bloginfo( $show ); ?></p>
    <div style="clear:left"></div>
<?php wp_nav_menu( array( 'menu' => 'Top Nav Menu', 'container' => 'div', 'container_id' => 'bc-top-nav', 'container_class' => 'none', 'theme_location' => '__no_such_location', 'fallback_cb' => false, 'menu_class' => '', 'menu_id' => 'none' ) ); ?>
    <div style="clear:both"></div>
    </div>
  <div id="middle">
    <?php get_sidebar(); ?>
    <div id="col2">
      <div id="col2col1">
        <div id="content">
          <?php
		if (has_post_thumbnail()) {  
			the_post_thumbnail( array(515,200) );  // Other resolutions
		}
		?>
          <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          <?php if ( is_front_page() ) { ?>
          <h2><?php the_title(); ?></h2>
          <?php } else { ?>
          <h1><?php the_title(); ?></h1>
          <?php } ?>
          <?php the_content(); ?>
          <?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
          <?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>
          <?php endwhile; ?>
        </div>
      </div>
      <div id="col2col2">
        <div id="right-sidebar">
          <?php
	// Begin Right widget area
		if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
          <?php dynamic_sidebar( 'right-sidebar' ); ?>
          <?php endif; 
	// Right widget area ?>
        </div>
      </div>
      <div style="clear:both"></div>
    </div>
    <div style="clear:both"></div>
  </div>
</div>
<?php get_footer(); ?>
