<?php
/**
 * Template Name: Homepage - No Banner
 */
get_header();

?>

<div id="middlepgbg">
    <div id="sectiontitle"><p><?php bloginfo( $show ); ?></p>
        <div style="clear:left"></div>
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
    <div class="clearboth"></div>
    </div>
    <div id="middle1col">
        <div id="hpcontent">
              <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail( array(915,200) );  // Other resolutions
            }

            if ( have_posts() ) while ( have_posts() ) : the_post();

                /* I sincerely question the necessity
                   to even have the if statement below.
                   It literally does nothing.... */
                if ( is_front_page() ) {
                } else {
                }
                the_content();
            endwhile; ?>
          <div class="clearboth"></div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
