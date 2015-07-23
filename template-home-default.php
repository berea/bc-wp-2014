<?php
/**
 * Template Name: Home - Default
 */
get_header('no-print-styles'); ?>

<div id="middlepgbg">
    <div id="sectiontitle"><p><?php bloginfo( $show ); ?></p></div>
    <div id="middle1col">
    <?php
        if (has_post_thumbnail()) {
            the_post_thumbnail( array(515,200) );  // Other resolutions
        }
    ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
    <?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
    <?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>
    <?php endwhile; ?>

<?php get_footer(); ?>
