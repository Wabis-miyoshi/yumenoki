<div class="entry is-hidden"><a href="/entry/" class="entry_btn"><span>採用<br>エントリー<br><span class="entry_btn-arrow">→</span></span></a></div>
  <footer class="siteFooter">
    <?php if(is_front_page()): ?>
    <div class="map">
      <?php echo get_option('google_map'); ?>
    </div>
    <?php else:endif; ?>
    <div class="w-1200 section pb-0 pt-40">
      <div class="siteFooter_inner columns">
        <div class="footerLogoArea column">
        <?php
          $footerLogo_image = get_option('footerLogo_image');
          $footerLogo_text = get_option('footerLogo_text');
          if( !empty($footerLogo_image) && get_option('footer_logo_type') == 'footerLogo_image') :
            $logo_inner = '<img src="'. get_option('footerLogo_image') .'" alt="'.get_bloginfo('name').'" />';
          else:
            if (!empty($footerLogo_text) && get_option('footer_logo_type') == 'footerLogo_text') :
              $logo_inner = get_option('footerLogo_text');
            else:
              $logo_inner = get_bloginfo('name');
            endif;
            $logo_inner_desc = '<p class="footer-description">'.get_bloginfo('description').'</p>';
          endif;
          $logo_wrap = ( is_front_page() || is_home() ) ? 'h1' : 'p' ;
        ?>
        <<?php echo $logo_wrap; ?> id="footerLogo" itemprop="headline">
          <a href="<?php echo home_url(); ?>"><?php echo $logo_inner; ?></a><br />
        </<?php echo $logo_wrap; ?>>
          <div class="footerLogoArea_text">
            <p>〒591-801<br>堺市北区花田町2480-4</p>
            <p>TEL：072-291-6400<br>FAX：072-291-6410</p>
          </div>
        </div><!-- .footerLogoArea -->
        <div class="column is-hidden-touch is-5">
          <div class="footerMenu">
            <div class="footerMenuList">
              <div>
                <a href="/about/" class="footerMenuList_item">園について</a>
                <a href="/message/" class="footerMenuList_item">園長あいさつ</a>
                <a href="/life/" class="footerMenuList_item">園での一日</a>
                <a href="/admission/" class="footerMenuList_item">入園案内</a>
              </div>
              <div>
                <a href="/access/" class="footerMenuList_item">アクセス</a>
                <a href="/recruit/" class="footerMenuList_item">採用情報</a>
                <a href="/links/" class="footerMenuList_item">リンク</a>
                <a href="/contact/" class="footerMenuList_item">お問い合わせ</a>
              </div>
              <div>
                <a href="/blog/" class="footerMenuList_item">ブログ</a>
                <a href="/news/" class="footerMenuList_item">お知らせ</a>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="footerAppArea">
            <div class="footerAppArea-name is-flex">
              <div class="footerAppArea-name-img">
                <img src="" alt="">
              </div>
              <div class="footerAppArea-name_text">
                <p><span>連絡帳アプリ</span><br>アプリの名前アプリの名前</p>
              </div><!-- .footerAppArea-name_text -->
            </div><!-- .footerAppArea-name -->
            <div class="footerAppArea-btn is-flex">
              <a href="" class="footerAppArea-btn_item"><img src="/wp-content/uploads/google-play.png" alt=""></a>
              <a href="" class="footerAppArea-btn_item"><img src="http://yumenoki.vs-development.xyz/wp-content/uploads/app-store.png" alt=""></a>
            </div>
          </div><!-- .footerAppArea -->
        </div>
      </div>
    </div>
    <div class="copy has-text-centered-touch w-1200">&copy; <script>document.write(new Date().getFullYear());</script> Yumenoki Kodomoen group.</div>
  </footer>
  <?php wp_footer(); ?>
  <script src="<?php echo get_template_directory_uri() ?>/lib/js/slick.min.js"></script>
  </body>
</html>
