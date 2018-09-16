<?php /* Template Name: Search Page */

get_header();
?>
<div id="modaltwo" class="modaltwo"></div>
<div id="modal" class="modal"></div>
<div id="page">
  <div id="page-inner" class="clearfix browse"> <?php
    include(locate_template('templates/headerbar.php')); ?>
    <div class="searchbox">
      <div class="searchscroll">
        <div class="searchfields"> <?php
          echo do_shortcode( '[searchandfilter id="215"]' ); ?>
        </div>
        <div class="searchbuttonwrap">
          <div class="search-button">
            <div class="thebuttonitself buttonAnim">Filter</div>
          </div>
        </div>
      </div>
    </div>
    <main class="main" role="main">
      <section id="main" class="maincard">
        <div class="browse-main">
          <?php get_template_part('templates/search-loop'); ?>
        </div>
        <div class="browse-pag">
          <?php get_template_part('templates/pagination'); ?>
        </div>
      </section>
  	</main>
  </div>
<?php get_footer(); ?>
