<?php get_header(); ?>
<div class="modal"></div>
<div id="page"> <?php
  	include(locate_template('templates/headerbar.php')); ?>
		<div id="page-inner" class="clearfix cats">
		<main class="main" role="main">
      <div class="headercard">
        <div class="shadowcard">
          <h1><?php
            _e( '', 'airconstudio' ); single_cat_title(); ?>
          </h1>
        </div>
      </div>
			<section class="maincard">
				<?php

				$catstring = single_cat_title('', false);
				$args = array(
				  'post_type' => 'ranges',
					'posts_per_page' => -1,
				  'category_name' => $catstring
				);

				$the_cats = new WP_Query( $args );

				include(locate_template('templates/cat-loop.php')); ?>

			</section>
			<!-- /section -->
		</main>
	</div>
<?php get_footer(); ?>
