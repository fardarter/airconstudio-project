<div class="opening_hours">
  <div class="contact-title"><i class="fa fa-clock-o" aria-hidden="true"></i>  Opening hours
  </div>
  <?php
   if(have_rows('opening_hours', 'options_contact')) {
     while ( have_rows('opening_hours', 'options_contact') ) {
       the_row();
       if(get_row_layout() == 'weekdays') { ?>
         <ul class="opening">
           <li class="hourstitle">
           Weekdays
         </li>
         <li class="hours"> <?php
           the_sub_field('opening_time'); ?>
         <span class="divider"> –
         </span> <?php
           the_sub_field('closing_time'); ?>
         </li>
       </ul> <?php
     } elseif (get_row_layout() == 'friday') { ?>
       <ul class="opening">
         <li class="hourstitle">
           Friday
         </li>
         <li class="hours"> <?php
           the_sub_field('opening_time'); ?>
         <span class="divider"> –
         </span> <?php
           the_sub_field('closing_time'); ?>
         </li>
       </ul> <?php
       } elseif (get_row_layout() == 'saturday') { ?>
       <ul class="opening">
         <li class="hourstitle">
           Saturday
         </li>
         <li class="hours"> <?php
           the_sub_field('opening_time'); ?>
         <span class="divider"> –
         </span> <?php
           the_sub_field('closing_time'); ?>
         </li>
       </ul> <?php
     } elseif (get_row_layout() == 'sunday') { ?>
       <ul class="opening opening-empty">
         <li class="hourstitle">
           Sunday
         </li>
         <li class="hours"> <?php
           the_sub_field('opening_time'); ?>
        </li>
       </ul> <?php
     } elseif (get_row_layout() == 'public_holidays') { ?>
       <ul class="opening opening-empty">
         <li class="hourstitle">
           Public holidays
         </li>
         <li class="hours"> <?php
           the_sub_field('opening_time'); ?>
        </li>
       </ul> <?php
     }
   }
 } ?>
</div>
