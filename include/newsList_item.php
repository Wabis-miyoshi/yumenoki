<li class="newsList_item">
  <a href="<?php the_permalink(); ?>" class="is-flex-desktop">
    <div class="is-flex newsList_item-time">
      <time><?php echo get_the_date('Y.m.d'); ?></time>
    </div>
    <div>
      <p class="newsList_item_title"><?php echo get_the_title(); ?></p>
      <div class="newsList_item_text"><?php echo mb_substr(get_the_excerpt(), 0, 200) . '[...]'; ?></div>
    </div>
  </a>
</li><!-- .newsList_item -->