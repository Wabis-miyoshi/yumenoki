<?php

/* head内で不要な記述を削除
* ---------------------------------------- */
// wp-jsonを出力させない
remove_action('wp_head','rest_output_link_wp_head');
// ブログ編集ツールのタグを出力させない
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
// WordPressバージョン情報を出力させない
remove_action('wp_head', 'wp_generator');
// ショートリンクを出力させない
remove_action('wp_head', 'wp_shortlink_wp_head');
// Embed埋め込み用のタグを出力させない
remove_action('wp_head','rest_output_link_wp_head');
remove_action('wp_head','wp_oembed_add_discovery_links');
remove_action('wp_head','wp_oembed_add_host_js');
// 分割ページヘのリンク表示のタグを出力させない
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

function disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emojis' );


/* タイトル
それぞれにfilterを持たせることにより、柔軟に表示形式を変更できるようにした。
add_filter('vswp_title', func);
* ---------------------------------------- */
function vswp_title(){
  if( is_front_page() || is_home() ){
    $title = apply_filters('vswp_title', get_bloginfo('name'));
  }elseif( is_category() ){
    global $post;
      $t_id = get_category( intval( get_query_var('cat') ) )->term_id;
      $cat_class = get_category($t_id);
      $cat_option = get_option('cat_'.$t_id);
      if(isset($cat_option['vswp_meta_title']) && $cat_option['vswp_meta_title'] !== '' ){
        $title = apply_filters('vswp_title', $cat_option['vswp_meta_title']);
      }else{
        $title = apply_filters('vswp_title', $cat_class->name);
      }
  }elseif( is_date() ){
    if( is_day() ){
      $title  = get_the_time('Y').'年';
      $title .= get_the_time('n').'月';
      $title .= get_the_time('j').'日';
      $title  = apply_filters('vswp_title', $title);
    }elseif( is_month() ){
      $title  = get_the_time('Y').'年';
      $title .= get_the_time('n').'月';
      $title  = apply_filters('vswp_title', $title);
    }elseif( is_year() ){
      $title  = get_the_time('Y').'年';
      $title  = apply_filters('vswp_title', $title);
    }
  }elseif( is_tag() ){
    $title = apply_filters('vswp_title', single_tag_title('', false));
  }elseif( is_archive() ){
    $title = apply_filters('vswp_title', wp_title(''));
  }elseif( is_search() ){
    $title = '「'.get_search_query().'」の検索結果';
  }else{
    $title = apply_filters('vswp_title', get_the_title());
  }
  echo $title;
}

function get_vswp_title(){
  if( is_category() ){
    global $post;
      $t_id = get_category( intval( get_query_var('cat') ) )->term_id;
      $cat_class = get_category($t_id);
      $cat_option = get_option('cat_'.$t_id);
      if( isset($cat_option['vswp_meta_title']) && $cat_option['vswp_meta_title'] !== '' ){
        $title = $cat_option['vswp_meta_title'];
      }else{
        $title = $cat_class->name;
      }
  }else{
    $title = get_the_title();
  }
  return $title;
}


