<li class="newsList_item">
  <a href="<?php the_permalink(); ?>" class="is-flex-desktop">
    <div class="is-flex newsList_item-time">
      <time><?php echo get_the_date('Y.m.d'); ?></time>
    </div>
    <div class="newsList_item-right">
      <p class="newsList_item_title"><?php echo get_the_title(); ?></p>
      <div class="newsList_item_text"><?php echo mb_substr(strip_tags($post-> post_content),0,55) . '...'; ?></div>
    </div>
  </a>
</li><!-- .newsList_item -->
