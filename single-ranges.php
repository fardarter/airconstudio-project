<?php get_header();

// Load relationship data from products according to category Split/Multi-split
if (in_category('split')) {
  // If split, only the basic products are needed.
  $options_ind = get_posts(array(
    'posts_per_page'   => -1,
    'post_type' => 'products',
    'meta_query' => array(
      array(
        'key' => 'range', // name of custom field
        'value' => '"' . get_the_ID() . '"',
        'compare' => 'LIKE'
      )
    )
  ));
} elseif (in_category('multi-split')) {
  // Multi-split data come in two levels – first the attached outdoor product; second the related basic product
  $rangebinds = array();
  $rangeIDs = array();
  $ranges_ind = get_posts(array(
    'posts_per_page'   => -1,
    'post_type' => 'products',
    'meta_query' => array(
      array(
        'key' => 'range_bind', // name of custom field
        'value' => '"' . get_the_ID() . '"',
        'compare' => 'LIKE'
      )
    )
  ));
  // Store data from connected relationship fields
  if ($ranges_ind) {
    foreach ($ranges_ind as $rind) {
      $subID = $rind->ID;
      $subrange = get_posts(array(
        'posts_per_page'   => -1,
        'post_type' => 'products',
        'meta_query' => array(
          array(
            'key' => 'range', // name of custom field
            'value' => '"' . $subID . '"',
            'compare' => 'LIKE'
          )
        )
      ));
      // Store IDs for later use
      $rangeIDs[] = $subID;
      // Store relevant WP_Post objects with ID as key.
      $rangebinds[$subID] = $subrange;
    }
  }
} ?>

<!-- Start template -->
<div class="modal"></div>
<div id="page">
  <div id="page-inner"> <?php
    include(locate_template('templates/headerbar.php')); ?>
		<main class="main" role="main">
		<!-- section -->
		<section class="maincard"> <?php
      if (have_posts()) {
        while (have_posts()) {
          the_post();
          $the_ID = $post->ID;
          $fields = get_field_objects($the_ID);
          $rangeops = get_field_objects('options_ranges');
          $brochure = checkValue($fields, 'brochure');
          $warranty = checkValue($fields, 'warranty');
          $catID = get_cat_ID('brand');
          $cats = get_the_category($the_ID); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class('single-range shadowcard'); ?>>
            <div class="range-head-wrapper shadowimgbasic animate-on-load animated" data-animation='fadeIn' data-delay='0'>
              <h2 class="animate-on-load animated" data-animation='fadeIn' data-delay='200'>
                <div class="single-title">
                  <div class="single-range-head" title="<?php the_title(); ?>">
                    <div class="link-class"> <?php
                      foreach ($cats as $cat) {
                        if(($cat->category_parent) == $catID) {
                          $catlink = get_category_link($cat->term_id); ?>
                          <a href="<?php echo $catlink ?>">
                            <div class="categorylink"><?php echo $cat->cat_name ?></div>
                          </a> <?php
                        }
                      } ?>
                    </div>
                    <div class="title-class">
                    <?php the_title(); ?>
                    </div>
                  </div>
                </div>
                <div class="rangedocuments"> <?php
                  echoValue($brochure);
                  echoValue($warranty); ?>
                </div>
              </h2>
              <div class="range-inner animate-on-load animated" data-animation='fadeIn' data-delay='300'>
                <div class='range-head range-thumb'> <?php
                  if ( has_post_thumbnail()) { ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                      <?php the_post_thumbnail('range-single', array( 'class' => 'shadowimgbasic')); // Fullsize image for the single post ?>
                    </a> <?php
                  } ?>
                </div>
                <div class="range-head range-content"> <?php
                  the_content(); ?>
                </div>
                <div class="dividercontainer">
                  <hr class="maindivider"/>
                </div>
              </div> <?php
            if (in_category('split')) {
              include(locate_template('templates/range-split.php'));
            } elseif (in_category('multi-split')) {
              include(locate_template('templates/range-multi.php'));
            } ?>
          </article>
        </div>  <?php
        }
      } else { ?>
    		<!-- article -->
    		<article>
  			      <h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
      	</article>
      </div> <!-- /article --> <?php
      } ?>
		</section>
		<!-- /section -->
		</main>
	</div>
<?php get_footer(); ?>
