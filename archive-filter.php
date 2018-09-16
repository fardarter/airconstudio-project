<?php get_header(); ?>
<div class="searchbox">
        <?php echo do_shortcode( '[searchandfilter id="215"]' ); ?>

</div>
	<main>
		<!-- section -->
		<section>

			<h1><?php _e( 'Archives', 'html5blank' ); ?></h1>

			<?php get_template_part('loop-filter'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
