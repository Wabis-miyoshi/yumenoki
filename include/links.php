<section class="section pt-0">
  <div class="container w-1000">
    <h3 class="title-border">学校法人泉新学園</h3>
    <?php if(have_rows('links')): ?>
    <?php while(have_rows('links')): the_row(); ?>
    <div class="columns is-desktop">
      <div class="column is-full-mobile is-one-thirds-tablet is-one-thirds-desktop">
        <a class="linkBtn" href="<?php the_sub_field('url'); ?>" target="_blank">
          <?php the_sub_field('name'); ?>
        </a>
      </div>
      <div class="column is-full-mobile is-two-thirds-tablet is-two-thirds-desktop detailText">
        <?php the_sub_field('detail'); ?>
      </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>

    <h3 class="title-border mt-75">社会福祉法人泉新会</h3>
    <?php if(have_rows('links2')): ?>
    <?php while(have_rows('links2')): the_row(); ?>
    <div class="columns is-desktop">
      <div class="column is-full-mobile is-one-thirds-tablet is-one-thirds-desktop">
        <a class="linkBtn" href="<?php the_sub_field('url'); ?>" target="_blank">
          <?php the_sub_field('name'); ?>
        </a>
      </div>
      <div class="column is-full-mobile is-two-thirds-tablet is-two-thirds-desktop detailText">
        <?php the_sub_field('detail'); ?>
      </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>

    <div class="contactArea mt-100">
      <div class="contactArea-tel">
        <p class="contactArea_text">お電話でのお問い合わせ</p>
        <p class="contactArea-tel-nom">072-291-6400</p>
        <p class="contactArea-tel-time">受付時間：9:00～17:00</p>
      </div>
      <div class="contactArea-mail">
        <p class="contactArea_text">フォームからお問い合わせ</p>
        <a href="/contact" class="contactArea-mail_btn btn">お問合せフォーム</a>
      </div>
    </div>
  </div>
</section>
