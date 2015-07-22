<?php

// BEGIN Load custom-widgets.php file
// -- added by Cary W. Hazelwood

if ( include( 'custom-widgets.php' ) )
{
     add_action( "widgets_init", "load_custom_widgets" );
}

function load_custom_widgets()
{
    register_widget( "BC_Widget_Code" );
}

// END Load custom-widgets.php file

// BEGIN Google Analytics Code Insertion
// -- added by Cary W. Hazelwood
// -- updated July 20, 2015 @1:45pm by Charlie Campbell
add_action('wp_footer', 'add_googleanalytics');
function add_googleanalytics() { ?>
<!-- Google Analytics BEGIN -->
<script>
 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 ga('create', 'UA-22618401-1', 'auto');
 ga('send', 'pageview');
</script>
<!-- Google Analytics END -->
<?php }
// END Google Analytics Code Insertion

// BEGIN Pingdom and Hotjar Code Insertion
// -- added by Charlie C Campbell
// -- updated Dec 12, 2014 @ 2:56 PM

add_action('wp_head', 'add_pingdom');
function add_pingdom() { ?>
<!-- Pingdom BEGIN -->
<script>
var _prum = [['id', '5422fbf0abe53de91a6e0d30'],
             ['mark', 'firstbyte', (new Date()).getTime()]];
(function() {
    var s = document.getElementsByTagName('script')[0]
      , p = document.createElement('script');
    p.async = 'async';
    p.src = '//rum-static.pingdom.net/prum.min.js';
    s.parentNode.insertBefore(p, s);
})();
</script>
<!-- Pingdom END -->
<?php }

// END Pingdom Code Insertion

add_filter( 'wp_feed_cache_transient_lifetime',
            create_function('$a', 'return 8;') );


/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/** Tell WordPress to run twentyten_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'twentyten_setup' );

if ( ! function_exists( 'twentyten_setup' ) ):
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which runs
   * before the init hook. The init hook is too late for some features, such as indicating
   * support post thumbnails.
   *
   * To override twentyten_setup() in a child theme, add your own twentyten_setup to your child theme's
   * functions.php file.
   *
   * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
   * @uses register_nav_menus() To add support for navigation menus.
   * @uses add_custom_background() To add support for a custom background.
   * @uses add_editor_style() To style the visual editor.
   * @uses load_theme_textdomain() For translation/localization support.
   * @uses add_custom_image_header() To add support for a custom header.
   * @uses register_default_headers() To register the default custom header images provided with the theme.
   * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
   *
   * @since Twenty Ten 1.0
   */
  function twentyten_setup() {

  	// This theme styles the visual editor with editor-style.css to match the theme style.
  	add_editor_style();

  	// This theme uses post thumbnails
  	add_theme_support( 'post-thumbnails' );

  	// Add default posts and comments RSS feed links to head
  	add_theme_support( 'automatic-feed-links' );

  	// Make theme available for translation
  	// Translations can be filed in the /languages/ directory
  	load_theme_textdomain( 'twentyten', TEMPLATEPATH . '/languages' );

  	$locale = get_locale();
  	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
  	if ( is_readable( $locale_file ) )
  		require_once( $locale_file );

  	// This theme uses wp_nav_menu() in one location.
  	register_nav_menus( array(
  		'primary' => __( 'Primary Navigation', 'twentyten' ),
  	) );

  	// This theme allows users to set a custom background
  	add_custom_background();

  	// Your changeable header business starts here
  	define( 'HEADER_TEXTCOLOR', '' );
  	// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
  	define( 'HEADER_IMAGE', '%s/images/headers/path.jpg' );

  	// The height and width of your custom header. You can hook into the theme's own filters to change these values.
  	// Add a filter to twentyten_header_image_width and twentyten_header_image_height to change these values.
  	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyten_header_image_width', 940 ) );
  	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyten_header_image_height', 198 ) );

  	// We'll be using post thumbnails for custom header images on posts and pages.
  	// We want them to be 940 pixels wide by 198 pixels tall.
  	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
  	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

  	// Don't support text inside the header image.
  	define( 'NO_HEADER_TEXT', true );

  	// Add a way for the custom header to be styled in the admin panel that controls
  	// custom headers. See twentyten_admin_header_style(), below.
  	add_custom_image_header( '', 'twentyten_admin_header_style' );

  	// ... and thus ends the changeable header business.

  	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
  	register_default_headers( array(
  		'berries' => array(
  			'url' => '%s/images/headers/starkers.png',
  			'thumbnail_url' => '%s/images/headers/starkers-thumbnail.png',
  			/* translators: header image description */
  			'description' => __( 'Starkers', 'twentyten' )
  		)
  	) );
  }
