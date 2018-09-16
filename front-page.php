<?php

get_header();
$the_ID = $post->ID; ?>
<div id="page" class="isflexed"> <?php
  include(locate_template('templates/headerbar.php')); ?>
  <div id="page-inner" class="clearfix thehomepage">
    <div class="main" id='mainclass'>
      <div class="maincard">
        <section class="shadowcard frontpage animate-on-load animated" data-animation='fadeIn' data-delay='0'>
          <div class="headlogo">
              <a href="<?php echo home_url();?>"><img src="<?php echo $frontops['sitelogo']['value']; ?>" alt="Aircon Studio"/></a>
          </div>
          <div class="homecontent"> <?php
            setup_postdata($the_ID);
            the_content();
            wp_reset_postdata(); ?>
          </div>
        </section>
        <section class="featureprod shadowcard frontpage animate-on-load animated" data-animation='fadeIn' data-delay='0'>
          <?php
            include(locate_template('templates/slider.php')); ?>
        </section>
        <section class="shadowcard frontpage brandsection animate-on-load animated" data-animation='fadeIn' data-delay='0'>
          <h2>Our Brands</h2>
          <div class="homebrands"> <?php
            if(have_rows('home_brands', 'options_front')) {
              while ( have_rows('home_brands', 'options_front') ) {
                the_row(); ?>
                <div> <?php
                  $cat = get_category_link(get_sub_field('brand_page'));
                  $image = wp_get_attachment_image(get_sub_field('brand_image'), 'full');
                  echo '<a href="' . $cat . '"><div class="brandlogo">' . $image . '</div></a>'; ?>
                </div> <?php
              }
            } ?>
          </div>
        </section>
        <section class="shadowcard frontpage mapsection animate-on-load animated" data-animation='fadeIn' data-delay='0'>
          <div class="themap">
            <?php echo do_shortcode('[gmap-embed id="445"]'); ?>
          </div>
        </section>
        <section class="shadowcard frontpage animate-on-load animated" data-animation='fadeIn' data-delay='0'>
        <div class="contactsubdiv contactfrontpage"> <?php
          include(locate_template('templates/contactdetails.php'));
          include(locate_template('templates/openinghours.php')); ?>
        </div>
        </section>
      </div>
    </div>
  </div>
<?php get_footer(); ?>
