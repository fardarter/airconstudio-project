<?php

// For range display

function displayBools($bools) {
  foreach ($bools as $booled=>$tooled) {
    if ($tooled == false) {
      echo ('<li class="booled shadowcard booled-false"><div class="bool-inner">'. $booled .'</div><div class="bool-inner"></div></li>');
    } else {
      echo ('<li class="booled shadowcard booled-true"><div class="bool-inner">'. $booled .'</div><div class="bool-inner"><i class="fa fa-check" aria-hidden="true"></i></div></li>');
    }
  }
}


function roundUp($num, $precision) {
  $one = $num % $precision;
  if ($one == 0 ) {
    return $num;
  } else {
    $one = $precision - $one;
    $one = $num + $one;
    return $one;
  }
}

function checkValue($fieldobject, $field_name) {

  $notoutdoorarray = array('name_indoor', 'name_outdoor', 'whd_outdoor', 'outdoor_noise_cooling', 'outdoor_noise_heating');

  if(array_key_exists($field_name, $fieldobject)) {
    if (in_category('split')) {
      $fieldtested = $fieldobject[$field_name];
      return $fieldtested;
    } else if (in_category('multi-split')) {
      if(in_array($field_name, $notoutdoorarray) == false) {
        $fieldtested = $fieldobject[$field_name];
        return $fieldtested;
      } else {
        return null;
      }
    } else {
      return null;
    }
  }
}

function echoValue($fieldname) {
  if(!empty($fieldname['value'])) { ?>
    <ul> <?php
    if ($fieldname['type'] == 'file') { ?>
      <a target="_blank" href="<?php echo $fieldname['value']; ?>">
        <li class="documentlink">
          <i class="documenticon fa fa-file-text-o" aria-hidden="true"></i>
        </li>
      </a>
     <a target="_blank" href="<?php echo $fieldname['value']; ?>">
       <li class="documentlink"><?php echo $fieldname['label']; ?></li>
     </a><?php
    }
    else if ($fieldname['type'] == 'select') {
        $fieldnamestring = $fieldname['value'];
        $selection = $fieldname['choices'][$fieldnamestring]; ?>
      <h4 class="datafield-title datafield"><?php echo $fieldname['label'] ?></h4>
      <li class="datafield-gapcover datafield"></li>
      <li class="datafield-prepend datafield"> <?php
        if(array_key_exists('prepend', $fieldname)) {
          echo $fieldname['prepend'];
        } ?>
      </li>
      <li class="datafield-value datafield"> <?php
        echo $selection; ?>
      </li>
      <li class="datafield-append datafield"> <?php
        if(array_key_exists('append', $fieldname)) {
          echo $fieldname['append'];
        } ?>
      </li> <?php
    } else if ($fieldname['type'] == 'number') { ?>
      <h4 class="datafield-title datafield"><?php echo $fieldname['label'] ?></h4>
      <li class="datafield-gapcover datafield"></li>
      <li class="datafield-prepend datafield"> <?php
        if(array_key_exists('prepend', $fieldname)) {
          echo $fieldname['prepend'];
        } ?>
      </li>
      <li class="datafield-value datafield"> <?php
        echo number_format($fieldname['value'], 1, ".", " "); ?>
      </li>
      <li class="datafield-append datafield"> <?php
        if(array_key_exists('append', $fieldname)) {
          echo $fieldname['append'];
        } ?>
      </li> <?php
    } else { ?>
      <h4 class="datafield-title datafield"><?php echo $fieldname['label'] ?></h4>
      <li class="datafield-gapcover datafield"></li>
      <li class="datafield-prepend datafield"> <?php
        if($fieldname['prepend']) {
          echo $fieldname['prepend'];
        } ?>
      </li>
      <li class="datafield-value datafield"> <?php
        echo $fieldname['value']; ?>
      </li>
      <li class="datafield-append datafield"> <?php
        if($fieldname['append']) {
          echo $fieldname['append'];
        } ?>
      </li> <?php
    } ?>
    </ul> <?php
  } else {
    return;
  }
}

?>
