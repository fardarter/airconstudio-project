      <div class="prodtop-wrap animate-on-load animated" data-animation='fadeIn' data-delay='0'>
        <div class="eachinner">
          <h3 class="explain-upper"><?php
            echo $rangeops['outdoor_heading']['value']; ?>
          </h3>
          <div class="rangeexplainer"> <?php
            if (in_category('split')) {
              echo $rangeops['range_split_explainer']['value'];
            } elseif (in_category('multi-split')) {
              echo $rangeops['range_split_explainer_outdoor']['value'];
            } ?>
          </div>
          <div class="multi-wrap clearfix">
            <div class="multi-button-row animated animate-on-load" data-animation='fadeIn' data-delay='0'>
              <ul class='buttons'> <?php
                if($ranges_ind) {
                  foreach( $ranges_ind as $rind ) {
                    $fields = get_field_objects($rind->ID);
                    $checkname = get_the_title($rind->ID);
                    echo('<li class="shadowimgbasic product-tab multi" data-tab2="' . $checkname . '"><h4>' . $checkname . '</h4></li>');
                    }
                } ?>
              </ul>
            </div> <?php
            if($ranges_ind) {
              foreach($ranges_ind as $rind) {
                $fields = get_field_objects($rind->ID);
                $checkname = get_the_title($rind->ID);
                $pricesout = $fields['price'];
                $dimensionout = $fields['h_x_w_x_d'];
                $noisehilocoolout = $fields['noise_cooling_highlow'];
                $noisehiloheatout = $fields['noise_heating_highlow'];
                $outcapkwhr = checkValue($fields, 'outputoutdoor_kwhr');
                $outcapbtu = checkValue($fields, 'outputoutdoor_btu');
                $thisoutdoor =  $rangebinds[$rind->ID]; ?>
                <div class="eachoutdoor" data-tab2="<?php echo $checkname ?>">
                  <div class='outdoorinner'>
                    <div class="datasheet shadowcard">
                      <div class="data-section data-section-outdoor">
                        <h2 class="product-title"><?php echo $checkname ?></h2>
                        <span class="theprices"> <?php
                          echoValue($pricesout); ?>
                        </span> <?php
                        echoValue($dimensionout);
                        echoValue($noisehilocoolout);
                        echoValue($noisehiloheatout); ?>
                        <ul>
                          <h4 class="datafield-title datafield">Capacity</h4>
                          <li class="datafield-gapcover datafield"></li>
                          <li class="datafield-prepend datafield"></li>
                          <li class="capvalue datafield-value datafield" > <?php
                            echo(number_format($outcapkwhr['value'], 1, ".", " "). ' <span class="inner-cap">'. $outcapkwhr['append'] . '</span>' . ' – ' . number_format($outcapbtu['value'], 0, "", " "). ' <span class="capappend">'. $outcapbtu['append'] . '</span>'); ?>
                          </li>
                          <li class="datafield-append capappended datafield">
                          </li>
                        </ul> <?php
                        $outdoorarea = get_post_meta($rind->ID, 'outdoor_areaval'); ?>
                      </div>
                    </div>
                  </div>
                </div> <?php
              }
            } ?>
          </div>
        </div>
        <div class="dividercontainer">
          <hr class="maindivider"/>  
        </div>
        <h3 class="explain-lower"><?php echo $rangeops['indoor_heading']['value']; ?></h3>
        <div class="rangeexplainer"> <?php echo $rangeops['range_split_explainer_indoor']['value'];?></div> <?php
        if($ranges_ind) {
          foreach( $ranges_ind as $rind ) {
            $thisoutdoor =  $rangebinds[$rind->ID];
            $checkname = get_the_title($rind->ID); ?>
            <div class="button-row animated" data-animation='fadeIn' data-delay='0' data-tab2="<?php echo $checkname ?>">
              <ul class='buttons'> <?php
                foreach ($thisoutdoor as $theoutdoor) {
                  $fields = get_field_objects($theoutdoor->ID);
                  $checkname2 = get_the_title($theoutdoor->ID);
                  echo('<li class="shadowimgbasic product-tab submulti" data-tab="' . $checkname2 . '"><h4>' . $checkname2 . '</h4></li>');
            } ?>
              </ul>
            </div> <?php
          }
        }
        if($ranges_ind) {
            foreach($ranges_ind as $rind) {
            $fields = get_field_objects($rind->ID);
            $checkname = get_the_title($rind->ID);
            $thisoutdoor =  $rangebinds[$rind->ID];
            foreach ($thisoutdoor as $theoutdoor) {
              $checkname2 = get_the_title($theoutdoor->ID);
              $fields = get_field_objects($theoutdoor->ID);
              $catID = get_cat_ID('brand');
              $cats = get_the_category($theoutdoor->ID);
              $bools = array();
              $nameoutdoor = checkValue($fields, 'name_outdoor');
              $prices = checkValue($fields, 'price');
              $capkwhr = checkValue($fields, 'cap_kwhr');
              $capbtu = checkValue($fields, 'cap_btu');
              $cop = checkValue($fields, 'cop');
              $scop = checkValue($fields, 'scop');
              $seer = checkValue($fields, 'seer');
              $err = checkValue($fields, 'eer');
              $rating = checkValue($fields, 'rating');
              $pwrcooling = checkValue($fields, 'power_consumption_cooling');
              $pwrheating = checkValue($fields, 'power_consumption_heating');
              $whdindoor = checkValue($fields, 'whd_indoor');
              $whdoutdoor = checkValue($fields, 'whd_outdoor');
              $indcooling = checkValue($fields, 'indoor_noise_cooling');
              $indheating = checkValue($fields, 'indoor_noise_heating');
              $whdoutdoor = checkValue($fields, 'whd_outdoor');
              $outcooling = checkValue($fields, 'outdoor_noise_cooling');
              $outheating = checkValue($fields, 'outdoor_noise_heating');
              $areasplit = get_post_meta($theoutdoor->ID, 'split_areaval');
              foreach ($fields as $thefield) {
                if($thefield['type'] == 'true_false') {
                  $label = $thefield['label'];
                  $bools[$label] = $thefield['value'];
                }
              } ?>
            <div class="eachproduct" data-btu="<?php echo $capbtu['value']; ?>" data-tab1="<?php echo $checkname ?>" data-tab2="<?php echo $checkname2 ?>">
              <div class="eachinner">
                <div class="datawrap">
                  <div class="data-section-title shadowcard">
                    <h4 class="data-heading">Name</h4>
                    <ul class="prodtitle">
                      <li class="datafield">
                        <h2 class="product-title"> <?php
                          echo get_the_title( $theoutdoor->ID ); ?>
                        </h2>
                      </li>
                    </ul>
                  </div>
                  <div class="data-section-general shadowcard">
                    <h4 class="data-heading">General</h4>
                    <ul>
                      <h4 class="datafield-title datafield">Brand</h4>
                      <li class="datafield-gapcover datafield"></li>
                      <li class="datafield-prepend datafield"></li>
                      <li class="capvalue datafield-value datafield"><?php
                        foreach ($cats as $cat) {
                          if(($cat->category_parent) == $catID) {
                            $catlink = get_category_link($cat->term_id); ?>
                            <a href="<?php echo $catlink ?>">
                              <div class="categorylink"><?php echo $cat->cat_name ?></div>
                            </a> <?php
                          }
                        } ?>
                      </li>
                      <li class="datafield-append datafield">
                      </li>
                    </ul>
                      <span class="theprices"> <?php
                      echoValue($prices); ?>
                      </span>
                    <ul>
                      <h4 class="datafield-title datafield">Capacity</h4>
                      <li class="datafield-gapcover datafield"></li>
                      <li class="datafield-prepend datafield"></li>
                      <li class="capvalue datafield-value datafield" > <?php
                        echo(number_format($capkwhr['value'], 1, ".", " "). ' <span class="inner-cap">'. $capkwhr['append'] . '</span>' . ' – ' . number_format($capbtu['value'], 0, "", " "). ' <span class="capappend">'. $capbtu['append'] . '</span>'); ?>
                      </li>
                      <li class="datafield-append capappended datafield">
                      </li>
                    </ul>
                    <ul>
                      <h4 class="datafield-title datafield">Approx. Area</h4>
                      <li class="datafield-gapcover datafield"></li>
                      <li class="datafield-prepend datafield"></li>
                      <li class="capoutput datafield-value datafield"><?php echo $areasplit[0]; ?></li>
                      <li class="datafield-append datafield">m&sup2;
                      </li>
                    </ul>
                  </div>
                </div>
                <div class='general-filler'></div>
                <div class="datasheet">
                  <div class="data-section data-section-energy shadowcard">
                    <h4 class="data-heading">Energy</h4> <?php
                      echoValue($rating);
                      echoValue($cop);
                      echoValue($scop);
                      echoValue($seer);
                      echoValue($err);
                      echoValue($pwrcooling);
                      echoValue($pwrheating); ?>
                  </div>
                  <div class="data-section data-section-space shadowcard">
                    <h4 class="data-heading">Space</h4> <?php
                      echoValue($whdoutdoor);
                      echoValue($whdindoor);
                      echoValue($indcooling);
                      echoValue($indheating);
                      echoValue($outcooling);
                      echoValue($outheating); ?>
                  </div>
                </div>
                <ul class="thebools">
                  <?php  displayBools($bools); ?>
                </ul>
              </div>
            </div> <?php
          }
        }
      } ?>
  </div>
