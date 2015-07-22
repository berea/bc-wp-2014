<?php
/**
 * The template for displaying Author Archive pages.
 */
get_header(); ?>

<?php
	/* Queue the first post, that way we know who
	 * the author is when we try to get their name,
	 * URL, description, avatar, etc.
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>

<div id="middlepgbg">
	<div id="sectiontitle"><?php bloginfo( $show ); ?></div>
	<div id="middle">

		<?php get_sidebar(); ?>

		<div id="col2">
		  <div id="col2col1">
		    <div id="content">

					<h1>Recent Posts from <?php printf( '%s', get_the_author() ); ?></h1>

					<?php
						/* Since we called the_post() above, we need to
						 * rewind the loop back to the beginning that way
						 * we can run the loop properly, in full.
						 */
						rewind_posts();

						/* Run the loop for the author archive page to output the authors posts
						 * If you want to overload this in a child theme then include a file
						 * called loop-author.php and that will be used instead.
						 */
						 get_template_part( 'loop', 'author' );
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

			<div style="clear:both"></div>
		</div>
		<div style="clear:both"></div>
	</div>
</div>
<?php get_footer(); ?>
