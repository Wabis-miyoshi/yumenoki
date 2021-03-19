<?php

/* Loginページカスタム
* ---------------------------------------- */
function custom_login_design() { ?>
  <style>
  body.login {
    background: url('/wp-content/uploads/login.jpg') no-repeat center center;
    background-size: cover;
  }

  body.login form {
    margin-top: 20px;
    background:rgba(18,28,38,0.60);
    box-shadow: 0 1px 3px rgba(0,0,0,1);
  }

  body.login h1 a {
    background-image: none,url('/wp-content/uploads/logo.png');
    background-size: 200px;
    height: 45px;
    margin:25px  auto;
    width: auto;
  }

  /* フォームのテキスト */
  body.login label {
    color: #35d1cf;
    font-size: 14px;
  }
  /* フォームのボタン */
  body.login .submit input#wp-submit {
    background: #17c78b;
    border:solid 1px #17c78b;
    text-shadow: none;
  }
  /* フォームのリンク */
  body.login #backtoblog a,
  body.login #nav a {
    color: #ffffff;
  }

  /* フォームのリンク */
  body.login a,
  body.login #backtoblog a{
    color: #35d1cf;
  }
  /* フォームのエラーメッセージ */
  body.login #login_error,
  body.login .message,
  body.login .success {
    border-left: 4px solid #35d1cf;
    padding: 12px;
    margin-left: 0;
    margin-bottom: 20px;
    color: #35d1cf;
    background:rgba(18,28,38,0.60);
    box-shadow: 0 1px 3px rgba(0,0,0,1);
  }
  </style>
<?php }

add_action( 'login_enqueue_scripts', 'custom_login_design' );