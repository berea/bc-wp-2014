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
                    <div id="article-list">
                        <ul>

                            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                                <h2>
                                    <a href="<?php the_permalink() ?>" rel="bookmark"
                                        title="Link to <?php the_title(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

                                <ul>
                                    <li class="datetime"><?php twentyten_posted_on(); ?></li>
                                    <li><?php the_content(); ?>

                                        <div class="clearboth"></div>

                                        <?php if ( get_the_author_meta( 'description' ) ) :
                                            // If a user has filled out their description,
                                            //show a bio on their entries
                                        endif; ?>

                                        <p id="categoryparagraph">
                                            <?php edit_post_link( __( 'Edit This Page', 'twentyten' ), '', '' ); ?>
                                        </p>

                                        <?php comments_template( '', true ); ?>
                                    </li>
                                </ul>
                            <?php endwhile; // end of the loop. ?>
                        </ul>
                    </div>

                    <?php // Pagination EVERYWHERE!!!!
                    global $wp_query;

                    // need an unlikely integer
                    $big = 999999999;

                    echo paginate_links(
                        array(
                            'base' => str_replace( $big, '%#%',
                                                   esc_url( get_pagenum_link( $big ) ) ),
                            'format' => '?paged=%#%',
                            'current' => max( 1, get_query_var('paged') ),
                            'total' => $wp_query->max_num_pages
                        ) );
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
