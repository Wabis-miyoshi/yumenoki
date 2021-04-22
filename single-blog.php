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
  <section class="section pt-0">
    <div class="container w-1000">
        <?php if(have_posts()) : ?>
          <?php while(have_posts()) : the_post(); ?>
          <div class="has-text-weight-bold">
            <p class="mb-20">
              <time datetime="2016-1-1"><?php echo get_the_date(); ?></time>
            </p>
            <h3 class="newsList_item_title newsList_item_title-single is-size-5-touch mb-10"><?php the_title(); ?></h3>
          </div>
            <div class="newsList_inner">
              <?php the_content(); ?>
            </div><!-- .newslist_inner -->
          <?php endwhile; ?>
        <?php endif; ?>
        <a href="/blog/" class="btn">ブログ一覧</a>
    </div><!-- .container -->
  </section><!-- .section -->
</div><!-- .main -->

<?php get_footer(); ?>
