<?php
/**
 * The main template file.
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
                    /* Run the loop to output the posts.
                     * If you want to overload this in a child theme then include a file
                     * called loop-index.php and that will be used instead.
                     */
                     get_template_part( 'loop', 'index' );

                    if ( have_posts() ) while ( have_posts() ) : the_post();

                        if ( is_front_page() ) {
                            echo "<h2>";
                                the_title();
                            echo "</h2>";
                        } else {
                            echo "<h2>";
                                the_title();
                            echo "</h2>";
                        }

                        the_content();
                        wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) );
                        edit_post_link( __( 'Edit', 'twentyten' ), '', '' );

                    endwhile;
                    ?>
                </div>
            </div>

            <div id="col2col2"></div>
            <div class="clearboth"></div>
        </div>
    <div class="clearboth"></div>
    </div>
</div>

<?php get_footer(); ?>
