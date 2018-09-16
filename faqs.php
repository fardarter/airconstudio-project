<?php /* Template Name: FAQs */
get_header();

$args = array(
  'post_type' => 'faqs',
	'posts_per_page' => -1,
);

$the_faqs = new WP_Query( $args );

$page_title = $wp_query->post->post_title; ?>
<div class="modal"></div>
<div id="page" class="faqs"> <?php
  include(locate_template('templates/headerbar.php')); ?>
  <div id="page-inner" class="clearfix">
    <div class="main">
      <div class="headercard">
        <div class="shadowcard">
          <h1> <?php
            echo $page_title; ?>
          </h1>
        </div>
      </div>
      <section class="maincard"> <?php
        if($the_faqs->have_posts()) {
          while ($the_faqs->have_posts()) {
            $the_faqs->the_post();
            $the_ID = $post->ID; ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('animated faqs-post range shadowcard'); ?> data-animation='fadeInUp' data-delay='0'>
              <h3> <?php
                the_title(); ?>
              </h3> <?php
              the_content(); ?>
            </article> <?php
          }
        } ?>
      </section>
    </div>
  </div>
<?php get_footer(); ?>
