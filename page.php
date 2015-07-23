<?php
/**
 * The template for displaying all pages.
 */
get_header();

?>

<div id="middlepgbg">
  <div id="sectiontitle">

    <p><?php bloginfo( $show ); ?></p>

    <!-- NOOOOOOOOOOOOOOOOOO!!! -->
    <div class="clearleft"></div>
      <?php
      wp_nav_menu( array( 'menu' => 'Top Nav Menu',
                          'container' => 'div',
                          'container_id' => 'bc-top-nav',
                          'container_class' => 'none',
                          'theme_location' => '__no_such_location',
                          'fallback_cb' => false,
                          'menu_class' => '',
                          'menu_id' => 'none'
      ) );
      ?>
    <!-- NOOOOOOOOOOOOOOOOOO!!! -->
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

          if ( have_posts() ) while ( have_posts() ) : the_post();
            if ( is_front_page() ) {
              echo"<h2>";
                the_title();
              echo"</h2>";
            } else {
              echo"<h1>";
                the_title();
              echo"</h1>";
            }

            the_content();
            wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ),
                                  'after' => '' ) );
            edit_post_link( __( 'Edit', 'twentyten' ), '', '' );
          endwhile;
          ?>
        </div>
      </div>
      <div id="col2col2">
        <div id="right-sidebar">
          <?php
          // Begin Right widget area
          if ( is_active_sidebar( 'right-sidebar' ) ) :
            dynamic_sidebar( 'right-sidebar' );
          endif;
          // Right widget area
          ?>
        </div>
      </div>
      <!-- NOOOOOOOOOOOOOOOOOO!!! -->
      <div class="clearboth"></div>

    </div>
    <!-- NOOOOOOOOOOOOOOOOOO!!! -->
    <div class="clearboth"></div>

  </div>
</div>

<?php get_footer(); ?>
