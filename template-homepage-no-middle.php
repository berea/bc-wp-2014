<?php
/**
 * Template Name: Homepage - No Middle
 */
get_header(); ?>

<div id="middlepgbg">
    <div id="sectiontitle"><?php bloginfo( $show ); ?></div>
    <div id="middle1col">
        <div id="hpcontent">
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            <?php if ( is_front_page() ) { ?>
            <?php } else { ?>
            <?php } ?>
            <?php the_content(); ?>
            <?php endwhile; ?>
            <div style="clear:both"></div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
