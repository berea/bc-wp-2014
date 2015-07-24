<?php
/**
 * Template Name: Bio
 */
get_header(); ?>

<div id="middlepgbg">
    <div id="sectiontitle"><?php bloginfo( $show ); ?></div>
    <div id="middle">

        <?php get_sidebar(); ?>

        <div id="col2">
            <div id="col2col1">
                <div id="content">
                    <div class="floatright;"><?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail( array(300,300) );  // Other resolutions
                    } ?>
                    </div>

                    <?php  //The Loop
                    if ( have_posts() ) while ( have_posts() ) : the_post();

                        if ( is_front_page() ) {
                            echo "<h2>";
                                the_title();
                            echo "</h2>";
                        } else {
                            echo "<h1>";
                                the_title();
                            echo "</h1>";
                        }

                        the_content();
                        wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) );
                        edit_post_link( __( 'Edit', 'twentyten' ), '', '' );

                    endwhile; //End of the loop
                    ?>
                </div>
                <div class="clearboth"></div>
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
    </div>`
</div>

<?php get_footer(); ?>
