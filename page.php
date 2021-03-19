<?php
/*
Template Name: デフォルト
*/
?>

<?php get_header(); ?>

<?php
  if ( have_posts() ) :
  while ( have_posts() ) : the_post();
?>

<?php
  $page = get_post( get_the_ID() );
  $page_slug = $page->post_name;
  global $post;
?>

<div class="main">
  <section class="section pb-0 pt-50">
    <div class="container w-800">
      <div class="blockTitle">
        <div class="blockTitle_illust">
          <img src="/wp-content/uploads/<?php echo $page_slug; ?>_title.png" alt="">
        </div>
      </div><!-- .blockTitle -->
    </div>
  </section>
  <?php if(has_post_thumbnail()): ?>
  <section class="mainVisual">
    <div class="mainVisual_img" style="background: url(<?php the_post_thumbnail_url("", "full"); ?>) center / cover no-repeat;"></div>
  </section>
  <?php endif; ?>

  <?php if ( is_page('life') ) : ?>
    <?php get_template_part('include/life'); ?>
  <?php elseif ( is_page('link') ) : ?>
    <?php get_template_part('include/links'); ?>
  <?php elseif ( is_page('info') ) : ?>
    <?php get_template_part('include/info'); ?>
  <?php elseif ( is_page('admission') ) : ?>
    <?php get_template_part('include/admission'); ?>
  <?php elseif ( is_page('about') ) : ?>
    <?php get_template_part('include/about'); ?>
  <?php elseif ( is_page('message') ) : ?>
    <?php get_template_part('include/message'); ?>
  <?php elseif ( is_page('access') ) : ?>
    <?php get_template_part('include/access'); ?>
  <?php elseif ( is_page('recruit') ) : ?>
    <?php get_template_part('include/recruit'); ?>
  <?php else: ?>
    <?php the_content(); ?>
  <?php endif; ?>
  <section class="section othersArea">
  <div class="container w-1200">
    <div class="others">
      <div class="blockTitle">
        <div class="blockTitle_illust">
          <img src="/wp-content/uploads/others_title.png" alt="">
        </div>
      </div><!-- .blockTitle -->
      <div class="columns is-mobile is-multiline is-variable is-8-desktop">
        <div class="column is-half-mobile is-one-quarter-tablet">
          <div class="others_item">
            <div class="others_item_img">
              <img src="/wp-content/uploads/no-image.jpg" alt="">
            </div>
            <a href="/message/" class="btn">園長挨拶だお</a>
          </div>
        </div>
        <div class="column is-half-mobile is-one-quarter-tablet">
          <div class="others_item">
            <div class="others_item_img">
              <img src="/wp-content/uploads/no-image.jpg" alt="">
            </div>
            <a href="/about/" class="btn">園について</a>
          </div>
        </div>
        <div class="column is-half-mobile is-one-quarter-tablet">
          <div class="others_item">
            <div class="others_item_img">
              <img src="/wp-content/uploads/no-image.jpg" alt="">
            </div>
            <a href="/admission/" class="btn">入園案内</a>
          </div>
        </div>
        <div class="column is-half-mobile is-one-quarter-tablet">
          <div class="others_item">
            <div class="others_item_img">
              <img src="/wp-content/uploads/no-image.jpg" alt="">
            </div>
            <a href="/blog/" class="btn">ブログ</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

<?php
  endwhile;
  else :
?>
<p>投稿が見つかりません。</p>
<?php
  endif;
?>

<?php get_footer(); ?>
