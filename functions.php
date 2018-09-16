<?php

require('kint/Kint.class.php');

require('custom-functions.php');

function acs_add_stylesheet() {
  		wp_register_style('font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css');
      wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
      wp_register_style('slick', get_stylesheet_directory_uri() . '/js/slick/slick.css');
      wp_register_style('slick-theme', get_stylesheet_directory_uri() . '/js/slick/slick-theme.css');
}

function acs_theme_enqueue_styles() {

    $parent_style = 'parent_style';
    wp_enqueue_style( $parent_style, get_template_directory_uri().'/style.css' );
    wp_enqueue_style('normalize');
	  wp_enqueue_style('googleFonts1');
    wp_enqueue_style('font-awesome');
    wp_enqueue_style('slick');
    wp_enqueue_style('slick-theme');
    wp_enqueue_style('child-style',
      get_stylesheet_directory_uri().'/style.min.css',
      array( $parent_style )
    );
}

function acs_load_fonts() {
  wp_register_style('googleFonts1', 'https://fonts.googleapis.com/css?family=Karla|Lato');
}

function acs_theme_enqueue_scripts() {
    wp_enqueue_script('scrollfire', get_stylesheet_directory_uri() . '/js/scrollfire.min.js', array('jquery'), null, true);
    wp_enqueue_script('jquery-slick', get_stylesheet_directory_uri() . '/js/slick/slick.min.js', array('jquery'), null, true);
    wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js', '', '', true);
}

function acs_create_post_type()
{
    register_taxonomy_for_object_type('category', 'airconstudio'); // Register Taxonomies for Category
    register_post_type('products', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Products', 'airconstudio'), // Rename these to suit
            'singular_name' => __('Products', 'airconstudio'),
            'add_new' => __('Add New', 'airconstudio'),
            'add_new_item' => __('Add New Product', 'airconstudio'),
            'edit' => __('Edit', 'airconstudio'),
            'edit_item' => __('Edit Product', 'airconstudio'),
            'new_item' => __('New Product', 'airconstudio'),
            'view' => __('View Product', 'airconstudio'),
            'view_item' => __('View Product', 'airconstudio'),
            'search_items' => __('Search Products', 'airconstudio'),
            'not_found' => __('No Product found', 'airconstudio'),
            'not_found_in_trash' => __('No Products found in Trash', 'airconstudio')
        ),
        "menu_position" => 7,
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => false,
        'supports' => array(
            'title'
        ),
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'category'
        ) // Add Category and Post Tags support
    ));
    register_post_type('faqs', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('FAQs', 'airconstudio'), // Rename these to suit
            'singular_name' => __('FAQs', 'airconstudio'),
            'add_new' => __('Add New', 'airconstudio'),
            'add_new_item' => __('Add New FAQ', 'airconstudio'),
            'edit' => __('Edit', 'airconstudio'),
            'edit_item' => __('Edit FAQ', 'airconstudio'),
            'new_item' => __('New FAQ', 'airconstudio'),
            'view' => __('View FAQ', 'airconstudio'),
            'view_item' => __('View FAQ', 'airconstudio'),
            'search_items' => __('Search FAQs', 'airconstudio'),
            'not_found' => __('No FAQ found', 'airconstudio'),
            'not_found_in_trash' => __('No FAQs found in Trash', 'airconstudio')
        ),
        "menu_position" => 8,
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'supports' => array(
            'title',
            'editor'
        ),
        'can_export' => true
    ));
    register_post_type('ranges', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Ranges', 'airconstudio'), // Rename these to suit
            'singular_name' => __('Ranges', 'airconstudio'),
            'add_new' => __('Add New', 'airconstudio'),
            'add_new_item' => __('Add New Range', 'airconstudio'),
            'edit' => __('Edit', 'airconstudio'),
            'edit_item' => __('Edit Range', 'airconstudio'),
            'new_item' => __('New Range', 'airconstudio'),
            'view' => __('View Range', 'airconstudio'),
            'view_item' => __('View Range', 'airconstudio'),
            'search_items' => __('Search Ranges', 'airconstudio'),
            'not_found' => __('No Ranges found', 'airconstudio'),
            'not_found_in_trash' => __('No Ranges found in Trash', 'airconstudio')
        ),
        "menu_position" => 4,
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        ),
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'category'
        ) // Add Category and Post Tags support
    ));
}
add_image_size('range-feature', 720, 456, array('center', 'center'));
add_image_size('range-single', 800, 505, array('center', 'center'));

