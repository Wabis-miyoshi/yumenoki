<section class="section messageBlock page-bg">
  <div class="container w-1200">
    <div class="messageArea">
      <div class="messageArea-right">
        <?php
        // vars
        $group_name = get_field('intro');
        if( $group_name ):
        ?>
        <div class="messageArea_img">
          <img src="<?php echo $group_name['img']; ?>" alt="">
        </div>
        <div class="messageArea_nameBlock">
          <div class="messageArea_nameBlock-icon">
            <img src="/wp-content/uploads/logo-icon.png" alt="">
          </div>
          <div class="messageArea_nameBlock_text">
            <p><?php echo $group_name['title']; ?></p>
            <p><?php echo $group_name['name']; ?></p>
            <p><?php echo $group_name['name2']; ?></p>
          </div>
        </div>
        <?php endif; ?>
      </div>
      <div class="messageArea-left">
        <?php
        // vars
        $group_name = get_field('message');
        if( $group_name ):
        ?>
        <div class="messageArea-catch">
          <?php echo $group_name['catch']; ?>
        </div>
        <div class="messageArea_text">
          <p>
            <?php echo $group_name['text']; ?>
          </p>
        </div>
        <div class="messageArea-neme has-text-right">
          <img src="<?php echo $group_name['signature']; ?>" alt="">
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php if(have_rows('message2')): ?>
<div class="acc-g"></div>
<section class="section ctm bg-green yumenoki-bg-right">
  <div class="container w-1200">
    <?php while(have_rows('message2')): the_row(); ?>
    <div class="ctm_item">
      <div class="ctm_item-right">
        <div class="is-flex-tablet">
          <div class="ctm_item-nom text-shadow"><?php the_sub_field('num'); ?><span class="is-block"></span></div>
          <div class="ctm_item_title">
            <span><?php the_sub_field('catch'); ?></span>
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