/* メタ情報の出力
* ---------------------------------------- */
if( !function_exists('vswp_header_meta') ){

  add_action('wp_head', 'vswp_header_meta', 1);
  function vswp_header_meta(){

    global $post;
    global $term_id;


    $keyword = '';
    $description = '';
    $title = '';
    $type = '';
    $url = '';
    $image = '';


    // カテゴリーディスクリプションのPを削除
    remove_filter('term_description','wpautop');

    // OGP
    // og:title / og:type / og:description
    //
    if( is_front_page() || is_home() ){
      // TOPページ / HOMEページ
      $title = get_bloginfo('title');
      $type  = 'website';
      $description = get_bloginfo('description');
      $url =  home_url()  .'/';

      $logo_image = get_option('logo_image');
      $def_image = get_option('def_image');
      if( isset($def_image) ){
        $image = $def_image;
      }else{
        $image = $logo_image;
      }

      $keyword = get_option('meta_keywords');

    }elseif (is_archive()){
      if( is_category() ){
        // カテゴリーページ
  
        $t_id = get_category( intval( get_query_var('cat') ) )->term_id;
        $cat_class = get_category($t_id);
  
        $cat_option = get_option('cat_'.$t_id);
        if( is_array($cat_option) ){
          $cat_option = array_merge(array(
            'vswp_meta_title' => '',
            'vswp_meta_keywords' => ''),$cat_option);
        }
        if( isset($cat_option['vswp_meta_title']) && $cat_option['vswp_meta_title'] !== '' ){
          $title = $cat_option['vswp_meta_title'];
        }else{
          $title = $cat_class->name;
        }
        $type = 'article';
        $description = esc_attr(category_description()) ;
        $url = get_category_link($t_id);
        if( isset($cat_option['vswp_category_image']) && $cat_option['vswp_category_image'] !== '' )  {
          $image = $cat_option['vswp_category_image'];
        }else{
          $image = get_option('def_image');
        }
        $keyword = $cat_option['vswp_meta_keywords'];
      }elseif( is_date() ){
      // 日付に関連する一覧ページ
       if( is_day() ){
         $title .= get_the_time('Y').'年 ';
         $title .= get_the_time('n').'月 ';
         $title .= get_the_time('j').'日';
         $archive_year  = get_the_time( 'Y' ); 
         $archive_month = get_the_time( 'm' ); 
         $archive_day   = get_the_time( 'd' ); 
         $url = get_day_link( $archive_year, $archive_month, $archive_day );
       }elseif( is_month() ){
         $title .= get_the_time('Y').'年 ';
         $title .= get_the_time('n').'月 ';
         $archive_year  = get_the_time( 'Y' );
         $archive_month = get_the_time( 'm' );
         $url = get_month_link( $archive_year, $archive_month );
       }elseif( is_year() ){
         $title .= get_the_time('Y').'年 ';
         $archive_year  = get_the_time( 'Y' );
         $url = get_year_link( $archive_year );
       }
       $title .= 'の投稿一覧';
      }
    }
  elseif( is_search() ){
      //検索結果ページ
      $title .= '「'.get_search_query().'」の検索結果';
    }else{
      // その他のページ
      if( isset($post) ){
        $post_meta = get_post_meta($post->ID);

        $title = get_the_title();
        $type  = 'article';
        $description = get_post_meta( $post->ID,  'vswp_meta_description', true ) ? get_post_meta( $post->ID,  'vswp_meta_description', true ) : mb_substr(strip_tags($post->post_content), 0, 120);
        $url = get_permalink();
        if( has_post_thumbnail($post->ID) ){
          $pre_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), true);
          if(is_array($pre_image));
          $image = (empty($pre_image)) ? "" : reset( $pre_image );
        }else{
          $image = get_option('def_image');
        }
        $keyword = isset($post_meta['vswp_meta_keywords'][0]) ? $post_meta['vswp_meta_keywords'][0] : '';
      }
    }

    // META
    $meta = '';
    $meta = '<meta name="keywords" content="'.$keyword.'" />' . "\n";
    $meta .= '<meta name="description" content="'.$description.'" />' . "\n";
    $robots = "";
    $set = '';

    if( is_home() || is_front_page() ) {
      $robots = "index";
    }elseif( is_404() || is_search() ) {
      $robots = 'noindex,nofollow';
    }elseif( is_archive() ) {
      if( is_category() ){
        if( (isset($cat_option['vswp_meta_robots'][0]) && $cat_option['vswp_meta_robots'][0] == 'noindex') && (isset($cat_option['vswp_meta_robots'][1]) && $cat_option['vswp_meta_robots'][1] == 'nofollow' ) ){
          $robots = 'noindex,nofollow';
        }elseif( (isset($cat_option['vswp_meta_robots'][0]) && $cat_option['vswp_meta_robots'][0] == 'noindex') && (isset($cat_option['vswp_meta_robots'][1]) && $cat_option['vswp_meta_robots'][1] == null) ){
          $robots = 'noindex';
        }elseif( (isset($cat_option['vswp_meta_robots'][0]) && $cat_option['vswp_meta_robots'][0] == null) && (isset($cat_option['vswp_meta_robots'][1]) && $cat_option['vswp_meta_robots'][1] == 'nofollow' ) ){
          $robots = 'nofollow';
        }else{
          $robots = 'index';
        }
      } else {
        $robots = "index";
      }
    }else{
      if( isset($post) ){
        $post_meta = get_post_meta($post->ID);
        ( isset($post_meta['vswp_meta_robots']) ) ? $vswp_meta_robots_arr = unserialize($post_meta['vswp_meta_robots'][0]): '';
        if( isset($vswp_meta_robots_arr) && in_array("noindex",$vswp_meta_robots_arr) && in_array("nofollow",$vswp_meta_robots_arr) ){
          $robots = 'noindex,nofollow';
        }elseif( isset($vswp_meta_robots_arr) && in_array("noindex",$vswp_meta_robots_arr) ){
          $robots = 'noindex';
        }elseif( isset($vswp_meta_robots_arr) && in_array("nofollow",$vswp_meta_robots_arr) ){
          $robots = 'nofollow';
        }else{
          $robots = 'index';
        }
      }
    }

    if( get_option('blog_public') ){
      $set = '<meta name="robots" content="'.$robots.'" />' . "\n";
    }

    if( is_paged() ){
      $meta.= '<meta name="robots" content="noindex,nofollow">' . "\n";
    }else{
      $meta.= $set;
    }

    $favicon =  get_option('favicon_image');
    if( $favicon || $favicon !== '' ){
      $meta .= '<link rel="icon" href="'.esc_html($favicon).'" />' . "\n";
    }

    $facebook_user_id =  get_option('facebook_user_id');
    if( $facebook_user_id || $facebook_user_id !== '' ){
      $meta .= '<meta property="fb:admins" content="'.esc_html($facebook_user_id).'" />' . "\n";
    }

    $facebook_app_id =  get_option('facebook_app_id');
    if( $facebook_app_id || $facebook_app_id !== '' ){
      $meta .= '<meta property="fb:app_id" content="'.esc_html($facebook_app_id).'" />' . "\n";
    }

    // OGP

    $meta .= '<meta property="og:title" content="'.esc_html($title).'" />' . "\n";
    $meta .= '<meta property="og:type" content="'.esc_html($type).'" />' . "\n";
    $meta .= '<meta property="og:description" content="'.esc_textarea($description).'" />' . "\n";
    $meta .= '<meta property="og:url" content="'.esc_url($url).'" />' . "\n";
    $meta .= '<meta property="og:image" content="'.esc_url($image).'" />' . "\n";
    $meta .= '<meta property="og:locale" content="ja_JP" />' . "\n";
    $meta .= '<meta property="og:site_name" content="'.esc_html(get_bloginfo('name')).'" />' . "\n";

    $twitter_id = get_option("twitter_id");
    if($twitter_id || $twitter_id){
      $meta .='<meta content="summary" name="twitter:card" />' . "\n";
      $meta .= '<meta content="' .esc_html($twitter_id) . '" name="twitter:site" />'. "\n\n";
    }

    echo $meta;
  }
}//function_exists
