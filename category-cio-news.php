<?php
/**
 * CIO News
 */

get_header(); ?>

<div id="middlepgbg">
    <div id="sectiontitle"><?php bloginfo( $show ); ?></div>
    <div id="middle">

        <?php get_sidebar(); ?>

        <div id="col2">
            <div id="col2col1">
                <div id="content">
                    <?php
                    if (has_post_thumbnail())
                      the_post_thumbnail();
                    ?>

                    <?php //beginning of the loop
                    if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

                        <h1><?php the_title(); ?></h1>
                        <p><?php twentyten_posted_on(); ?></p>

                        <?php
                        the_content();
                        wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ),
                                                                    'after' => '' ) );
                        if ( get_the_author_meta( 'description' ) ) :
                        // If a user has filled out their description,
                        // show a bio on their entries
                        endif;

                        edit_post_link( __( 'Edit', 'twentyten' ), '', '' );
                        comments_template( '', true );

                    endwhile; // end of the loop.
                    ?>
                </div>
            </div>

            <div id="col2col2">
              <?php // Begin Contact Info widget area
                if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
                    <div id="right-sidebar">
                        <?php dynamic_sidebar( 'right-sidebar' ); ?>
                    </div>
                 <?php endif; // end Contact Info widget area ?>
            </div>

        <div class="clearboth"></div>
        </div>
    <div class="clearboth"></div>
    </div>
</div>
<?php get_footer(); ?>