if( function_exists('acf_add_options_page') ) {

	$parent = acf_add_options_page(array(
    'page_title' => 'General Options',
    'menu-title' => 'General Options',
    'redirect' => true,
    'position' => 9
  ));

  acf_add_options_sub_page(array(
    'page_title' => 'Ranges',
    'menu_title' 	=> 'Ranges',
    'parent_slug' => $parent['menu_slug'],
    'post_id' => 'options_ranges'

   ));

   acf_add_options_sub_page(array(
     'page_title' => 'Contact information',
     'menu_title' 	=> 'Contact information',
     'parent_slug' => $parent['menu_slug'],
     'post_id' => 'options_contact'
    ));

    acf_add_options_sub_page(array(
      'page_title' => 'Front page',
      'menu_title' 	=> 'Front page',
      'parent_slug' => $parent['menu_slug'],
      'post_id' => 'options_front'
     ));
}

// function acs_calcbtu_area($capacity_btu) {
//   $area = ($capacity_btu + 547.66)/147.16;
//   $area = pow($area, 10/7);
//   $area = $area*0.092903;
//   $area = round($area);
//   $area = (int) $area;
//   return $area;
// }

function acs_calcbtu_area($capacity_btu) {
  $area = roundUp($capacity_btu, 500);
  $area = $area/500;
  $area = (int) $area;
  return $area;
}

function my_acf_save_post( $post_id ) {
    // bail early if no ACF data
    if( empty($_POST['acf']) ) {

        return;

    } if(array_key_exists('field_5823076a39c2b', $_POST['acf'])) {
        $cap_btu = $_POST['acf']['field_5823076a39c2b'];
        if(!empty($cap_btu)) {
          $areastore = acs_calcbtu_area($cap_btu);
          update_post_meta($post_id, 'split_areaval', $areastore);
      }
    } if(array_key_exists('field_584e8a6a7e062', $_POST['acf'])) {
      $outputoutdoor_btu = $_POST['acf']['field_584e8a6a7e062'];
      if(!empty($outputoutdoor_btu)) {
        $areastore = acs_calcbtu_area($outputoutdoor_btu);
        update_post_meta($post_id, 'outdoor_areaval', $areastore);
      }
    } if(array_key_exists('field_5832c44a70a49', $_POST['acf'])) {
      $output_min_btu = $_POST['acf']['field_5832c44a70a49'];
      if(!empty($output_min_btu)) {
        $areastore = acs_calcbtu_area($output_min_btu);
        update_post_meta($post_id, 'rangemin_areaval', $areastore);
      }
    } if(array_key_exists('field_5832c46a70a4a', $_POST['acf'])) {
      $output_max_btu = $_POST['acf']['field_5832c46a70a4a'];
      if(!empty($output_max_btu)) {
        $areastore = acs_calcbtu_area($output_max_btu);
        update_post_meta($post_id, 'rangemax_areaval', $areastore);
      }
    } else {
      return;
    }
}

function meks_remove_wp_archives(){
  if( is_tag() || is_date() || is_author() || is_singular(array('products', 'faqs')) || is_category('brand') || is_tax('productrangetype') ) {
    global $wp_query;
    $wp_query->set_404();
  }
}

function custom_flush_rules(){
  don_create_posttype();
  flush_rewrite_rules();
}

// REMOVE WP EMOJI
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  add_action('init', 'acs_create_post_type');
  add_action('acf/save_post', 'my_acf_save_post', 1);
  add_action('template_redirect', 'meks_remove_wp_archives');
  add_action('after_theme_switch', 'custom_flush_rules');
  add_action('wp_enqueue_scripts', 'acs_load_fonts');
  add_action('wp_enqueue_scripts', 'acs_add_stylesheet');
	add_action('wp_enqueue_scripts', 'acs_theme_enqueue_styles');
  add_action('wp_enqueue_scripts', 'acs_theme_enqueue_scripts');

?>
