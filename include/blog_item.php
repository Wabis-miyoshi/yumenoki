<?php
  $terms = get_the_terms($post -> ID, 'blog_cat');
  foreach($terms as $term){
  $term_slug = $term -> slug;
  }
?>
<div class="column is-full-mobile is-half-tablet is-one-third-desktop">
  <a class="blogList_item" href="<?php the_permalink(); ?>">
    <?php if ( has_post_thumbnail( $post->ID ) ): ?>
    <div class="blogList_item_img">
      <img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="">
    </div>
    <?php else: ?>
    <div class="blogList_item_img">
      <img src="/wp-content/uploads/no-image.jpg" alt="">
    </div>
    <?php endif; ?>
    <div class="blogList_item-cat is-flex">
      <p class="cat">
        <?php $terms = get_the_terms($post->ID, 'blog_cat'); foreach($terms as $term){ $term_name = $term->name; echo $term_name; break; }; ?>
      </p>
      <p class="date"><?php the_time('Y.m.d'); ?></p>
    </div>
    <div class="blogList_item_title">
      <?php
      the_title();
      ?>
    </div>
  </a>
</div>