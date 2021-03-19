<?php


/* 各種メタボックス保存ルーチン
* ---------------------------------------- */
add_action('save_post', 'vswp_my_box_save');
function vswp_my_box_save($post_id) {
  global $post;
  // $my_nonce = isset($_POST['my_nonce']) ? $_POST['my_nonce'] : null;
  // if(!wp_verify_nonce($my_nonce, wp_create_nonce(__FILE__))) {
  //   return $post_id;
  // }
  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) { return $post_id; }
   // if(!current_user_can('edit_post', $post->ID)) { return $post_id; }

  //if($_POST['post_type'] == 'post'){
    ( isset($_POST['vswp_meta_keywords']) ) ? update_post_meta($post->ID, 'vswp_meta_keywords', $_POST['vswp_meta_keywords']) : "";
    ( isset($_POST['vswp_meta_description']) ) ? update_post_meta($post->ID, 'vswp_meta_description', str_replace(array("\r\n","\r","\n"), '', $_POST['vswp_meta_description'])) : "";
    ( isset($_POST['vswp_meta_robots']) ) ? update_post_meta($post->ID, 'vswp_meta_robots', $_POST['vswp_meta_robots']) : "";
    ( isset($_POST['vswp_post_layout']) ) ? update_post_meta($post->ID, 'vswp_post_layout', $_POST['vswp_post_layout']) : "";
    ( isset($_POST['vswp_post_asset_js4head']) ) ? update_post_meta($post->ID, 'vswp_post_asset_js4head', $_POST['vswp_post_asset_js4head']) : "";
    ( isset($_POST['vswp_post_asset_css']) ) ? update_post_meta($post->ID, 'vswp_post_asset_css', $_POST['vswp_post_asset_css']) : "";
    ( isset($_POST['vswp_post_asset_js']) ) ? update_post_meta($post->ID, 'vswp_post_asset_js', $_POST['vswp_post_asset_js']) : "";


    ( isset($_POST['vswp_cta']) ) ? update_post_meta($post->ID, 'vswp_cta', $_POST['vswp_cta']) : "";
    ( isset($_POST['vswp_post_front_info']) ) ? update_post_meta($post->ID, 'vswp_post_front_info', $_POST['vswp_post_front_info']) : "";

    ( isset($_POST['vswp_checklists']) ) ? update_post_meta($post->ID, 'vswp_checklists', $_POST['vswp_checklists']) : "";

    ( isset($_POST['frm']) ) ? update_post_meta($post->ID, 'frm', $_POST['frm']) : "";
    ( isset($_POST['vswp_show_toppage_flag']) ) ? update_post_meta($post->ID, 'vswp_show_toppage_flag', $_POST['vswp_show_toppage_flag']) : "";
    ( isset($_POST['vswp_include_rss']) ) ? update_post_meta($post->ID, 'vswp_include_rss', $_POST['vswp_include_rss']) : "";
    ( isset($_POST['vswp_post_social_buttons']) ) ? update_post_meta($post->ID, 'vswp_post_social_buttons', $_POST['vswp_post_social_buttons']) : "";
    //
    ( isset($_POST['vswp_cta_select_button']) ) ? update_post_meta($post->ID, 'vswp_cta_select_button', $_POST['vswp_cta_select_button']) : "";
    ( isset($_POST['vswp_cta_select_button_url']) ) ? update_post_meta($post->ID, 'vswp_cta_select_button_url', $_POST['vswp_cta_select_button_url']) : "";
    ( isset($_POST['vswp_cta_select_button_cvtag']) ) ? update_post_meta($post->ID, 'vswp_cta_select_button_cvtag', $_POST['vswp_cta_select_button_cvtag']) : "";

}


/* 投稿のメタタグ用カスタムフィールド
* ---------------------------------------- */
add_action('add_meta_boxes', 'add_vswp_meta_tags');
function add_vswp_meta_tags() {
  add_meta_box('vswp_meta_tags', 'メタタグを設定', 'vswp_meta_tags', 'post', 'normal', 'high');
}

