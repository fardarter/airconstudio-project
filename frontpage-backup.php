<?php

function displayBools($bools) {
  foreach ($bools as $booled=>$tooled) {
    if ($tooled == false) {
      echo ('<li class="booled-false"><div class="bool-inner">'. $booled .'</div><div class="bool-inner"></div></li>');
    } else {
      echo ('<li class="booled-true"><div class="bool-inner">'. $booled .'</div><div class="bool-inner"><i class="fa fa-check" aria-hidden="true"></i></div></li>');
    }
  }
}

get_header();
$args = array(
  'post_type' => 'products',
	'posts_per_page' => 15
);
$the_products = new WP_Query( $args );

?>

<header></header>
<div id="page">
  <div id="page-inner">
    <div class="sidebar styleheader widestyle narrowstyle">
        <?php $logo = wp_get_attachment_image(11);
        d($logo); ?>
        <?php wp_nav_menu(); ?>
    </div>
    <div class="main">
      <?php
        if ( $the_products->have_posts() ) {
	          while ( $the_products->have_posts() ) {
              $the_products->the_post();
              $the_ID = $post->ID; ?>
              <div class="therange">
                <?php the_title(); ?>
                <div class="therange-inner"><?php
                  the_post_thumbnail();
                  if( get_field('product') ) {
                    while ( has_sub_field('product') ) {
                      // Extract bools from ACF & make dict with label value pairs
                      $thisproduct = get_field_object( 'product', $the_ID );
                      $thisproductsubs = $thisproduct['sub_fields'];
                      $localbools = array();
                      $localfields = array();
                      $localcolours = array();
                      $prodtype = get_sub_field('type');
                      foreach($thisproductsubs as $subs) {
                        if(($subs['type'] == 'number') || ($subs['type'] == 'text')) {
                          $sublabel = $subs['label'];
                          $subvalue = get_sub_field_object($subs['key']);
                          if ($subvalue['value']) {
                              $localfields[$sublabel] = $subvalue['value'];
                          }
                        }
                      }
                      // For indoor options
                      if ($prodtype == 'fullsys') { ?>
                        <div class="thebutton"></div>
                        <div class="product"><?php
                        foreach($thisproductsubs as $subs) {
                          if($subs['type'] == 'true_false') {
                            $sublabel = $subs['label'];
                            $subvalue = get_sub_field_object($subs['key']);
                            $localbools[$sublabel] = $subvalue['value'];
                          }
                        } ?>

                        <ul class="theproduct">
                           <?php
                           // Display local data
                          foreach($localfields as $key => $value) {
                            echo('<li class="product-list outdoor-option">' . $key . '</li>
                                  <li class="product-list outdoor-option">' . $value . '</li>');
                          } ?>
                        </ul> <?php
                      }
                      // For outdoor options + relational objects
                      elseif ($prodtype == 'outdoor') { ?>
                        <div class="thebutton"></div>
                        <div class="product outdoor-option">
                          <ul class="theproduct"><?php
                            // Display local data
                            foreach($localfields as $key => $value) {
                              echo('<li class="product-list outdoor-option">' . $key . '</li>
                                    <li class="product-list outdoor-option">' . $value . '</li>');
                            } ?>
                          </ul> <?php
                        foreach($thisproductsubs as $subs) {
                          if($subs['type'] == 'post_object') {
                            $subpost = get_sub_field($subs['name']);
                            // Create subposts for post_object relational field
                            if ($subpost) {
                              ?> <ul class="outdoor-subproducts"> <?php
                              foreach($subpost as $post) {
                                setup_postdata($post);
                                $the_ID2 = $post->ID;
                                if( get_field('product', $the_ID2) ) {
                                  while ( has_sub_field('product') ) {
                                    // Extract bools from ACF & make dict with label value pairs
                                    $thisproduct = get_field_object( 'product', $the_ID2 );
                                    $thisproductsubs = $thisproduct['sub_fields'];
                                    $localbools2 = array();
                                    $localfields2 = array();
                                    $localcolours2 = array();
                                    $prodtype = get_sub_field('type');
                                    foreach($thisproductsubs as $subs) {
                                      if(($subs['type'] == 'number') || ($subs['type'] == 'text')) {
                                        $sublabel = $subs['label'];
                                        $subvalue = get_sub_field_object($subs['key']);
                                        if ($subvalue['value']) {
                                          $localfields2[$sublabel] = $subvalue['value'];
                                        }
                                      }
                                    }
                                    if ($prodtype == 'outdoor') {
                                      echo ('error, outdoor products cannot be selection in objects');
                                    }
                                    if ($prodtype == 'fullsys') {
                                      foreach($thisproductsubs as $subs) {
                                        if($subs['type'] == 'true_false') {
                                          $sublabel = $subs['label'];
                                          $subvalue = get_sub_field_object($subs['key']);
                                          $localbools2[$sublabel] = $subvalue['value'];
                                        }
                                      }
                                      ?>
                                    <li class="product outdoor-suboption">
                                      <ul class="theproduct"> <?php
                                        // Display local data
                                        foreach($localfields2 as $key => $value) {
                                          echo('<li class="product-list outdoor-option">' . $key . '</li>
                                                <li class="product-list outdoor-option">' . $value . '</li>');
                                        } ?>
                                      </ul>
                                      <ul class="thebools"> <?php
                                          displayBools($localbools2); ?>
                                      </ul>
                                    </li> <?php
                                    }
                                  }
                                }
                              } ?>
                            </ul>
                          </ul> <?php
                          wp_reset_postdata();
                            }
                          }
                        }
                      }
                      if($localbools) { ?>
                        <ul class="thebools"> <?php
                            displayBools($localbools); ?>
                        </ul> <?php
                      } ?>
                    </ul>
                  </div> <?php
                    }
                  } ?>
                </div>
              </div> <?php
            }
          } ?>
    </div>
  </div>
</div>
<?php
get_footer();

 ?>
