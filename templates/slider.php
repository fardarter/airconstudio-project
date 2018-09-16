<h2 class="sliderhead">Featured</h2>
<div class="fade"> <?php
    $features = $frontops['feature_posts']['value'];
    foreach($features as $feat) {
                $fields = get_field_objects($feat);
        $title = get_the_title($feat);
        $perma = get_permalink($feat);
        $thumb = get_the_post_thumbnail($feat, 'range-feature');
  			$pricemin = $fields['price_min'];
  			$pricemax = $fields['price_max'];
  			$btumin = $fields['output_min_btu'];
  			$btumax = $fields['output_max_btu'];
  			$kwhmax = $fields['output_max_kwh'];
  			$kwhmin = $fields['output_min_kwh'];
  			$rangemin = get_post_meta($feat, 'rangemin_areaval');
  			$rangemax = get_post_meta($feat, 'rangemax_areaval');
        $catID = get_cat_ID('brand');
        $cats = get_the_category($feat); ?>

      <a class="slider" href="<?php echo $perma; ?>">
        <div>
          <div class="range-title">
            <h3>
              <?php echo $title; ?> <span class="bluen">*</span>
            </h3>
          </div>
              <?php echo $thumb ?>
            <div class="rangedetails">
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
            </div>
          </div>
        </a>
      <?php
    } ?>
</div>
<div class="disclaimer">
  <span class="bluen">* </span><?php echo $frontops['disclaimer']['value']; ?>
</div>
