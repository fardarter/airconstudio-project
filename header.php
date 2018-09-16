<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
			<meta charset="<?php bloginfo('charset'); ?>">
<?php

			if (is_single()) {
				$this_post_ID = get_the_ID();
				$title = get_the_title($this_post_ID);
				$image = wp_get_attachment_image_src(get_post_thumbnail_id($this_post_ID), 'range-feature');
				$site_image = $image[0];
				$homeurl = get_permalink($this_post_ID);
				$content_post = get_post($this_post_ID);
				$content = $content_post->post_content;
				$site_desc = wp_trim_words($content, 22); ?>
				<title><?php
					if(wp_title('', false)) { echo ' '; } ?> <?php echo $title; ?>
				</title> <?php
			} else { ?>
				<title> <?php
					if(wp_title('', false)) { echo ' '; } ?> <?php bloginfo('name'); ?>
				</title> <?php
				$title = 'Aircon Studio';
				$site_desc = 'Aircon Studio – Expert Cape Town-based air-conditioning installers';
				$site_image = get_site_url() . "/acs-og.png";
				$homeurl = get_home_url();
			} ?>

				<meta name="description" content='<?php echo $site_desc ?>' >
				<!-- Twitter Card data -->
				<meta name="twitter:card" content="summary">
				<meta name="twitter:site" content='<?php echo $homeurl ?>' >
				<meta name="twitter:title" content='<?php echo $title ?>' >
				<meta name="twitter:description" content='<?php echo $site_desc ?>' >
				<meta name="twitter:image" content='<?php echo $site_image ?>' >

				<!-- Open Graph data -->
				<meta property="og:title" content='<?php echo $title ?>' >
				<meta property="og:type" content="organization" >
				<meta property="og:url" content='<?php echo $homeurl ?>' >
				<meta property="og:image" content='<?php echo $site_image ?>' >
				<meta property="og:description" content='<?php echo $site_desc ?>' >
				<meta property="og:site_name" content='<?php echo $title ?>' >

			<link href="//www.google-analytics.com" rel="dns-prefetch">

	        <link href="<?php echo get_stylesheet_directory_uri(); ?>/icons/favicon.ico" rel="shortcut icon">
	        <link href="<?php echo get_stylesheet_directory_uri(); ?>/icons/touch.png" rel="apple-touch-icon-precomposed">
	        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-touch-icon.png">
	        <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/favicon-32x32.png" sizes="32x32">
	        <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/favicon-16x16.png" sizes="16x16">
	        <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/manifest.json">
	        <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/safari-pinned-tab.svg" color="#5bbad5">
		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_stylesheet_directory_uri(); ?>/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_stylesheet_directory_uri(); ?>/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>
		<div class="isnotflex">
			<div class="innerunflex">
				<?php $frontops1 = get_field_objects('options_front'); ?>
				<div>
					<strong>
						Did you know that browsers go out of date? Modern browsers have capabilities that older browsers do not.
					</strong>
				</div>
				<div> <?php
					$date = date("Y");
					$years = $date - 2013; ?>
					If you're seeing this message, the browser you're using is (as of <?php echo $date; ?>) more than <?php echo $years; ?> years old.
				</div>
				<div>
					<img src="<?php echo $frontops1['sitelogo_mobile']['value']; ?>" alt="Aircon Studio"/>
				</div>
				<div class="notflexbot">
					To view the site, please upgrade to something a little more contemporary, such as: Firefox, Chrome, Edge, Opera or Safari.
				</div>
			</div>
		</div>