endif;

if ( ! function_exists( 'twentyten_admin_header_style' ) ) :
  /**
   * Styles the header image displayed on the Appearance > Header admin panel.
   *
   * Referenced via add_custom_image_header() in twentyten_setup().
   *
   * @since Twenty Ten 1.0
   */
  function twentyten_admin_header_style() {
  ?>
  <style type="text/css">
  /* Shows the same border as on front end */
  #headimg {
  	border-bottom: 1px solid #000;
  	border-top: 4px solid #000;
  }
  /* If NO_HEADER_TEXT is false, you would style the text with these selectors:
  	#headimg #name { }
  	#headimg #desc { }
  */
  </style>
  <?php
  }
endif;

/**
 * Makes some changes to the <title> tag, by filtering the output of wp_title().
 *
 * If we have a site description and we're viewing the home page or a blog posts
 * page (when using a static front page), then we will add the site description.
 *
 * If we're viewing a search result, then we're going to recreate the title entirely.
 * We're going to add page numbers to all titles as well, to the middle of a search
 * result title and the end of all other titles.
 *
 * The site title also gets added to all titles.
 *
 * @since Twenty Ten 1.0
 *
 * @param string $title Title generated by wp_title()
 * @param string $separator The separator passed to wp_title(). Twenty Ten uses a
 * 	vertical bar, "|", as a separator in header.php.
 * @return string The new title, ready for the <title> tag.
 */
