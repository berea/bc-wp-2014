<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 * Changed by Cary Hazelwood on Sept. 7, 2012
 */
?>

<div id="col1">
	<div id="wp-leftcolumn">
		<ul>


			<div id="wp-leftnav">

				<?php
				// Begin Left Nav widget area
				if ( ! dynamic_sidebar( 'left-nav' ) ) : ?>
				<?php endif; // end left nav widget area ?>

			</div>

			<?php
			// Begin Related Links widget area
			if ( is_active_sidebar( 'related-links' ) ) : ?>

				<div id="related-links">
                <p class="title">Related Links</p>
					<?php dynamic_sidebar( 'related-links' ); ?>
				</div>

			<?php endif;
			// end Related Links widget area ?>

			<?php
			// Begin Contact Info widget area
			if ( is_active_sidebar( 'contact-info' ) ) : ?>

				<div id="contactinfo">
					<?php dynamic_sidebar( 'contact-info' ); ?>
				</div>

			<?php endif;
			// end Contact Info widget area ?>

		</ul>
	</div>
</div>
