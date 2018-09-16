<?php

get_header();
$the_ID = $post->ID; ?>
<div class="modal"></div>
<div id="page" class="fourohfour"> <?php
  include(locate_template('templates/headerbar.php')); ?>
  <div id="page-inner" class="clearfix">
    <div class="main">
      <div class="maincard">
		      <section class="shadowcard">
			       <article id="post-404">
               <div class="menulogo">
                 <a href="<?php echo home_url();?>"><img src="<?php echo $frontops['sitelogo']['value']; ?>" alt="Aircon Studio"/></a>
               </div>
        				<h1>404 – Page unfound</h1>
                <h2 class="top-two">There's nothing here for you.</h2>
                <h2>
                  <a href="<?php echo home_url(); ?>"><?php _e( 'Go home.', 'airconstudio' ); ?></a>
        				</h2>
			      </article>
		      </section>
        </div>
      </div>
    </div>
  </div>
<?php get_footer(); ?>
