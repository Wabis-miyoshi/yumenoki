<?php get_header(); ?>

<div class="main">
  <?php if(has_post_thumbnail()): ?>
  <section class="topVisual">
    <div class="topVisual-slider">
      <div class="topVisual_img" style="background: url(<?php the_post_thumbnail_url("", "full"); ?>) center / cover no-repeat;"></div>
    </div>
    <div class="topVisual-catch">
      <p><span>園のキャッチが入ります</span><br><span>ここに園のキャッチが入ります</span><br><span>キャッチが入ります</span></p>
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
          <a href="/information/" class="more">詳しくはこちら&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-right color-primary"></i></a>
        </div>
      </div>
  </section><!-- .section -->

  <section class="section appeal-bg">
    <div class="container w-1200">
      <div class="appeal">
        <div class="columns is-variable is-8-desktop">
          <div class="column">
            <div class="appeal_img">
              <img src="/wp-content/uploads/no-image.jpg" alt="" class="radius-20">
            </div>
          </div>
          <div class="column">
            <div class="appeal_title">
              <p><span>文字の大きさ等を確認す</span><span>文字の大きさ等を確認す</span></p>
            </div>
            <div class="appeal_text">
            この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。<br>この文章はダミーです。<br>文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために<br>入れています。<br>
            この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。
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
            <div class="pageLink_item-catch"><span>ゆめのこども園さかいって</span><span>どんなところ？</span></div>
          </div>
          <div class="pageLink_item-right">
            <div class="pageLink_item_img">
              <img src="/wp-content/uploads/no-image.jpg" alt="">
            </div>
            <div class="pageLink_item_text">
              <p>ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯</p>
            </div>
            <a href="" class="btn">詳細はこちら</a>
          </div>
        </div>

        <div class="pageLink_item">
          <div class="pageLink_title">
            <img src="/wp-content/uploads/message-top.png" alt="">
          </div>
          <div class="pageLink_item-left">
            <div class="pageLink_item-catch"><span>ゆめのこども園さかいって</span><span>どんなところ？</span></div>
          </div>
          <div class="pageLink_item-right">
            <div class="pageLink_item_img">
              <img src="/wp-content/uploads/no-image.jpg" alt="">
            </div>
            <div class="pageLink_item_text">
              <p>ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯</p>
            </div>
            <a href="" class="btn">詳細はこちら</a>
          </div>
        </div>

        <div class="pageLink_item">
          <div class="pageLink_title">
            <img src="/wp-content/uploads/life-top.png" alt="">
          </div>
          <div class="pageLink_item-left">
            <div class="pageLink_item-catch"><span>ゆめのこども園さかいって</span><span>どんなところ？</span></div>
          </div>
          <div class="pageLink_item-right">
            <div class="pageLink_item_img">
              <img src="/wp-content/uploads/no-image.jpg" alt="">
            </div>
            <div class="pageLink_item_text">
              <p>ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯</p>
            </div>
            <a href="" class="btn">詳細はこちら</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="recruitArea">
      <h3 class="recruitArea_title">入園案内</h3>
      <div class="recruitArea_text has-text-centered">ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯ダミー文字◯</div>
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
          <a class="blogList_item">
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
          <div class="banner_img"></div>
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
            <a class="linkListBlock_item" href=""><i class="fas fa-arrow-right color-primary"></i>&nbsp;&nbsp;&nbsp;晴美台幼稚園</a>
            <a class="linkListBlock_item" href=""><i class="fas fa-arrow-right color-primary"></i>&nbsp;&nbsp;&nbsp;みついしこども園</a>
            <a class="linkListBlock_item" href=""><i class="fas fa-arrow-right color-primary"></i>&nbsp;&nbsp;&nbsp;かがやきの森保育園あいおい</a>
            <a class="linkListBlock_item" href=""><i class="fas fa-arrow-right color-primary"></i>&nbsp;&nbsp;&nbsp;晴美台ナーサリー</a>
            <a class="linkListBlock_item" href=""><i class="fas fa-arrow-right color-primary"></i>&nbsp;&nbsp;&nbsp;ゆめの樹こども園さかい</a>
          </div>
          <div class="linkListBlock">
            <div class="linkListBlock_title">
              <h4>社会福祉法人泉新会</h4>
            </div>
            <a class="linkListBlock_item" href=""><i class="fas fa-arrow-right color-primary"></i>&nbsp;&nbsp;&nbsp;輝きの森学園</a>
            <a class="linkListBlock_item" href=""><i class="fas fa-arrow-right color-primary"></i>&nbsp;&nbsp;&nbsp;かがやきの森保育園うえだ</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div><!-- .main -->




<?php get_footer(); ?>
