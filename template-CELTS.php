<?php
/**
 * Template Name: Celts Homepage
 */
get_header(); ?>

<div id="middlepgbg">

    <div id="sectiontitle"><?php bloginfo( $show ); ?></div>

    <div id="middle1col">

        <div id="banner">
            <div id="featured" >
                <?php echo do_shortcode( "[all_in_one_bannerWithPlaylist settings_id='1']" ) ?>
            </div>
        </div>
        <div id="hpcontent">
            <?php
            if ( have_posts() ) while ( have_posts() ) : the_post();
                if ( is_front_page() ) {
                } else {
                }
              the_content();
            endwhile;
            ?>
        <div class="clearboth"></div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
