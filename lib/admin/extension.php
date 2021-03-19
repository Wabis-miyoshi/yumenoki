<?php

add_action('admin_menu', 'chiled_theme_initial_settings');

function chiled_theme_initial_settings() {
  add_menu_page('テーマ設定', 'テーマ設定', 'manage_options', 'chiled_theme_initial_setting_menu', 'child_theme_setting_page', '', 4);//サイドメニュー生成
  add_action( 'admin_init', 'register_child_theme_settings','admin-head');
}

function register_child_theme_settings() {
  register_setting( 'straight_settings_group', 'use_company_map' );
  register_setting( 'straight_settings_group', 'company_map' );
  register_setting( 'straight_settings_group', 'company' );

  register_setting( 'straight_settings_group', 'company_name' );
  register_setting( 'straight_settings_group', 'company_place' );
  register_setting( 'straight_settings_group', 'company_tel' );
  register_setting( 'straight_settings_group', 'daihyou' );
  register_setting( 'straight_settings_group', 'members' );
  register_setting( 'straight_settings_group', 'sihonkin' );
  register_setting( 'straight_settings_group', 'seturitu' );

  register_setting( 'straight_settings_group', 'footer-logo' );
  register_setting( 'straight_settings_group', 'footer_menu_title' );
  register_setting( 'straight_settings_group', 'footer-address' );

}

function child_theme_setting_page() {
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
    <h2>テーマ情報設定</h2>

    <form method="post" action="options.php" enctype="multipart/form-data" encoding="multipart/form-data">


<div class="metabox-holder">
<div id="toppage_meta_setting" class="postbox " >
<h3 class='hndle'><span>会社情報の設定</span></h3>
  <div class="inside">
    <div class="main">
    <p class="setting_description">ここでは会社情報の設定を行います。</p>
    <h4>アクセスマップ</h4>

      <textarea name="company_map" id="company_map" rows=3 cols=80><?php echo $company_map;?></textarea><br>
      <label><input type="checkbox" id="use_company_map" name="use_company_map" <?php checked($use_company_map,'1');?> value=1>地図を表示する</label><br>
      こちらにGoogleマップからHTMのソースコードを取得して貼り付けます。詳しくは「<a href="https://support.google.com/maps/answer/3544418?hl=ja">地図を埋め込む</a>」をご確認ください。<br>
<pre>（例）&lt;iframe src="https://www.google.com/maps/embed?pb=◯◯◯◯◯◯・・・・◯◯◯◯◯◯" width="400" height="300" frameborder="0" style="border:0"&gt;&lt;/iframe&gt;</pre>
      <hr>

      <h4>会社情報</h4>
      <p class="setting_description">会社名・電話番号・住所などを入力しましょう。<br>（例）<br>項目名：会社名<br>テキスト：株式会社ルーシー</p>

<?php

    $companies = get_option('company');
    if ( is_array($companies)) {
        foreach( (array)$companies as $key => $company ) {
      $max_key = max(array_keys($companies));
            if ( isset( $company['name'] ) && isset( $company['val'] ) ) {
                echo sprintf('<ul><li>項目名<input type="text" name="company[%1$u][name]" value="%2$s"></li><li>テキスト<input type="text" name="company[%1$u][val]" value="%3$s"></li><li><input class="remove" type="button" value="削除"></li></ul><hr>',
                $key,
                $company['name'],
                $company['val']
                );

            }
        }
    }else{
      $max_key = 0;
      $defalt_name = (isset($company['name']) && $company['name'] !== '') ? $company['name'] : "会社名";
      $defalt_val = (isset($company['val']) && $company['val'] !== '') ? $company['val'] : "株式会社○○○○○○○○";
      echo sprintf('<ul><li>項目名<input type="text" name="company[0][name]" value="%s"></li><li><input type="text" name="company[0][val]" value="%s"></li><li>テキスト<input class="remove" type="button" value="削除"></li></ul><hr>',$defalt_name, $defalt_val);
    }
?>


      <ul id="here"></ul>
      <span class="add"><input type="button" value="項目を追加する"></span>
      <script>
          var $ =jQuery.noConflict();
          $(document).ready(function() {

              var count = <?php echo $max_key;?>;
              $(".add").click(function() {
                  count = count + 1;

                  $('#here').append('<ul><li>項目名<input type="text" name="company['+count+'][name]" value=""></li><li>テキスト<input type="text" name="company['+count+'][val]" value=""></li><li><input class="remove" type="button" value="削除"></li></ul>' );

                  return false;
              });
              $(document).on('click', '.remove', function() {
                  $(this).parent().parent().remove();
              });

              if ($("#use_company_map").is(':checked')) {
                $('#company_map').show('fast');
              }else{
                $('#company_map').hide('fast');
              }


              $('#use_company_map').change(function(){
                  if ($(this).is(':checked')) {
                      $('#company_map').show('fast');
                  } else {
                      $('#company_map').hide('fast');
                  }
              });

          });


      </script>

    </div>
  </div>
</div>
</div>


<div class="metabox-holder">
<div id="toppage_logo_setting" class="postbox " >
<h3 class='hndle'><span>フッター設定</span></h3>
  <div class="inside">
    <div class="main">
      <p class="setting_description">ここではフッターのロゴとテキストの設定を行います。</p>

      <h4>フッターロゴ</h4>
      <p><input type="text" id="footer-logo" name="footer-logo" class="regular-text" value="<?php echo get_option('footer-logo');?>" /><a class="media-upload" href="JavaScript:void(0);" rel="footer-logo"><input class="cmb_upload_button button" type="button" value="画像をアップロードする" /></a></p>
     <p class="setting_description"><small>ロゴを画像にします。下の「画像をアップロード」ボタンを押して任意の画像を選択してください。このテンプレートでは、300px x 60pxの画像が最も適しています。</small></p>

      <h4>フッターに掲載するテキスト</h4>
      <textarea id="footer-address" class="regular-text" name="footer-address" rows="5" cols="60"><?php echo get_option('footer-address'); ?></textarea>
    </div>
  </div>
</div>
</div>


      <?php submit_button(); ?>
    </form>
  </div>



<?php
}
