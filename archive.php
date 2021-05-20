<?php get_header(); ?>

<div class="main">
  <section class="section pb-0 pt-50">
    <div class="container w-800">
      <div class="blockTitle">
        <div class="blockTitle_illust">
          <img src="/wp-content/uploads/blog_title.png" alt="">
        </div>
      </div><!-- .blockTitle -->
    </div>
  </section>
  <section class="mainVisual">
    <div class="mainVisual_img" style="background: url(/wp-content/uploads/blog-main.jpg) center / cover no-repeat;"></div>
  </section>

  <section class="section">
    <div class="container newsArea newsArea-achive w-1000">
      <div class="columns mb-75">
        <?php if(have_posts()) : ?>
          <?php while(have_posts()) : the_post(); ?>
          <?php get_template_part('include/blog_item'); ?>
        <?php endwhile; ?>
        <?php
        if ( function_exists( 'pagination' ) ) :
          pagination( $wp_query->max_num_pages, get_query_var( 'paged' ) );
        endif; ?>
        <?php endif; ?>
      </div>
    </div><!-- .container -->
  </section><!-- .section -->
</div><!-- .main -->

<?php get_footer(); ?>
