<?php
/**
 * The Template for displaying all single posts.
 */

get_header(); ?>

<div id="middlepgbg">
    <div id="sectiontitle"><?php bloginfo( $show ); ?></div>
    <div id="middle">

    <?php get_sidebar(); ?>

        <div id="col2">
          <div id="col2col1">
            <div id="content">

                <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                    <h1><?php the_title(); ?></h1>
                    <p class="datetime"><?php twentyten_posted_on(); ?></p>
                    <?php the_content();

                    // If a user has filled out their description, show a bio on their entries
                    if ( get_the_author_meta( 'description' ) ) :
                    endif;

                    edit_post_link( __( 'Edit', 'twentyten' ), '', '' );
                    comments_template( '', true );

                // end of the loop.
                endwhile;
                ?>
            </div>
        </div>

        <div id="col2col2">
          <?php
            // Begin Contact Info widget area
            if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
             <div id="right-sidebar">
                <?php dynamic_sidebar( 'right-sidebar' ); ?>
             </div>

         <?php endif;
        // end Contact Info widget area ?>
        </div>

        <div class="clearboth"></div>
        </div>

    <div class="clearboth"></div>
    </div>

</div>

<?php get_footer(); ?>
