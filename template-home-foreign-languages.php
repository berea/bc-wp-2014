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

            if ( have_posts() ) while ( have_posts() ) : the_post();
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
