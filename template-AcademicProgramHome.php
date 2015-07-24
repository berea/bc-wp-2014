<?php
/**
 * Template Name: Academic Program Homepage
 */
get_header(); ?>

<div id="middlepgbg">
  <div id="sectiontitle">
    <?php bloginfo( $show ); ?>
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
              the_content();
              wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) );
              edit_post_link( __( 'Edit', 'twentyten' ), '', '' );
            endwhile;
          ?>
        </div>
        <!-- Changed! -->
        <div class="clearboth"></div>
      </div>
      <div id="col2col2">
        <div id="right-sidebar">
          <?php
             // Begin News widget area
               if ( is_active_sidebar( 'news' ) ) : ?>
            <div id="news">
              <div class="adbox-200px bgcolor-mineralgrey">
                <div class="adbox-content">
                  <?php dynamic_sidebar( 'news' ); ?>
                  <div class="adbox-more"> » <a href="<?php $url = site_url('/news/', 'http');
                                 echo $url;?>">more news</a> </div>
                  <div class="adbox-200px-bottom"></div>
                </div>
              </div>
            <?php endif; // End News widget area

              // Begin Events widget area
                if ( is_active_sidebar( 'events' ) ) : ?>
              <div id="events">
                <div class="adbox-200px bgcolor-leafgreen">
                  <div class="adbox-content">
                    <?php dynamic_sidebar( 'events' ); ?>
                    <div class="adbox-more"> » <a href="<?php $url = site_url('/events/', 'http');
                                   echo $url;?>">more events</a> </div>
                    <div class="adbox-200px-bottom"></div>
                  </div>
                </div>
              </div>
            <?php endif; // End Events widget area

             // Begin Right widget area
                 if ( is_active_sidebar( 'right-sidebar' ) ) :
               dynamic_sidebar( 'right-sidebar' );
             endif; // Right widget area

             ?>
          </div>
        </div>
        <!-- Changed! -->
        <div class="clearboth"></div>
      </div>
      <!-- Changed! -->
      <div class="clearboth"></div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
