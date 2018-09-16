<?php
$contactops = get_field_objects('options_contact');
$frontops = get_field_objects('options_front'); ?>

<header class="sidebarv styleheader widestyle narrowstyle">
    <div class="animate-on-load animated uppernav" data-animation='fadeInDown' data-delay='300'>
      <div class="navmenu"><?php wp_nav_menu(); ?>
        <ul class="contactbut">
          <li>
            Contact
          </li>
        </ul>
      </div>
    </div>
    <div class="menulogo widelogo">
      <a href="<?php echo home_url();?>"><img class="animate-on-load animated" data-animation='fadeInLeft' data-delay='0' src="<?php echo $frontops['sitelogo']['value']; ?>" alt="Aircon Studio"/></a>
    </div>
    <div class="menulogo narrowlogo animate-on-load animated" data-animation='fadeInRight' data-delay='0'>
      <a href="<?php echo home_url();?>"><img src="<?php echo $frontops['sitelogo_mobile']['value']; ?>" alt="Aircon Studio"/></a>
    </div>
</header>
<div class="contactdiv shadowcard start">
  <div class="closewrap shadowcard">
    <div class="closebut"><b></b><b></b><b></b><b></b></div>
  </div>
  <div class="menulogo">
    <a href="<?php echo home_url();?>"><img src="<?php echo $frontops['sitelogo']['value']; ?>" alt="Aircon Studio"/></a>
  </div>
  <div class="contactsubdiv">
    <div class="menusection">
      <div> <?php
        echo do_shortcode('[contact-form-7 id="321" title="ACS Contact"]'); ?>
      </div>
    </div>
    <div class="contactdetails">  <?php
        include(locate_template('templates/contactdetails.php'));
        include(locate_template('templates/openinghours.php')); ?>
    </div>
  </div>
</div>
