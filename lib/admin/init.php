<?php

function load_admin_things() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');
}

add_action( 'admin_enqueue_scripts', 'load_admin_things' );

add_action('admin_menu', 'initial_setting_menu');

function initial_setting_menu() {
  add_menu_page('初期設定', '初期設定', 'manage_options', 'initial_setting_menu', 'banner_options_page', '', 1);
  add_action( 'admin_init', 'register_xeory_setting','admin-head');
}


function register_xeory_setting() {
  register_setting( 'xeory-initialize-group', 'blogname' );
  register_setting( 'xeory-initialize-group', 'blogdescription' );
  register_setting( 'xeory-initialize-group', 'meta_keywords' );

  //トップページのロゴ設定
  register_setting( 'xeory-initialize-group', 'toppage_logo_type' );
  register_setting( 'xeory-initialize-group', 'logo_text' );
  register_setting( 'xeory-initialize-group', 'logo_image' );

  //スマホ用のロゴ設定
  register_setting( 'xeory-initialize-group', 'sp_logo_type' );
  register_setting( 'xeory-initialize-group', 'spLogo_text' );
  register_setting( 'xeory-initialize-group', 'spLogo_image' );

  //ファビコン、タッチアイコン設定
  register_setting( 'xeory-initialize-group', 'favicon_image' );
  register_setting( 'xeory-initialize-group', 'touch_image' );

  //フッターのロゴ設定
  register_setting( 'xeory-initialize-group', 'footer_logo_type' );
  register_setting( 'xeory-initialize-group', 'footerLogo_text' );
  register_setting( 'xeory-initialize-group', 'footerLogo_image' );

  //トップページのメタタグの設定
  //コアから取得

  //Googleツールの設定
  register_setting( 'xeory-initialize-group', 'analytics_tracking_code' );
  register_setting( 'xeory-initialize-group', 'google_map' );

  //Facebookとの連携
  register_setting( 'xeory-initialize-group', 'facebook_user_id' );
  register_setting( 'xeory-initialize-group', 'facebook_app_id' );
  register_setting( 'xeory-initialize-group', 'facebook_page_url' );

  register_setting( 'xeory-initialize-group', 'twitter_id' );
  //.htaccessを更新させる必要がある
  flush_rewrite_rules( true );
}

