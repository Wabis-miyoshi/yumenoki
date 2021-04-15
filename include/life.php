<section class="section page-bg">
  <div class="container w-1000">
    <div class="lifeArea">
      <ul>
        <?php if(have_rows('life')): ?>
        <?php while(have_rows('life')): the_row(); ?>
          <li class="lifeArea_item is-flex-tablet">
        <?php $lifeImg = get_sub_field('img'); ?>
        <?php if(empty($lifeImg)):?>
          <div class="lifeArea_item-left no_img">
        <?php else:?>
          <div class="lifeArea_item-left">
        <?php endif;?>
            <div class="lifeArea_item-time">
              <img src="<?php the_sub_field('clock'); ?>" alt="" class="lifeArea_item-time_illust">
              <p><?php the_sub_field('time'); ?></p>
            </div>
            <p class="lifeArea_item_title"><?php the_sub_field('title'); ?></p>
            <div class="lifeArea_item_text">
              <?php the_sub_field('explanation'); ?>
            </div>
          </div>
          <div class="lifeArea_item_img">
            <img src="<?php the_sub_field('img'); ?>" alt="" class="">
          </div>
        </li>
        <?php endwhile; ?>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</section>
