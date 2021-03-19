<?php


/* ゆめの樹ブログのカスタム投稿
* ---------------------------------------- */
// カスタム投稿タイプ追加(blog)
function create_blog() {
  $labels = array(
    'name' => 'ゆめの樹ブログ',
    'singular_name' => 'ゆめの樹ブログ',
    'add_new' => '新しいゆめの樹ブログ',
    'add_new_item' => '新しいゆめの樹ブログを追加',
    'edit_item' => 'ゆめの樹ブログを編集',
    'new_item' => '新しいゆめの樹ブログを追加',
    'search_items' => 'ゆめの樹ブログを検索',
    'view_item' => 'ゆめの樹ブログを表示'
  );

  register_post_type( 'blog',
    array(
        'labels' => $labels,
        'exclude_from_search' => false,
        'hierarchical' => true,
        'public' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'menu_icon' => '',
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes' )
    )
  );
    // カスタムタクソノミーを作成
  //カテゴリータイプ
  $args = array(
    'label' => 'ゆめの樹ブログカテゴリー',
    'public' => true,
    'show_ui' => true,
    'hierarchical' => true,
  );
  register_taxonomy('blog_cat','blog',$args);
}
add_action( 'init', 'create_blog' );
