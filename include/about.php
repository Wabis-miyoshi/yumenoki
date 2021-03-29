<?php
// vars
$group_name = get_field('block1');
if( $group_name ):
?>
<section class="section page-bg">
  <div class="container w-1200">
    <div class="pageAppeal w-1000">
      <div class="pageAppeal-left">
        <div class="pageAppeal-catch">
          <?php echo $group_name['catch']; ?>
        </div>
      </div>
      <div class="pageAppeal-right">
        <div class="pageAppeal_img">
          <img src="<?php echo $group_name['img']; ?>" alt="">
        </div>
        <div class="pageAppeal_text">
          <p>
            <?php echo $group_name['text']; ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if(have_rows('block2')): ?>
<div class="acc-g"></div>
<section class="section ctm bg-green yumenoki-bg-right">
  <div class="container w-1200">
    <div class="ctm_title">
      <h3 class="deco-white">保育の特色</h3>
    </div>
    <?php while(have_rows('block2')): the_row(); ?>
    <div class="ctm_item">
      <div class="ctm_item-right">
        <div class="is-flex-tablet flex-center">
          <div class="ctm_item-nom text-shadow"><?php the_sub_field('num'); ?><span class="is-block"></span></div>
          <div class="ctm_item_title">
            <?php the_sub_field('catch'); ?>
          </div>
        </div>
        <div class="ctm_item_text">
          <?php the_sub_field('text'); ?>
        </div>
      </div>
      <div class="ctm_item-left">
        <div class="ctm_item_img">
          <img src="<?php the_sub_field('img'); ?>" alt="">
        </div>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
</section>
<div class="acc-g-under"></div>
<?php endif; ?>

<!--
<section class="section yumenoki-bg-left">
  <div class="container w-1200">
    <div class="ctm_title">
      <h3 class="deco-green">園の特色</h3>
    </div>
    <div class="columns is-variable is-8-desktop">
      <div class="column">
        <div class="feature_item">
          <div class="feature_item_img">
            <img src="/wp-content/uploads/no-image.jpg" alt="">
          </div>
          <div class="feature_item_title">ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯</div>
          <div class="feature_item_text has-text-weight-light">ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯</div>
        </div>
      </div>
    </div>
  </div>
</section>
-->

<?php if(have_rows('overview')): ?>
<div class="acc"></div>
  <section class="section bg-beige">
    <div class="container w-1000">
      <div class="ctm_title">
        <h3 class="deco-green">園概要</h3>
      </div>
      <table class="ctm_table">
        <?php while(have_rows('overview')): the_row(); ?>
        <tr>
          <th><?php the_sub_field('title'); ?></th>
          <td><?php the_sub_field('content'); ?></td>
        </tr>
        <?php endwhile; ?>
      </table>
      <?php get_template_part('include/contact'); ?>
    </div>
  </section>
<div class="acc-under"></div>
<?php endif; ?>
