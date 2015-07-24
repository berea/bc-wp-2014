<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header();

?>

<div id="middlepgbg">
    <div id="middle1col">
        <div id="hpcontent">
            <h1><img src="/wp-content/themes/BereaCollege/images/error-pages/squirrel2-400x300.jpg" alt="Squirrel" width="400" height="300" class="photo_right" />Oops! We cannot find the page.</h1>
            <p>You may not be able to find this page because of:</p>
          <ul>
            <li>An <strong>out-of-date Bookmark or Favorite</strong>.</li>
            <li>A search engine that has an <strong>out-of-date listing for us</strong>.</li>
            <li>A <strong>mis-typed address</strong>.</li>
          </ul>
          <h2>&nbsp;</h2>
          <h3>Please try one of the following pages or use our Search at the top of this page</h3>
          <ul>
            <li><a href="/" title="Berea College Home Page">Home Page</a></li>
            <li><a href="/a-z-index/" title="Berea College A-Z Index">A-Z Index</a></li>
          </ul>
          <p></p>
            <div class="clearboth"></div>
        </div>
    <div class="clearboth"></div>
    </div>
</div>

<?php get_footer(); ?>