function banner_options_page() {
?>

<script type="text/javascript">

jQuery('document').ready(function(){
    jQuery('.media-upload').each(function(){
        var rel = jQuery(this).attr("rel");
        jQuery(this).click(function(){
            window.send_to_editor = function(html) {
                html = '<a>' + html + '</a>';
                imgurl = jQuery('img', html).attr('src');
                jQuery('#'+rel).val(imgurl);
                tb_remove();
            }
            formfield = jQuery('#'+rel).attr('name');
            tb_show(null, 'media-upload.php?post_id=0&type=image&TB_iframe=true');
            return false;
        });
    });
});
</script>


  <div class="wrap">
    <h2>初期設定</h2>

    <form method="post" action="options.php" enctype="multipart/form-data" encoding="multipart/form-data">
      <?php

        settings_fields( 'xeory-initialize-group' );
        do_settings_sections( 'xeory-initialize-group' );
      ?>

<div class="metabox-holder">
<div id="toppage_logo_setting" class="postbox " >
<h3 class='hndle'><span>トップページのロゴ設定</span></h3>
  <div class="inside">
    <div class="main">
      <p class="setting_description">ここではサイトトップページの左上に表示するロゴの設定をします。</p>
      <h4>ロゴタイプの選択</h4>
      <?php
        $toppage_logo_type = trim(get_option('toppage_logo_type'));
        if(isset($toppage_logo_type) && $toppage_logo_type !== ''){
          $toppage_logo_type = trim(get_option('toppage_logo_type'));
        }else{
          $toppage_logo_type = 'logo_text';
        }
      ?>
      <label><input type="radio" name="toppage_logo_type" value="logo_text" <?php checked($toppage_logo_type, 'logo_text'); ?>
      checked ><strong>テキストロゴ</strong></label>
      <p class="setting_description"><small>テキストのロゴを表示します。ロゴに表示したいテキストを下に入力してください。</small></p>
      <p><input type="text" id="logo_text" name="logo_text" class="regular-text" value="<?php echo get_option('logo_text');?>" /></p>

      <label><input type="radio" name="toppage_logo_type" value="logo_image"<?php checked($toppage_logo_type, 'logo_image'); ?> ><strong>PC画像ロゴ</strong></label>
      <p class="setting_description"><small>PCロゴを画像にします。下の「画像をアップロード」ボタンを押して任意の画像を選択してください。</small></p>
      <p><input type="text" id="logo_image" name="logo_image" class="regular-text" value="<?php echo get_option('logo_image');?>" /><a class="media-upload" href="JavaScript:void(0);" rel="logo_image"><input class="cmb_upload_button button" type="button" value="画像をアップロードする" /></a>
      </p>
    </div>
  </div>
</div>
</div>

<div class="metabox-holder">
<div id="toppage_logo_setting" class="postbox " >
<h3 class='hndle'><span>スマホ用のロゴ設定</span></h3>
  <div class="inside">
    <div class="main">
      <p class="setting_description">ここではスマホで表示するロゴの設定をします。</p>
      <h4>ロゴタイプの選択</h4>
      <?php
        $sp_logo_type = trim(get_option('sp_logo_type'));
        if(isset($sp_logo_type) && $sp_logo_type !== ''){
          $sp_logo_type = trim(get_option('sp_logo_type'));
        }else{
          $sp_logo_type = 'spLogo_text';
        }
      ?>
      <label><input type="radio" name="sp_logo_type" value="logo_text" <?php checked($sp_logo_type, 'spLogo_text'); ?>
      checked ><strong>テキストロゴ</strong></label>
      <p class="setting_description"><small>テキストのロゴを表示します。ロゴに表示したいテキストを下に入力してください。</small></p>
      <p><input type="text" id="spLogo_text" name="spLogo_text" class="regular-text" value="<?php echo get_option('spLogo_text');?>" /></p>

      <label><input type="radio" name="sp_logo_type" value="spLogo_image"<?php checked($sp_logo_type, 'spLogo_image'); ?> ><strong>SP画像ロゴ</strong></label>
      <p class="setting_description"><small>SPロゴを画像にします。下の「画像をアップロード」ボタンを押して任意の画像を選択してください。</small></p>
      <p><input type="text" id="spLogo_image" name="spLogo_image" class="regular-text" value="<?php echo get_option('spLogo_image');?>" /><a class="media-upload" href="JavaScript:void(0);" rel="spLogo_image"><input class="cmb_upload_button button" type="button" value="画像をアップロードする" /></a>
      </p>
    </div>
  </div>
</div>
</div>


<div class="metabox-holder">
<div id="toppage_logo_setting" class="postbox " >
<h3 class='hndle'><span>ファビコン/タッチアイコン設定</span></h3>
  <div class="inside">
    <div class="main">
      <p class="setting_description">ここではサイトのファビコン及びタッチアイコン設定を行います。</p>
      <h4>ファビコン画像設定</h4>

      <p class="setting_description"><small>ファビコン画像を設定します。下記よりファビコンに使用する画像を選択してください。</small></p>
      <p>
        <input type="text" id="favicon_image" name="favicon_image" class="regular-text" value="<?php echo get_option('favicon_image');?>" /><a class="media-upload" href="JavaScript:void(0);" rel="favicon_image"><input class="cmb_upload_button button" type="button" value="画像をアップロードする" /></a>
      </p>

      <h4>タッチアイコン画像設定</h4>
      <p class="setting_description"><small>タッチアイコン画像を設定します。下記よりタッチアイコンに使用する画像を選択してください。</small></p>
      <p>
        <input type="text" id="touch_image" name="touch_image" class="regular-text" value="<?php echo get_option('touch_image');?>" /><a class="media-upload" href="JavaScript:void(0);" rel="touch_image"><input class="cmb_upload_button button" type="button" value="画像をアップロードする" /></a>
      </p>
    </div>
  </div>
</div>
</div>

<div class="metabox-holder">
<div id="toppage_meta_setting" class="postbox " >
<h3 class='hndle'><span>トップページのメタタグの設定</span></h3>
  <div class="inside">
    <div class="main">
      <p class="setting_description">ここではトップページのタイトルとメタタグの設定を行います。</p>

      <h4>トップページタイトル</h4>
      <p><input type="text" id="blogname" class="regular-text" name="blogname" value="<?php echo get_option('blogname'); ?>"></p>
      <p class="setting_description"><small>トップページのタイトルを入力して下さい。ここに入力した内容が検索エンジンにも表示されるようになります。<br>効果的なタイトルのつけ方を知りたい方は、『<a href="http://bazubu.com/what-is-best-for-wp-title-22931.html" target="_blank">WordPressのタイトルの付け方</a>』をご覧ください。</small></p>

      <h4>トップページの説明（メタディスクリプション）</h4>
      <textarea id="blogdescription" class="regular-text" name="blogdescription" rows="5" cols="60"><?php echo get_option('blogdescription'); ?></textarea>
      <p class="setting_description"><small>トップページの説明文を全角８０文字以内で入力してください。ここに入力した内容が検索エンジンのディスクリプション欄に表示されるようになります。具体的には、『<a href="" target="_blank">メタディスクリプションとは</a>をご覧ください。』</small></p>

      <h4>メタキーワード</h4>
      <input type="text" id="meta_keywords" class="regular-text" name="meta_keywords" value="<?php echo get_option('meta_keywords'); ?>">
      <p class="setting_description"><small>トップページで対策したいキーワードを入力して下さい。メタキーワードは現在SEOには影響力はありませんが、キーワードに対する理解を深めるためにも、メタキーワードは常に意識しておきましょう。</small></p>

    </div>
  </div>
</div>
</div>


<div class="metabox-holder">
<div id="footer_logo_setting" class="postbox " >
<h3 class='hndle'><span>フッターのロゴ設定</span></h3>
  <div class="inside">
    <div class="main">
      <p class="setting_description">ここではフッターに表示するロゴの設定をします。</p>
      <h4>ロゴタイプの選択</h4>
      <?php
        $footer_logo_type = trim(get_option('footer_logo_type'));
        if(isset($footer_logo_type) && $footer_logo_type !== ''){
          $footer_logo_type = trim(get_option('footer_logo_type'));
        }else{
          $footer_logo_type = 'footerLogo_text';
        }
      ?>
      <label><input type="radio" name="footer_logo_type" value="footerLogo_text" <?php checked($footer_logo_type, 'footerLogo_text'); ?>
      checked ><strong>テキストロゴ</strong></label>
      <p class="setting_description"><small>テキストのロゴを表示します。ロゴに表示したいテキストを下に入力してください。</small></p>
      <p><input type="text" id="footerLogo_text" name="footerLogo_text" class="regular-text" value="<?php echo get_option('footerLogo_text');?>" /></p>

      <label><input type="radio" name="footer_logo_type" value="footerLogo_image"<?php checked($footer_logo_type, 'footerLogo_image'); ?> ><strong>フッター画像ロゴ</strong></label>
      <p class="setting_description"><small>ロゴを画像にします。下の「画像をアップロード」ボタンを押して任意の画像を選択してください。</small></p>
      <p><input type="text" id="footerLogo_image" name="footerLogo_image" class="regular-text" value="<?php echo get_option('footerLogo_image');?>" /><a class="media-upload" href="JavaScript:void(0);" rel="footerLogo_image"><input class="cmb_upload_button button" type="button" value="画像をアップロードする" /></a>
      </p>
    </div>
  </div>
</div>
</div>


<div class="metabox-holder">
<div id="google_tools" class="postbox " >
<h3 class='hndle'><span>Googleツールの設定</span></h3>
  <div class="inside">
    <div class="main">
      <p class="setting_description">Googleアナリティクス・Googleウェブマスターツールの設定を行います。サイトの効果計測やメンテナンスに必要なので必ず設定しましょう。設定の前に、それぞれのアカウントを取得しておきましょう。</p>

      <h4>Googleアナリティクスの設定</h4>
      <textarea name="analytics_tracking_code" rows="10" cols="60" id="analytics_tracking_code" class="cmb_textarea_code"><?php echo get_option('analytics_tracking_code'); ?></textarea>
      <p class="setting_description"><small>Googleアナリティクスのコードを入力して下さい。</small></p>

      <h4>Googleマップ</h4>
      <textarea name="google_map" id="google_map" rows=3 cols=80><?php echo get_option('google_map'); ?></textarea><br>
      <label><input type="checkbox" id="use_google_map" name="use_google_map" <?php checked($use_google_map,'1');?> value=1>地図を表示する</label><br>
      こちらにGoogleマップからHTMのソースコードを取得して貼り付けます。詳しくは「<a href="https://support.google.com/maps/answer/3544418?hl=ja">地図を埋め込む</a>」をご確認ください。<br>
      <pre>（例）&lt;iframe src="https://www.google.com/maps/embed?pb=◯◯◯◯◯◯・・・・◯◯◯◯◯◯" width="400" height="300" frameborder="0" style="border:0"&gt;&lt;/iframe&gt;</pre>

      <script>
        var $ =jQuery.noConflict();
        $(document).ready(function() {
            if ($("#use_google_map").is(':checked')) {
              $('#google_map').show('fast');
            }else{
              $('#google_map').hide('fast');
            }

            $('#use_google_map').change(function(){
                if ($(this).is(':checked')) {
                    $('#google_map').show('fast');
                } else {
                    $('#google_map').hide('fast');
                }
            });

        });
      </script>
    </div>
  </div>
</div>
</div>

<div class="metabox-holder">
<div id="facebook_connection" class="postbox " >
<h3 class='hndle'><span>Facebookとの連携</span></h3>
  <div class="inside">
    <div class="main">
      <p class="setting_description">Facebookとの連携を行います。これらを入力していなければ、LikeBOXの表示ができなかったり、シェアされた際の拡散効率が落ちてしまいますので、しっかりと設定しておきましょう。<br>
      （※ 詳しくは<a href="https://xeory.jp/xeory-1st-settings" target="_blank">Xeoryインストール後の初期設定</a>の「３．ソーシャルメディアのリンク設定」と「４．OGPの設定」をご確認ください）</p>
      <h4>FacebookユーザーIDの入力</h4>
      <input type="text" id="facebook_user_id" class="regular-text" name="facebook_user_id" value="<?php echo get_option('facebook_user_id'); ?>">
      <p class="setting_description"><small>FacebookのユーザーIDを入力してください。</small></p>

      <h4>FacebookアプリケーションIDの入力</h4>
      <input type="text" id="facebook_app_id" class="regular-text" name="facebook_app_id" value="<?php echo get_option('facebook_app_id'); ?>">
      <p class="setting_description"><small>FacebookのアプリケーションIDを入力して下さい。</small></p>

      <h4>Facebookページurl</h4>
      <input type="text" id="facebook_page_url" class="regular-text" name="facebook_page_url" value="<?php echo get_option('facebook_page_url'); ?>">

      <h4>デフォルト画像の設定</h4>
      <input type="text" id="def_image" name="def_image" class="regular-text" value="<?php echo get_option('def_image');?>" /><a class="media-upload" href="JavaScript:void(0);" rel="def_image"><input class="cmb_upload_button button" type="button" value="画像をアップロードする" /></a>
      <p class="setting_description"><small>サイトがシェアされた時に表示させたい画像を選択してアップロードボタンを押してください。サイトのトップページや、その他アイキャッチ画像が設定されていないページがシェアされた時には、ここのアップロードした画像が、Facebook上で表示されるようになります。画像のサイズは、1200 px x 630 pxが最も綺麗に表示されます。</small></p>

    </div>
  </div>
</div>
</div>

<div class="metabox-holder">
<div id="twitter_connection" class="postbox " >
<h3 class='hndle'><span>Twitterとの連携</span></h3>
  <div class="inside">
    <div class="main">
    <h4>twitter ID</h4>
      <input type="text" id="twitter_id" class="regular-text" name="twitter_id" value="<?php echo get_option('twitter_id'); ?>">
        <p class="setting_description"><small>ヘッダー部と記事下のソーシャルボタンにTwitterのボタンが追加されます。<br>ご自身のtwitterページにアクセスし、アドレスバーに表示されている下記のアンダーライン部分のみご入力ください。<br>https://twitter.com/<u>xxxxxxx</u><br>
      また、TwitterCardにも利用されます。<br>
      TwitterCardについて詳しく知りたい方は<a href="https://dev.twitter.com/ja/cards/overview" target="_blank">公式ドキュメント(日本語）</a>をご覧ください。
      </small></p>

    </div>
  </div>
</div>
</div>

      <?php submit_button(); ?>
    </form>
  </div>

<?php
}


// 投稿画面の項目を非表示にする
function remove_default_post_screen_metaboxes() {
 if (!current_user_can('level_10')) { // level10以下のユーザーの場合メニューをremoveする
 remove_meta_box( 'postcustom','post','normal' ); // カスタムフィールド
 remove_meta_box( 'postexcerpt','post','normal' ); // 抜粋
 // remove_meta_box( 'commentstatusdiv','post','normal' ); // ディスカッション
 remove_meta_box( 'commentsdiv','post','normal' ); // コメント
 remove_meta_box( 'trackbacksdiv','post','normal' ); // トラックバック
 remove_meta_box( 'authordiv','post','normal' ); // 作成者
 //remove_meta_box( 'slugdiv','post','normal' ); // スラッグ
 remove_meta_box( 'revisionsdiv','post','normal' ); // リビジョン
 }
 }
add_action('admin_menu','remove_default_post_screen_metaboxes');


 // 初期表示で投稿画面の「ページ固有のJavascript/CSS」項目を非表示にする
add_filter( 'default_hidden_meta_boxes', 'vswp_default_hidden_meta_boxes', 10, 2 );
function vswp_default_hidden_meta_boxes( $hidden, $screen ) {
  if ( ( $found = array_search( 'vswp_post_asset', $hidden ) ) == false )
    array_push($hidden,'vswp_post_asset');
  return $hidden;
}

?>
