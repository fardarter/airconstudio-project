<?php if (have_posts()): while (have_posts()) : the_post();
			$the_ID = $post->ID;
			$catID = get_cat_ID('brand');
			$cats = get_the_category($the_ID);
			$fields = get_field_objects($the_ID);
			$perma = get_permalink($the_ID);
			$brochure = checkValue($fields, 'brochure');
			$warranty = checkValue($fields, 'warranty');
			$pricemin = $fields['price_min'];
			$pricemax = $fields['price_max'];
			$rangemin = get_post_meta($the_ID, 'rangemin_areaval');
			$rangemax = get_post_meta($the_ID, 'rangemax_areaval');
			$btumin = $fields['output_min_btu'];
			$btumax = $fields['output_max_btu'];
			$kwhmax = $fields['output_max_kwh'];
			$kwhmin = $fields['output_min_kwh'];
			?>

	<!-- article -->
	<a <?php post_class('searched animated shadowcard'); ?> href="<?php echo $perma; ?>" title="<?php the_title(); ?>" data-animation='fadeIn' data-delay='0'>
		<article id="post-<?php the_ID(); ?>">
				<div class="shadowimg range-image"> <?php
					if ( has_post_thumbnail()) {
						the_post_thumbnail('range-feature', array( 'class' => 'shadowimg' ));
					} ?>
				</div>
				<div class="shadowimg range-bottom">
					<div class="range-bottom-inner shadowimg">
						<div class="range-title">
							<h2> <?php
								the_title(); ?>
							</h2>
						</div>
						<div class="range-lists">
							<ul class="range-list">
								<h4 class="list-title">Brand</h4>
								<span class="dividers"></span>
								<li>
									<ul class="brand">
										<li>
											<span class="list-value link-class">
												<div> <?php
													foreach ($cats as $cat) {
														if(($cat->category_parent) == $catID) { ?>
																<div class="categorylink"><?php echo $cat->cat_name ?></div>
															<?php
														}
													} ?>
												</div>
											</span>
										</li>
										<li>
										</li>
									</ul>
								</li>
							</ul>
							<ul class="range-list">
								<h4 class="list-title">Price</h4>
								<span class="dividers"></span>
								<li>
									<ul class="price">
										<li class="price">
											<span class="list-value"><span class="bluen">R</span> <?php
												 echo number_format($pricemin['value'], 0, "", " "); ?> – <?php echo number_format($pricemax['value'], 0, "", " "); ?>
											</span>
									 </li>
									 <li class="price"></li>
									</ul>
								</li>
							</ul>
							<ul class="range-list">
								<h4 class="list-title">Output</h4>
								<span class="dividers"></span>
								<li>
									<ul class="output">
										<li>
											<span class="list-value"> <?php
												echo number_format($btumin['value'], 0, "", " "); ?> – <?php echo number_format($btumax['value'], 0, "", " "); ?>
											</span>
											<div class="list-title">Btu/h</div>
										</li>
										<li>
											<span class="list-value kilowatt"> <?php
												echo number_format($kwhmin['value'], 1, ".", " "); ?> – <?php echo number_format($kwhmax['value'], 1, ".", " "); ?>
											</span>
											<div class="list-title">kW/h</div>
										</li>
									</ul>
								</li>
							</ul>
							<ul class="range-list">
								<h4 class="list-title">Approx. area</h4>
								<span class="dividers"></span>
								<li>
									<ul class="area">
										<li>
											<div class="list-title">Min</div>
											<span class="list-value searcapoutputmin"><?php
												echo $rangemin[0] ?> m&sup2;
											</span>
										</li>
										<li>
											<div class="list-title">Max</div>
											<span class="list-value searcapoutputmax"><?php
												echo $rangemax[0] ?> m&sup2;
											</span>
										</li>
									</ul>
								</li>
							</ul>
						</div>
						<div class="dividercontainer">
							<hr class="maindivider"/>
						</div>
						<div class="range-content"> <?php
							$content = get_the_content($the_ID);
							$perma1 = get_permalink($the_ID);
							$trimmedcontent = wp_trim_words($content, 22, ' . . . ');
							$filtercontent = apply_filters('the_content', $trimmedcontent);
							echo $filtercontent; ?>
						</div>
						<div class="dividercontainer">
							<hr class="bottomdivider"/>
						</div>
					</div>
				</div>
		</article>
	</a>

	<!-- /article -->

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
