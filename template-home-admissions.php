<?php
/**
 * Template Name: Home - Admissions
 */
 get_header();
?>

<div id="middlepgbg">

    <div id="sectiontitle">
        <?php bloginfo( $show ); ?>
    </div>

    <div id="middle1col">

        <?php
        if ( have_posts() ) while ( have_posts() ) : the_post();
            if ( is_front_page() ) {
            } else {
            }
            the_content();
        endwhile;
        ?>

        <div class="col4">
            <a href="https://bereaquickestimator.studentaidcalculator.com"><img src="<?php echo bloginfo('template_url'); ?>/images/financial_eligibility.png"></a><br />
            <a href="/admissions/visit-campus"><img src="<?php echo bloginfo('template_url'); ?>/images/visit_campus.png"></a>
        </div>
        <div class="clearboth"></div>
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
            <div id="admissions-margins-line-38">
                <a href="http://www.berea.edu/admissions/applying-for-admission/">
                    <img src="https://www.berea.edu/admissions/files/2015/06/ApplyTodayButtonV2016b.png">
                </a>
            </div>
        </div>
        <div class="col4">
            <div id="nav-postit-admissions">
                <a href="/admissions/meet-your-counselor/">
                    <div id="counselors-button-admissions"></div>
                </a>
                <a href="/admissions/parent-resource/">
                    <div id="parents-button-admissions"></div>
                </a>
                <a href="/admissions/nominate/">
                    <div id="students-button-admissions"></div>
                </a>
            </div>
        </div>
        <div class="clearboth"></div>
    </div>
    <div class="clearboth"></div>
</div>
<div class="clearboth"></div>
</div>
<?php get_footer(); ?>
