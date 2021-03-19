<?php

/* StyleSheet
* ---------------------------------------- */

if( !is_admin() ){
  add_action('wp_enqueue_scripts', 'vswp_add_style',9);
  function vswp_register_style(){
    wp_register_style( 'common-css', get_template_directory_uri().'/lib/css/site.min.css' );
    wp_register_style( 'main-css', get_stylesheet_directory_uri().'/style.css',array('base-css') );
  }
  function vswp_add_style(){
    vswp_register_style();
    wp_enqueue_style('common-css');
    wp_enqueue_style('main-css');
  }
}

/* JavaScript
* ---------------------------------------- */

if (!is_admin()) {
  add_action('wp_enqueue_scripts', 'vswp_add_script');
  function vswp_register_script(){
    // トップページへ戻る
    wp_register_script('app', get_template_directory_uri().'/lib/js/app.js', array('jquery'), false, true );
  }
  function vswp_add_script() {
    vswp_register_script();
    wp_enqueue_script('app');
  }
}


/* admin
* ---------------------------------------- */

add_action('admin_enqueue_scripts', 'vswp_admin_asset');
function vswp_admin_asset(){

  // CSSファイルを登録
  wp_register_style( 'admin_css', get_template_directory_uri().'/lib/css/style_admin.css' );
  // CSSファイルを表示
  wp_enqueue_style( 'admin_css' );

  // JSファイルを登録
  wp_register_script( 'vswp_admin_js', get_template_directory_uri().'/lib/js/vswp-admin.js', array('jquery') );
  //JSファイルを表示
  wp_enqueue_script('vswp_admin_js');
}
