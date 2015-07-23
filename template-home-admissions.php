<?php
/**
 * Template Name: Home - Admissions
 */
 get_header();
?>

<div id="middlepgbg">

<div id="sectiontitle"><?php bloginfo( $show ); ?></div>

<div id="middle1col">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          <?php if ( is_front_page() ) { ?>
          <?php } else { ?>
          <?php } ?>
          <?php the_content(); ?>
          <?php endwhile; ?>

     <div class="col4">
            <a href="https://bereaquickestimator.studentaidcalculator.com"><div id="calculator-box"><div id="estimate-button"></div>
          </div></a>
          </div>
      <div style="clear:both"></div>
    </div>

    <div class="fourcolumn">
        <div class="col1">
            <div id="stayconnected-box">
                <div id="ooga">
                    <a href="http://www.facebook.com/berea.admissions"><div id="image-fb"></div></a>
                    <a href="http://twitter.com/BereaAdmissions"><div id="image-twitter"></div></a>
                </div>
            </div>
        </div>
        <div class="col2">&nbsp;</div>
        <div class="col3">
            <div style="margin-left:-232px; margin-top:-45px">
                <a href="http://www.berea.edu/admissions/applying-for-admission/"><img src="https://www.berea.edu/admissions/files/2015/06/ApplyTodayButtonV2016b.png"></a>
            </div>
        </div>
        <div class="col4">
            <div id="nav-postit-admissions">
            <a href="/admissions/meet-your-counselor/"><div id="counselors-button-admissions"></div></a>
            <a href="/admissions/parent-resource/"><div id="parents-button-admissions"></div></a>
            <a href="/admissions/nominate/"><div id="students-button-admissions"></div></a>
          </div>
          </div>
        <div class="clearboth"></div>
      </div>

      <div class="clearboth"></div>
    </div>
    <div class="clearboth"></div>
  </div>
<?php get_footer(); ?>
