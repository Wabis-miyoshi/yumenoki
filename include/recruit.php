<section class="section recruit">
  <div class="container w-1200">
    <div class="ctm_title">
      <h3 class="deco-green">登園に入園をご検討の方</h3>
    </div>

    <div class="columns is-variable is-8">
      <div class="column">
        <div>
          <img src="/wp-content/uploads/no-image.jpg" alt="">
        </div>
      </div>
      <div class="column">
        <div class="has-text-weight-light lh-l">
          ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯ダミー文章◯
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section recruit">
  <div class="container w-1000">
    <div class="ctm_title">
      <h3 class="deco-green">募集要項</h3>
    </div>
    <table class="ctm_table recruit_table">
      <?php if(have_rows('requirement')): ?>
      <?php while(have_rows('requirement')): the_row(); ?>
      <tr>
        <th><p><?php the_sub_field('item'); ?></p></th>
        <td><?php the_sub_field('detail'); ?></td>
      </tr>
      <?php endwhile; ?>
      <?php endif; ?>
    </table>
    <p class="has-text-centered mb-30 ls-l">令話00年度募集の詳しい内容は<br class="is-hidden-tablet">こちらでご確認ください</p>
    <a href="" class="btn">詳しくはこちら</a>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="contactArea">
      <div class="contactArea-tel">
        <p class="contactArea_text">お電話でのお問い合わせ</p>
        <p class="contactArea-tel-nom">072-291-6400</p>
        <p class="contactArea-tel-time">受付時間：9:00～17：00</p>
      </div>
      <div class="contactArea-mail">
        <p class="contactArea_text">メールでのお問い合わせ</p>
        <a href="" class="contactArea-mail_btn btn">Mail&nbsp;form</a>
      </div>
    </div>
  </div>
</section>
