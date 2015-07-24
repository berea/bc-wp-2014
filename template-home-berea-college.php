<?php
/**
* Template Name: Home - Berea College
*/
get_header();
?>

<div id="middlepgbg">
    <div id="middle1col">
        <div id="topnav">
            <ul>
                <li><a href="/admissions/">Prospective Students</a></li>
                <li><a href="/give-to-berea/">Give to Berea</a></li>
                <li><a href="http://www.bereacollegealumni.com/">Alumni</a></li>
                <li><a href="/campus/">Community</a></li>
            </ul>
        </div>
        <?php
        if (has_post_thumbnail()) {
            the_post_thumbnail( array(515,200) );  // Other resolutions
        }
        ?>
        <?php //THE LOOP
        if ( have_posts() ) while ( have_posts() ) : the_post();
            the_content();
            wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) );
            edit_post_link( __( 'Edit', 'twentyten' ), '', '' );
        endwhile; //END OF LOOP
        ?>
        <div id="newsfeatures">
            <h2>News &amp; Events</h2>
            <div class="lcol">
                <div class="content">
                    <!-- Start feed from BC Spotlight -->
                    <?php // Get RSS Feed(s)
                    include_once(ABSPATH . WPINC . '/feed.php');

                    // Get a SimplePie feed object from the specified feed source.
                    $rss = fetch_feed('//www.berea.edu/berea-spotlight/home-page/feed/');
                    if (!is_wp_error( $rss ) ) : // Checks that the object is created correctly
                        // Figure out how many total items there are, but limit it to 5.
                        $maxitems = $rss->get_item_quantity(1);
                        // Build an array of all the items, starting with element 0 (first element).
                        $rss_items = $rss->get_items(0, $maxitems);
                    endif;

                    if ($maxitems == 0)
                        echo '<li>No items.</li>';
                    else
                    /*
                            It's my guess that whoever worked on this before
                            meant for the else statement to go to the foreach...

                            However, with lack of brackets or closing 'endif'
                            there's no way to tell... Good luck!
                    */
                        // Loop through each feed item and display each item as a hyperlink.
                        foreach ( $rss_items as $item ) : ?>
                            <h3><a href='<?php echo esc_url( $item->get_permalink() ); ?>'
                                title='<?php echo 'Posted '.$item->get_date('j F Y | g:i a'); ?>'>

                                <?php echo esc_html( $item->get_title() ); ?>

                            </a></h3>
                            <?php echo $item->get_description();
                        endforeach;
                    ?>
                    <!-- End feed from BC Spotlight -->
                </div>
                <div class="clearboth;"></div>
            </div>
            <div class="rcol">

                <!-- Start RSS feed from BCnow -->

                <h3><?php _e('Recent News From BCnow:'); ?></h3>

                <?php
                // Get RSS Feed(s)
                include_once(ABSPATH . WPINC . '/feed.php');
                // Get a SimplePie feed object from the specified feed source.
                $rss = fetch_feed('http://bcnow.berea.edu/feed/');
                if (!is_wp_error( $rss ) ) : // Checks that the object is created correctly
                    // Figure out how many total items there are, but limit it to 5.
                    $maxitems = $rss->get_item_quantity(5);
                    // Build an array of all the items, starting with element 0 (first element).
                    $rss_items = $rss->get_items(0, $maxitems);
                endif;
                ?>
                <ul>
                    <?php
                    if ($maxitems == 0)
                        echo '<li>No items.</li>';
                    else
                        // Loop through each feed item and display each item as a hyperlink.
                        foreach ( $rss_items as $item ) : ?>
                        <li> <a href='<?php echo esc_url( $item->get_permalink() ); ?>'
                            title='<?php echo 'Posted '.$item->get_date('j F Y | g:i a'); ?>'>
                                <?php echo esc_html( $item->get_title() ); ?>
                        </a> </li>
                        <?php endforeach; ?>
                </ul>

                <!-- Stop RSS feed from BCnow -->
            </div>
            <div class="clearboth;"></div>
            <div class="morenewsftrs">
                <ul>
                    <li class="title">More Stories:</li>
                    <li><a href="http://bcnow.berea.edu">BCnow</a></li>
                    <li class="lastitem"><a href="/berea-spotlight/">Berea Spotlight</a></li>
                </ul>
            </div>
            <div class="clearboth"></div>
        </div>
        <div class="clearboth"></div>
    </div>
</div>

<?php get_footer(); ?>
