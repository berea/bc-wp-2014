<?php
/**
 * Template Name: Give to Berea - Default Page
 */
get_header(); ?>

<div id="middlepgbg">
    <div id="sectiontitle"><p><?php bloginfo( $show ); ?></p>
        <ul id="hornav">
            <li><a href="https://webapps.berea.edu/givetoberea/givenow" class="firstitem">Give Now</a></li>
            <li><a href="/give-to-berea/the-berea-fund/">Berea Fund</a></li>
            <li><a href="http://www.gftpln.org/Home.do?orgId=6211">Gift Planning</a></li>
            <li><a href="/give-to-berea/recognition/">Recognition</a></li>
            <li><a href="/give-to-berea/a-worthy-investment/">A Worthy Investment</a></li>
            <li><a href="/give-to-berea/contact-us/" class="lastitem">Contact Us</a></li>
        </ul>
        <div class="clearboth"></div>
    </div>

    <div id="middle">
        <?php get_sidebar(); ?>
        <div id="col2">
            <div id="col2col1">
                <div id="content">
                    <?php
                    if (has_post_thumbnail()) {
                        // Other resolutions
                        the_post_thumbnail( array(515,200) );
                    }

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
                    endwhile;
                    ?>
                </div>
                <div class="clearboth"></div>
            </div>
            <div id="col2col2">
                <div id="right-sidebar">
                    <?php
                    // Begin Right widget area
                    if ( is_active_sidebar( 'right-sidebar' ) ) :
                        dynamic_sidebar( 'right-sidebar' );
                    endif; // Right widget area
                    ?>
                </div>
            </div>
            <div class="clearboth"></div>
        </div>
        <div class="clearboth"></div>
    </div>
</div>
<?php get_footer(); ?>
