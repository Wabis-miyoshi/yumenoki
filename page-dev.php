<?php
/*
Template Name: 開発用テンプレートファイル
*/
?>

<?php get_header(); ?>

<?php
  if ( have_posts() ) :
  while ( have_posts() ) : the_post();
?>



<?php the_content(); ?>
<div class="main">
  <div class="section">
    <div class="container w-800">
      <div class="thanksArea">
        <p class="thanksArea_title">お問い合わせありがとうございます</p>
        <p class="thanksArea_text">ご記入していただいた情報は無事に送信されました。<br>確認のため、お客様に自動返信メールをお送りしております。</p>
        <a href="/" class="btn">トップページに戻る</a>
      </div>
    </div>
  </div>
</div>



<?php
  endwhile;
  else :
?>
<p>投稿が見つかりません。</p>
<?php
  endif;
?>

<?php get_footer(); ?>

