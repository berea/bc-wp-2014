<?php
/**
 * Template Name: Home - Admissions V2
 */
 get_header();
?>

<div id="middlepgbg">

    <div id="sectiontitle">
        <?php bloginfo( $show ); ?>
    </div>

    <div id="middle1col">

        <?php
        if ( have_posts() ) while ( have_posts() ) : the_post();
            if ( is_front_page() ) {
            } else {
            }
            the_content();
        endwhile;
        ?>

<?php get_footer(); ?>
