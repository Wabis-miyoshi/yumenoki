<!DOCTYPE HTML>
<html lang="ja" prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php vswp_title(); ?></title>

  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/lib/css/slick.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/lib/css/slick-theme.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.3.7/css/swiper.min.css">
  <?php wp_head();?>

  <?php echo get_option('analytics_tracking_code');?>
</head>

<body>
  <header class="siteHeader">
    <?php
      $underLogo_image = get_option('logo_image');
      $underLogo_text = get_option('logo_text');
      if( !empty($underLogo_image) && get_option('toppage_logo_type') == 'logo_image') :
        $logo_inner = '<img src="'. get_option('logo_image') .'" alt="'.get_bloginfo('name').'" />';
      else:
        if (!empty($underLogo_text) && get_option('toppage_logo_type') == 'logo_text') :
          $logo_inner = get_option('logo_text');
        else:
          $logo_inner = get_bloginfo('name');
        endif;
        $logo_inner_desc = '<p class="description">'.get_bloginfo('description').'</p>';
      endif;
      $logo_wrap = ( is_front_page() || is_home() ) ? 'h1' : 'p' ;
    ?>
    <<?php echo $logo_wrap; ?> id="underLogo" itemprop="headline">
      <a href="<?php echo home_url(); ?>" class="is-flex">
        <?php echo $logo_inner; ?>
      </a>
    </<?php echo $logo_wrap; ?>>

    <div class="headerAccess is-hidden-touch">
      <a href="/access"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Access</a>
    </div>

      <div class="burger">
        <span></span>
        <span></span>
        <span></span>
      </div>

    <nav class="menu">
      <div class="menuArea">
      <ul class="menuList font-genjyuu-p">
        <li class="menuList_item"><a href="/">トップページ<span><br>Top</span></a></li>
        <li class="menuList_item"><a href="/about/">園について<span><br>About</span></a></li>
        <li class="menuList_item"><a href="/message/">園長あいさつ<span><br>Message</span></a></li>
        <li class="menuList_item"><a href="/life/">園での一日<span><br>Life</span></a></li>
        <li class="menuList_item"><a href="/admission/">入園案内<span><br>Admission</span></a></li>
        <li class="menuList_item"><a href="/recruit/">採用情報<span><br>Recruit</span></a></li>
        <li class="menuList_item"><a href="/info/">情報公開<span><br>Info</span></a></li>
        <li class="menuList_item"><a href="/link/">関連リンク<span><br>Link</span></a></li>
        <li class="menuList_item"><a href="/contact/">お問い合わせ<span><br>Contact</span></a></li>
        <li class="menuList_item"><a href="/access/">アクセス<span><br>Access</span></a></li>
      </ul>
      <ul class="menu-pageLink font-genjyuu">
        <li class="menu-pageLink_item about" style="background: url(/wp-content/uploads/news-main.jpg) center/cover no-repeat;"><a href="/news/"><p><span class="font-shirokuma">お知らせ</span><br>News</p></a></li>
        <li class="menu-pageLink_item admission" style="background: url(/wp-content/uploads/blog-main.jpg) center/cover no-repeat;"><a href="/blog/"><p><span class="font-shirokuma">ゆめの樹ブログ</span><br>Blog</p></a></li>
      </ul>
    </div>
      </div>
    </nav>
  </header>
