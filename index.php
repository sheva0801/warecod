<?php get_header(); ?>

<?php
if(is_front_page()) {
 ?>
 <!-- <div id="live-search">
  <div class="container">
   <div class="twelve columns">
    <input type="text" placeholder="<?php //_e('Search &#128270;');?>" onfocus="this.placeholder=''" onblur="this.placeholder='<?php //_e('Search &#128270;');?>'" />
    <img src="<?php // bloginfo('stylesheet_directory')?>/img/loading.gif" alt="loading" id="loading" />
    <div class="results-container"></div>
   </div>
  </div>
 </div> -->
 <section id="site-intro">
  <?php
  $intro_texts = opendev_get_intro_texts();
  if(!empty($intro_texts)) :
   ?>
   <div class="container">
    <div id="intro-texts" class="row">
     <?php if($intro_texts[1]) : ?>
      <div class="four columns">
       <div class="text-item">
        <div class="icon">
         <?php if($intro_texts[1]['icon']) : ?>
          <p class="icon-<?php echo $intro_texts[1]['icon']; ?>"></p>
         <?php endif; ?>
        </div>
        <div class="content">
         <h3><?php echo $intro_texts[1]['title']; ?></h3>
         <p><?php echo $intro_texts[1]['content']; ?></p>
        </div>
       </div>
      </div>
     <?php endif; ?>
     <?php if($intro_texts[2]) : ?>
      <div class="four columns">
       <div class="text-item">
        <div class="icon">
         <?php if($intro_texts[2]['icon']) : ?>
          <p class="icon-<?php echo $intro_texts[2]['icon']; ?>"></p>
         <?php endif; ?>
        </div>
        <div class="content">
         <h3><?php echo $intro_texts[2]['title']; ?></h3>
         <p><?php echo $intro_texts[2]['content']; ?></p>
        </div>
       </div>
      </div>
     <?php endif; ?>
     <?php if($intro_texts[3]) : ?>
      <div class="four columns">
       <div class="text-item">
        <div class="icon">
         <?php if($intro_texts[3]['icon']) : ?>
          <p class="icon-<?php echo $intro_texts[3]['icon']; ?>"></p>
         <?php endif; ?>
        </div>
        <div class="content">
         <h3><?php echo $intro_texts[3]['title']; ?></h3>
         <p><?php echo $intro_texts[3]['content']; ?></p>
        </div>
       </div>
      </div>
     <?php endif; ?>
    </div>
   </div>
   <?php
  endif;
  ?>
 </section>

 <section id="featured-content" class="page-section row">
  <div class="container">
   <div class="twelve columns">
    <div class="section-featured-content">
      <?php
        if( function_exists('fa_display_slider') ){
            fa_display_slider( 289173 );
        }
      ?>
    </div>
   </div>
  </div>
 </section>

 <?php $is_mapgroup = jeo_get_mapgroup_data(); ?>
 <section id="news" class="page-section row" <?php if($is_mapgroup) : echo "style='padding-top:60px'"; endif; ?>>
  <div class="container">
   <div class="twelve columns">
    <div class="section-map">
     <?php
     jeo_map();
     ?>
    </div>
   </div>
  </div>
 </section>

 <!-- <section id="latest-news">
  <div class="section-title">
   <div class="container">
    <div class="twelve columns">
     <h2>//<?php _e('Latest news', 'opendev'); ?></h2>
     //<?php get_template_part('section', 'query-actions'); ?>
    </div>
   </div>
  </div>
  <div class="container">
   //<?php get_template_part('loop', 'latest'); ?>
  </div>
 </section> -->

 <section id="announcements-and-updates" class="page-section row">
   <div class="container">
     <div class="row">
      <div class="eight columns">
        <?php dynamic_sidebar('frontpage-footer-left'); ?>
      </div>
      <div class="four columns">
        <?php dynamic_sidebar('frontpage-footer-right'); ?>
      </div>
    </div>
   </div>
 </section>

 <?php //get_template_part('section', 'content-summary'); ?>

<?php } ?>

<?php // get_template_part('content', 'interactive-map'); ?>

<?php get_footer(); ?>
