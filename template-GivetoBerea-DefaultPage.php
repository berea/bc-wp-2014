<?php
/**
 * Template Name: Give to Berea - Default Page
 */
get_header(); ?>

<div id="middlepgbg">
	<div id="sectiontitle"><p><?php bloginfo( $show ); ?></p>
    <ul id="hornav">
    	<li><a href="https://webapps.berea.edu/givetoberea/givenow" class="firstitem">Give Now</a></li>
    	<li><a href="/give-to-berea/the-berea-fund/">Berea Fund</a></li>
    	<li><a href="http://www.gftpln.org/Home.do?orgId=6211">Gift Planning</a></li>
    	<li><a href="/give-to-berea/recognition/">Recognition</a></li>
    	<li><a href="/give-to-berea/a-worthy-investment/">A Worthy Investment</a></li>
    	<li><a href="/give-to-berea/contact-us/" class="lastitem">Contact Us</a></li>
	</ul>
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
        <div style="clear:both"></div>
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
