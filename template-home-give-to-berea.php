<?php
/**
 * Template Name: Home - Give to Berea
 */
get_header('no-print-styles'); ?>

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
        <div style="clear:both"></div>
    </div>
    <div id="middle1col">
        <?php
        if (has_post_thumbnail()) {
            the_post_thumbnail( array(515,200) );  // Other resolutions
        }

        if ( have_posts() ) while ( have_posts() ) : the_post();
            the_content();
            wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) );
            edit_post_link( __( 'Edit', 'twentyten' ), '', '' );
        endwhile;
        ?>
    </div>
</div>
<?php get_footer(); ?>
