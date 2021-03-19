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
    <div class="mainVisual_img" style="background: url(/wp-content/uploads/2021/03/mv.jpg) center / cover no-repeat;"></div>
  </section>

  <section class="section">
    <div class="container newsArea newsArea-achive w-1000">
      <?php if(is_tax()): ?>
      <div class="ctm_title">
        <h3 class="deco-green"><?php single_tag_title(); ?>の一覧</h3>
      </div>
      <?php endif; ?>
      <p class="title-border2">
        <span>カテゴリー</span>
      </p>
      <ul class="catList">
        <?php
          $cat_all = get_terms( "blog_cat", "fields=all&get=all" );
          foreach($cat_all as $value):
        ?>
        <li class="mb-10">
          <a href="<?php echo get_category_link($value->term_id); ?>" class="cat cat-<?php echo $value->slug;?>"><?php echo $value->name;?></a>
        </li>
        <?php endforeach; ?>
      </ul>
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