function twentyten_filter_wp_title( $title, $separator )
{
	// Don't affect wp_title() calls in feeds.
	if ( is_feed() )
		return $title;

	// The $paged global variable contains the page number of a listing of posts.
	// The $page global variable contains the page number of a single post that is paged.
	// We'll display whichever one applies, if we're not looking at the first page.
	global $paged, $page;

	if ( is_search() ) {
		// If we're a search, let's start over:
		$title = sprintf( __( 'Search results for %s', 'twentyten' ), '"' . get_search_query() . '"' );
		// Add a page number if we're on page 2 or more:
		if ( $paged >= 2 )
			$title .= " $separator " . sprintf( __( 'Page %s', 'twentyten' ), $paged );
		// Add the site name to the end:
		$title .= " $separator " . get_bloginfo( 'name', 'display' );
		// We're done. Let's send the new title back to wp_title():
		return $title;
	}

	// Otherwise, let's start by adding the site name to the end:
	$title .= get_bloginfo( 'name', 'display' );

	// If we have a site description and we're on the home/front page, add the description:
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $separator " . sprintf( __( 'Page %s', 'twentyten' ),
                                        max( $paged, $page ) );

	// Return the new title to wp_title():
	return $title;
}
add_filter( 'wp_title', 'twentyten_filter_wp_title', 10, 2 );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_page_menu_args( $args )
{
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentyten_page_menu_args' );

/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since Twenty Ten 1.0
 * @return int
 */
function twentyten_excerpt_length( $length )
{
	return 40;
}
add_filter( 'excerpt_length', 'twentyten_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since Twenty Ten 1.0
 * @return string "Continue Reading" link
 */
function twentyten_continue_reading_link()
{
	return ' <a href="'. get_permalink() . '">'
         . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyten' )
         . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyten_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string An ellipsis
 */
function twentyten_auto_excerpt_more( $more )
{
	return ' &hellip;' . twentyten_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentyten_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function twentyten_custom_excerpt_more( $output )
{
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= twentyten_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'twentyten_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in Twenty Ten's style.css.
 *
 * @since Twenty Ten 1.0
 * @return string The gallery style filter, with the styles themselves removed.
 */
function twentyten_remove_gallery_css( $css )
{
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'twentyten_remove_gallery_css' );

if ( ! function_exists( 'twentyten_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyten_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_comment( $comment, $args, $depth )
{
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	   ?>
    	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    		<div id="comment-<?php comment_ID(); ?>">
      		<div class="comment-author vcard">
      			<?php echo get_avatar( $comment, 40 );
      			printf( __( '%s <span class="says">says:</span>', 'twentyten' ),
                    sprintf( '<cite class="fn">%s</cite>',
                              get_comment_author_link() ) ); ?>
      		</div><!-- .comment-author .vcard -->
      		<?php if ( $comment->comment_approved == '0' ) : ?>
      			<em>
              <?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?>
            </em>

      			<br />
      		<?php endif;   //if ( $comment->comment_approved == '0' ) ?>

      		<div class="comment-meta commentmetadata">
            <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
      			<?php
      				/* translators: 1: date, 2: time */
      				printf( __( '%1$s at %2$s', 'twentyten' ),
                      get_comment_date(),
                      get_comment_time() );
            ?></a>
            <?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' ); ?>
      		</div><!-- .comment-meta .commentmetadata -->

      		<div class="comment-body">
            <?php comment_text(); ?>
          </div>

      		<div class="reply">
      			<?php
            comment_reply_link(
              array_merge( $args,
              array( 'depth' => $depth,
                     'max_depth' => $args['max_depth'] ) ) );
            ?>
      		</div><!-- .reply -->
    	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p>
      <?php
        _e( 'Pingback:', 'twentyten' );
        comment_author_link();
        edit_comment_link( __('(Edit)', 'twentyten'), ' ' );
      ?>
    </p>
	<?php
			break;
	endswitch;
}
endif;

function twentyten_widgets_init()
{

	// Left Nav
	register_sidebar( array(
		'name' => 'Left Nav',
		'id' => 'left-nav',
		'description' => 'Left Nav widget area',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Related Links
	register_sidebar( array(
		'name' => 'Related Links',
		'id' => 'related-links',
		'description' => 'The Related Links widget area',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Contact Info
	register_sidebar( array(
		'name' => 'Contact Info',
		'id' => 'contact-info',
		'description' => 'Contact Info widget area',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// News
	register_sidebar( array(
		'name' => 'News',
		'id' => 'news',
		'description' => 'News widget area',
		'before_title' => '<h3 class="right-sidebar">',
		'after_title' => '</h3>',
	) );

	// Events
	register_sidebar( array(
		'name' => 'Events',
		'id' => 'events',
		'description' => 'Events Sidebar widget area',
		'before_title' => '<h3 class="right-sidebar">',
		'after_title' => '</h3>',
	) );

	// Right Sidebar
	register_sidebar( array(
		'name' => 'Right Sidebar',
		'id' => 'right-sidebar',
		'description' => 'Right Sidebar widget area',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="right-sidebar" class="clearfix:after">',
		'after_title' => '</h3>',
	) );

	// DEMO
	register_sidebar( array(
		'name' => 'DEMO',
		'id' => 'demo',
		'description' => 'Demo widget area',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="demo-widget-test" class="clearfix:after">',
		'after_title' => '</h3>',
	) );

}
/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'twentyten_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head',
                 array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
                 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );

if ( ! function_exists( 'twentyten_posted_on' ) ) :
  /**
   * Prints HTML with meta information for the current post—date/time and author.
   *
   * @since Twenty Ten 1.0
   */
  function twentyten_posted_on()
  {
  	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'twentyten' ),
  		'meta-prep meta-prep-author',
  		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
  			get_permalink(),
  			esc_attr( get_the_time() ),
  			get_the_date()
  		),
  		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
  			get_author_posts_url( get_the_author_meta( 'ID' ) ),
  			sprintf( esc_attr__( 'View all posts by %s', 'twentyten' ), get_the_author() ),
  			get_the_author()
  		)
  	);
  }
endif;

if ( ! function_exists( 'twentyten_posted_in' ) ) :
  /**
   * Prints HTML with meta information for the current post (category, tags and permalink).
   *
   * @since Twenty Ten 1.0
   */
  function twentyten_posted_in()
  {
  	// Retrieves tag list of current post, separated by commas.
  	$tag_list = get_the_tag_list( '', ', ' );

  	if ( $tag_list ) {
  		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
  	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
  		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
  	} else {
  		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
  	}

  	// Prints the string, replacing the placeholders.
  	printf(
  		$posted_in,
  		get_the_category_list( ', ' ),
  		$tag_list,
  		get_permalink(),
  		the_title_attribute( 'echo=0' )
  	);

  	if (!function_exists(pointelle_get_custom_field_meta)) {

    	function pointelle_get_custom_field_meta($post_obj,$args)
      {
      	$defaults = array('field' => '',);
      	$args = wp_parse_args( $args, $defaults );
      	extract( $args, EXTR_SKIP );
      	$post_id = $post_obj->ID;
      	$value = get_post_meta($post_id, $field, true);
      	return $value;
    	}
  	}
  }
endif;
// Added to extend allowed files types in Media upload
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() )
{

  // Add *.EPS files to Media upload
  $existing_mimes['eps'] = 'application/postscript';
  // Add *.AI files to Media upload
  $existing_mimes['ai'] = 'application/postscript';
  // Add *.INDD files to Media upload
  $existing_mimes['indd'] = 'application/postscript';
  // Add *.QXP files to Media upload
  $existing_mimes['qxp'] = 'application/postscript';

  return $existing_mimes;

}