function vswp_meta_tags() {
  global $post;
  wp_nonce_field(wp_create_nonce(__FILE__), 'my_nonce');
  $metarobots_array = array();
  $metarobots_array = get_post_meta($post->ID, 'vswp_meta_robots', true);
?>
  <p><small>メタタグとはサイトの情報を検索エンジンに正確に提供するために設定する物です。全ての記事で妥協せずに設定するようにしましょう。</small></p>
  <h4>メタディスクリプション</h4>
  <p>
    <small>この記事の要約を書きます。本文を書いた後に入力しても構いません。</small>
  </p>
  <textarea name="vswp_meta_description" id="vswp_meta_description" cols="60" rows="4"><?php echo get_post_meta($post->ID, 'vswp_meta_description', true); ?></textarea><br />
  <span class="count_description"></span>文字 <small>※全角120文字以内推奨</small>
  <h4>メタキーワード</h4>
  <p>
    <small>この記事で対策するキーワードを入力します。1記事1キーワードの推奨します。（もしどうしても複数設定したい場合は小文字のカンマ(,)で区切って下さい）</small>
  </p>
  <input type="text" class="regular-text" name="vswp_meta_keywords" id="vswp_meta_keywords" value="<?php echo get_post_meta($post->ID, 'vswp_meta_keywords', true); ?>" />
  <h4>メタロボット</h4>
  <small>ページのnoindexやnofollowの設定を行います。詳しい使い方や効果は、『<a href="http://bazubu.com/seo101/how-to-use-noindex-tag" target="_blank">noindexの使い方</a>』や『<a href="http://bazubu.com/seo101/how-to-use-nofollow" target="_blank">nofollowの使い方</a>』をご覧下さい。</small>
  <ul>
    <li>
      <input type="hidden" name="vswp_meta_robots[]" value="">
      <label for="vswp_meta_robots1"><input class="cmb_option" type="checkbox" name="vswp_meta_robots[]" id="vswp_meta_robots1" value="noindex"  <?php echo (is_array($metarobots_array) && in_array('noindex', $metarobots_array)) ? 'checked' : '';?> /> noindex</label>
    </li>
    <li>
      <input type="hidden" name="vswp_meta_robots[]" value="">
      <label for="vswp_meta_robots2"><input class="cmb_option" type="checkbox" name="vswp_meta_robots[]" id="vswp_meta_robots2" value="nofollow" <?php echo (is_array($metarobots_array) && in_array('nofollow', $metarobots_array)) ? 'checked' : '';?>  /> nofollow</label>
    </li>
  </ul>
<?php
}


/* 固定ページのメタタグ用カスタムフィールド
* ---------------------------------------- */
add_action('add_meta_boxes', 'add_vswp_meta_tags_page');
function add_vswp_meta_tags_page() {
  add_meta_box('vswp_meta_tags_page', 'メタタグを設定', 'vswp_meta_tags_page', 'page', 'normal', 'high');
}

function vswp_meta_tags_page() {
  global $post;
  wp_nonce_field(wp_create_nonce(__FILE__), 'my_nonce');
  $metarobots_array = array();
  $metarobots_array = get_post_meta($post->ID, 'vswp_meta_robots', true);
?>
  <p><small>メタタグとはサイトの情報を検索エンジンに正確に提供するために設定する物です。</small></p>
  <h4>メタディスクリプション</h4>
  <p>
    <small>この記事の要約を書きます。本文を書いた後に入力しても構いません。</small>
  </p>
  <textarea name="vswp_meta_description" id="vswp_meta_description" cols="60" rows="4"><?php echo get_post_meta($post->ID, 'vswp_meta_description', true); ?></textarea><br />
  <span class="count_description"></span>文字 <small>※全角120文字以内推奨</small>
  <h4>メタキーワード</h4>
  <p>
    <small>この記事で対策するキーワードを入力します。</small>
  </p>
  <input type="text" class="regular-text" name="vswp_meta_keywords" id="vswp_meta_keywords" value="<?php echo get_post_meta($post->ID, 'vswp_meta_keywords', true); ?>" />
  <h4>メタロボット</h4>
  <small>ページのnoindexやnofollowの設定を行います。詳しい使い方や効果は、『<a href="http://bazubu.com/seo101/how-to-use-noindex-tag" target="_blank">noindexの使い方</a>』や『<a href="http://bazubu.com/seo101/how-to-use-nofollow" target="_blank">nofollowの使い方</a>』をご覧下さい。</small>
  <ul>
    <li>
      <input type="hidden" name="vswp_meta_robots[]" value="">
      <label for="vswp_meta_robots1"><input class="cmb_option" type="checkbox" name="vswp_meta_robots[]" id="vswp_meta_robots1" value="noindex"  <?php echo (is_array($metarobots_array) && in_array('noindex', $metarobots_array)) ? 'checked' : '';?> /> noindex</label>
    </li>
    <li>
      <input type="hidden" name="vswp_meta_robots[]" value="">
      <label for="vswp_meta_robots2"><input class="cmb_option" type="checkbox" name="vswp_meta_robots[]" id="vswp_meta_robots2" value="nofollow" <?php echo (is_array($metarobots_array) && in_array('nofollow', $metarobots_array)) ? 'checked' : '';?>  /> nofollow</label>
    </li>
  </ul>
<?php
}
