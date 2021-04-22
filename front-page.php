<?php get_header(); ?>

<div class="main">
  <?php if(has_post_thumbnail()): ?>
  <section class="topVisual">
    <div class="swiper-container topVisual-slider">
      <div class="swiper-wrapper">
        <div class="swiper-slide topVisual_img" style="background: url(/wp-content/uploads/topMain-001.jpg) center / cover no-repeat;"></div>
        <div class="swiper-slide topVisual_img" style="background: url(/wp-content/uploads/topMain-002.jpg) center / cover no-repeat;"></div>
        <div class="swiper-slide topVisual_img" style="background: url(/wp-content/uploads/topMain-003.jpg) center / cover no-repeat;"></div>
        <div class="swiper-slide topVisual_img" style="background: url(/wp-content/uploads/topMain-004.jpg) center / cover no-repeat;"></div>
        <div class="swiper-slide topVisual_img" style="background: url(/wp-content/uploads/topMain-005.jpg) center / cover no-repeat;"></div>
      </div>
    </div>
    <div class="topVisual-catch">
      <p>
        <span>「見通しを持って」「見守り」「認める」</span><br>
        <span>一人ひとりのこども達に</span><br>
        <span>あふれんばかりの愛情を</span>
      </p>
    </div>
    <?php
        $args = array(
          'post_type' => 'post', // 投稿タイプのスラッグを指定
          'post_status' => 'publish', // 公開済の投稿を指定
          'posts_per_page' => 1, // 投稿件数の指定
          'orderby' => 'modified', // 更新日時順
          'category_name' => 'emergency'
        );
        $the_query = new WP_Query($args); if($the_query->have_posts()):
    ?>
    <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
    <a href="<?php the_permalink(); ?>" class="topVisual-news">
      <p class="headline"><span>重要なお知らせ</span></p>
      <div class="topVisual-news_inner">
        <?php echo get_the_title(); ?>
      </div>
      <div class="topVisual-news-arrow">
        <div class="topVisual-news-arrow-icon"><i class="fas fa-arrow-right"></i></div>
      </div>
    </a>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </section><!-- .topVisual -->
  <?php endif; ?>

  <section class="section">
    <div class="w-1000">
      <div class="newsTitle">
        <h2>お知らせ</h2>
        <span>News</span>
      </div><!-- .newsTitle -->
      <div class="newsArea">
        <ul class="newsList w-1000">
        <?php
            $args = array(
              'post_type' => 'post', // 投稿タイプのスラッグを指定
              'post_status' => 'publish', // 公開済の投稿を指定
              'posts_per_page' => 3, // 投稿件数の指定
              'orderby' => 'modified' // 更新日時順
            );
            $the_query = new WP_Query($args); if($the_query->have_posts()):
        ?>
        <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
          <?php get_template_part('include/newsList_item'); ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        </ul>
        <div class="has-text-right">
          <a href="/news/" class="more">詳しくはこちら&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-right color-primary"></i></a>
        </div>
      </div>
  </section><!-- .section -->

  <section class="section appeal-bg">
    <div class="container w-1200">
      <div class="appeal">
        <div class="columns is-variable is-8-desktop">
          <div class="column">
            <div class="appeal_img">
              <img src="/wp-content/uploads/DSC03332-86.jpg" alt="" class="radius-20">
            </div>
          </div>
          <div class="column">
            <div class="appeal_title">
              <p><span>すべては</span><span>こどもたちのために</span></p>
            </div>
            <div class="appeal_text">
              「愛情」をかけ「生活する力」を身に着け「すこやかな身体を」「心と言葉」「自立と協調性」育みます。<br>
              自己解決できるお子様を育てます。
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section pb-0">
  <div class="acc"></div>
    <div class="pageLink">
      <div class="pageLinkArea">
        <div class="pageLink_item">
          <div class="pageLink_title">
            <img src="/wp-content/uploads/about-top.png" alt="">
          </div>
          <div class="pageLink_item-left">
            <div class="pageLink_item-catch"><span>ゆめの樹こども園&nbsp;さかいって</span><span>どんなところ？</span></div>
          </div>
          <div class="pageLink_item-right">
            <div class="pageLink_item_img">
              <img src="/wp-content/uploads/59bb941d82afbd19acf3cf11dcb53a62.jpg" alt="">
            </div>
            <div class="pageLink_item_text">
              <p>思いっきり遊びます！</p>
            </div>
            <a href="/about" class="btn">詳細はこちら</a>
          </div>
        </div>

        <div class="pageLink_item">
          <div class="pageLink_title">
            <img src="/wp-content/uploads/message-top.png" alt="">
          </div>
          <div class="pageLink_item-left">
            <div class="pageLink_item-catch"><span>未来ある子どもたち</span><span>一人ひとりを大切に</span></div>
          </div>
          <div class="pageLink_item-right">
            <div class="pageLink_item_img">
              <img src="/wp-content/uploads/2c9f672bcd49acb2436b4b79a984705f.jpg" alt="">
            </div>
            <div class="pageLink_item_text">
              <p>「ありがとう」と「ごめんなさい」と素直にいえるそんな大人になってほしいですね。</p>
            </div>
            <a href="/message" class="btn">詳細はこちら</a>
          </div>
        </div>

        <div class="pageLink_item">
          <div class="pageLink_title">
            <img src="/wp-content/uploads/life-top.png" alt="">
          </div>
          <div class="pageLink_item-left">
            <div class="pageLink_item-catch"><span>元気いっぱい！</span><span>子どもたちの笑顔</span></div>
          </div>
          <div class="pageLink_item-right">
            <div class="pageLink_item_img">
              <img src="/wp-content/uploads/7f6e60bff7b0fc0b9537a07df95b585b.jpg" alt="">
            </div>
            <div class="pageLink_item_text">
              <p>自然豊かな園庭で元気よく</p>
            </div>
            <a href="/life" class="btn">詳細はこちら</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="recruitArea" style="background: url(/wp-content/uploads/3526db894410b3ff327d2d8a636d4a69.jpg) center/cover no-repeat;">
      <h3 class="recruitArea_title">入園案内</h3>
      <div class="recruitArea_text has-text-centered">あそびの中で育むこころ、あそびの中で育む感覚、あそびの中で育む力</div>
      <a href="/admission" class="btn">詳しくはこちら</a>
    </div>
  </section>

  <section class="section blog">
    <div class="container w-1200">
      <div class="blockTitle">
        <h2><img src="/wp-content/uploads/blog_title.png" alt="" class="blockTitle_illust"></h2>
      </div>
      <div class="blogList">
        <div class="columns blogSlider">
        <?php
          $args = array(
            'posts_per_page' => 3,
            'post_type' => 'blog'
          );
          $posts = get_posts( $args );
          foreach ( $posts as $post ):
          setup_postdata( $post );
        ?>
        <?php
          $terms = get_the_terms($post -> ID, 'blog_cat');
          foreach($terms as $term){
          $term_slug = $term -> slug;
          }
        ?>

        <div class="column">
          <a href="<?php the_permalink(); ?>" class="blogList_item">
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
              <p class="date"><?php the_time('Y.m.d'); ?></p>
            </div>
            <div class="blogList_item_title">
              <?php
              the_title();
              ?>
            </div>
          </a>
        </div>
        <?php
          endforeach;
          wp_reset_postdata();
        ?>

        </div>
      </div>
      <a href="/blog/" class="btn">詳しくはこちら</a>
    </div>
  </section>

  <section class="section">
    <div class="container w-1200">
      <div class="banner">
        <div class="is-flex-tablet">
          <div class="banner_img" style="background: url(/wp-content/uploads/d4d512049ec036624e1e9e51512ec88a.jpg) center/cover no-repeat;"></div>
          <div class="bannerInnerArea">
            <div class="bannerInner">
              <p class="bannerInner-catch">＼ 私たちと一緒に働きませんか？ ／</p>
              <p class="bannerInner_title">採用情報</p>
              <a class="more" href="/recruit/">詳しくはこちら&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-right color-primary"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="acc"></div>
    <div class="linkArea">
      <div class="container w-1200 links-bg">
        <div class="linkArea_title">
          <h3>グループ施設Link</h3>
        </div>
        <div class="linkList">
          <div class="linkListBlock">
            <div class="linkListBlock_title">
              <h4>学校法人泉新学園</h4>
            </div>
            <a class="linkListBlock_item" href="http://harumidai.senshin.ed.jp/" target="_blank"><i class="fas fa-arrow-right color-primary"></i>&nbsp;&nbsp;&nbsp;晴美台幼稚園</a>
            <a class="linkListBlock_item" href="http://mitsuishi.senshin.ed.jp/" target="_blank"><i class="fas fa-arrow-right color-primary"></i>&nbsp;&nbsp;&nbsp;みついしこども園</a>
            <a class="linkListBlock_item" href="https://senshin-group.com/aioi" target="_blank"><i class="fas fa-arrow-right color-primary"></i>&nbsp;&nbsp;&nbsp;かがやきの森保育園あいおい</a>
            <a class="linkListBlock_item" href="https://senshin-group.com/harumidai_nursery" target="_blank"><i class="fas fa-arrow-right color-primary"></i>&nbsp;&nbsp;&nbsp;晴美台ナーサリー</a>
          </div>
          <div class="linkListBlock">
            <div class="linkListBlock_title">
              <h4>社会福祉法人泉新会</h4>
            </div>
            <a class="linkListBlock_item" href="http://kagayaki.senshin.ed.jp/" target="_blank"><i class="fas fa-arrow-right color-primary"></i>&nbsp;&nbsp;&nbsp;輝きの森学園</a>
            <a class="linkListBlock_item" href="https://senshin-group.com/ueda" target="_blank"><i class="fas fa-arrow-right color-primary"></i>&nbsp;&nbsp;&nbsp;かがやきの森保育園うえだ</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div><!-- .main -->




<?php get_footer(); ?>
