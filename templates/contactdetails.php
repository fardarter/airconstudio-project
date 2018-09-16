<ul class="contactlist">
  <li>
    <ul class="address">
      <li class="contact-title"><i class="fa fa-home" aria-hidden="true"></i>  Address
      </li>
      <li> <?php
        echo $contactops['address_line_1']['value']; ?>
      </li>
      <li> <?php
        echo $contactops['address_line_2']['value']; ?>
      </li>
      <li> <?php
        echo $contactops['address_line_3']['value']; ?>
      </li>
      <li> <?php
        echo $contactops['address_line_4']['value']; ?>
      </li>
    </ul>
  </li>
  <li>
    <ul>
      <li class="contact-title"><i class="fa fa-mobile" aria-hidden="true"></i>  Phone number
      </li> <?php
         $tel = preg_replace('/\s+/', '', $contactops['tel_number']['value']);
         $tel2 = trim($tel); ?>
      <a href="tel:<?php echo $tel2 ?>"><li><?php echo $contactops['tel_number']['value']; ?>
      </li></a>
    </ul>
    <ul>
      <li class="contact-title"><i class="fa fa-envelope" aria-hidden="true"></i>  Email
      </li>
      <a href="mailto:<?php echo $contactops['email_address']['value']; ?>">
        <li><?php echo $contactops['email_address']['value']; ?>
        </li>
      </a>
    </ul>
  </li>
</ul>
