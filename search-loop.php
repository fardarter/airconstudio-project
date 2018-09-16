<?php if (have_posts()): while (have_posts()) : the_post();
			$the_ID = $post->ID;
			$fields = get_field_objects($the_ID);
			$pricemin = $fields['price_min'];
			$pricemax = $fields['price_max'];
			$btumin = $fields['output_min_btu'];
			$btumax = $fields['output_max_btu'];
			$kwhmax = $fields['output_max_kwh'];
			$kwhmin = $fields['output_min_kwh'];
			$sfields = $_POST['acf'];
			?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class('searched animated'); ?> data-animation='fadeInUp' data-delay='0'
		<div class="range-title">
			<?php d($sfields); ?>
			<h2>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h2>
		</div>
		<!-- post thumbnail -->
		<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail(array(520,520)); // Declare pixel size you need inside the array ?>
			</a>
		<div>
			<ul class="range-list">
				<h3 class="list-title">Price</h3>
				<li><?php echo number_format($pricemin['value'], 0, "", " "); ?> – <?php echo number_format($pricemax['value'], 0, "", " "); ?></li>
			</ul>
			<ul class="range-list">
				<h3 class="list-title">Output</h3>
				<li>
					<ul>
						<li><?php echo number_format($btumin['value'], 0, "", " "); ?> – <?php echo number_format($btumax['value'], 0, "", " "); ?></li>
						<li class="list-title">Btu/h</li>
						<li><?php echo number_format($kwhmin['value'], 0, "", " "); ?> – <?php echo number_format($kwhmax['value'], 0, "", " "); ?></li>
						<li class="list-title">kW/h</li>
					</ul>
				</li>
			</ul>
		</div>
		<?php endif; ?>
		<!-- /post thumbnail -->
		<div class="range-content">
			<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
		</div>
	</article>
	<!-- /article -->

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
