<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */


// If there are no posts to display,
// such as an empty archive page
if ( ! have_posts() ) :

?>

    <h1><?php _e( 'Not Found', 'twentyten' ); ?></h1>
    <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>

    <?php
    get_search_form();

endif;

    /* Start the Loop.
     *
     * In Twenty Ten we use the same loop in multiple contexts.
     * It is broken into three main parts: when we're displaying
     * posts that are in the gallery category, when we're displaying
     * posts in the asides category, and finally all other posts.
     *
     * Additionally, we sometimes check for whether we are on an
     * archive page, a search page, etc., allowing for small differences
     * in the loop on each template without actually duplicating
     * the rest of the loop that is shared.
     *
     * Without further ado, the loop:
     */
while ( have_posts() ) : the_post();
    /* How to display posts in the Gallery category. */
    if ( in_category( _x('gallery', 'gallery category slug', 'twentyten') ) ) : ?>
        <h2><a href="<?php the_permalink(); ?>"
            title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ),
                                 the_title_attribute( 'echo=0' ) ); ?>"
            rel="bookmark">

            <?php the_title(); ?>

        </a></h2>

        <?php
        twentyten_posted_on();

        if ( post_password_required() ) :
            the_content();

        else :
            $images = get_children( array( 'post_parent' => $post->ID,
                                           'post_type' => 'attachment',
                                           'post_mime_type' => 'image',
                                           'orderby' => 'menu_order',
                                           'order' => 'ASC',
                                           'numberposts' => 999
                      ) );

            $total_images = count( $images );
            $image = array_shift( $images );
            $image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
        ?>
            <a href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>

            <p>
                <?php
                printf( __( 'This gallery contains <a %1$s>%2$s photos</a>.', 'twentyten' ),
                        'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'twentyten' ),
                         the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
                        $total_images
                );
                ?>
            </p>


        <?php
        the_excerpt();
        endif;
        ?>

    <a href="<?php echo get_term_link( _x('gallery', 'gallery category slug', 'twentyten'), 'category' ); ?>"
        title="<?php esc_attr_e( 'View posts in the Gallery category', 'twentyten' ); ?>">
        <?php _e( 'More Galleries', 'twentyten' ); ?>
    </a>
                    |
    <?php
    comments_popup_link( __( 'Leave a comment', 'twentyten' ),
                         __( '1 Comment', 'twentyten' ),
                         __( '% Comments', 'twentyten' )
    );
    edit_post_link( __( 'Edit', 'twentyten' ), '|', '' );

  /* How to display posts in the asides category */
    elseif ( in_category( _x('asides', 'asides category slug', 'twentyten') ) ) :

        if ( is_archive() || is_search() ) : // Display excerpts for archives and search.
            the_excerpt();
        else :
            the_content( __( 'Continue reading &rarr;', 'twentyten' ) );
        endif;

        twentyten_posted_on();
        echo "|";

        comments_popup_link( __( 'Leave a comment', 'twentyten' ),
                             __( '1 Comment', 'twentyten' ),
                            __( '% Comments', 'twentyten' )
        );
        edit_post_link( __( 'Edit', 'twentyten' ), '| ', '' );


 /* How to display all other posts. */
    else : ?>
        <h2><a href="<?php the_permalink(); ?>"
            title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ),
                                 the_title_attribute( 'echo=0' ) ); ?>"
            rel="bookmark">
            <?php the_title(); ?>
        </a></h2>

        <!-- NOOOOOOOOOOOOOOOOOOOOOOOO!!!!!!!  -->
        <div style="color: #c75b12; padding-bottom:15px;">
            <?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?>
        </div>

        <?php

        // Only display excerpts for archives and search.
        if ( is_archive() || is_search() ) :
                the_excerpt();
        else :
            global $more;
                $more = 0;
                the_content( __( '<ul><li class="listchevron-green">Continue reading &rarr;</li></ul>', 'twentyten' ) );
                wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) );
        endif;

        ?>
        <!-- NOOOOOOOOOOOOOOOOOOOOOOOO!!!!!!!  -->
        <div style="padding:5px; background-color:#E4E4E4; border:1px dashed #ccc;">
            <?php
            if ( count( get_the_category() ) ) :
                printf( __( 'Posted in %2$s', 'twentyten' ),
                            'entry-utility-prep entry-utility-prep-cat-links',
                            get_the_category_list( ', ' ) ); ?>

                <!-- NOOOOOOOOOOOOOOOOOOOOOOOO!!!!!!!  -->
                <span style="padding-left:8px;">|<span style="padding-left:8px;">

            <?php
            endif;

            $tags_list = get_the_tag_list( '', ', ' );

            if ( $tags_list ):
                printf( __( 'Tagged %2$s', 'twentyten' ),
                            'entry-utility-prep entry-utility-prep-tag-links',
                            $tags_list );
                echo "|";
            endif;

            comments_popup_link( __( 'Leave a comment', 'twentyten' ),
                                 __( '1 Comment', 'twentyten' ),
                                 __( '% Comments', 'twentyten' )
            );
            edit_post_link( __( 'Edit', 'twentyten' ), '| ', '' );
            ?>
        </div>

        <?php comments_template( '', true );

    endif; // This was the if statement that broke the loop into three parts based on categories.
endwhile; // End the loop. Whew.

/* Display navigation to next/previous pages when applicable */
?>
<!-- NOOOOOOOOOOOOOOOOOOOOOOOO!!!!!!!  -->
<div style="padding-top:15px;">
<?php
if (  $wp_query->max_num_pages > 1 ) :
    next_posts_link( __( '&larr; Older posts', 'twentyten' ) );
    previous_posts_link( __( 'Newer posts &rarr;', 'twentyten' ) );
endif;
?>
</div>
