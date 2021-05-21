//ドロワー

(function ($) {
  $('.burger').click(function() {
    $(this).toggleClass('active');
    $('body').toggleClass('body-fixed');

    if ($(this).hasClass('active')) {
    $('.menu').addClass('active');　 //クラスを付与
    } else {
    $('.menu').removeClass('active'); //クラスを外す
    }
  });
})(jQuery);

//topに戻る
(function ($) {
  var pagetop = $('.toTop');
  pagetop.click(function () {
    $('body, html').animate({ scrollTop: 0 }, 500); //0.5秒かけてトップへ戻る
    return false;
  });
})(jQuery);

/*
  toggle
 */
(function($) {
  /*クリックイベント*/
    $('.faqArea_item-q').click(function () {
      $(this).children('.arrow').not(this).children('.arrow').removeClass("active");
      $(".faqArea_item-q").not(this).next().slideUp(200);
      $(this).next('.faqArea_item-a').slideToggle(200);
      $(this).children('.arrow').toggleClass('active');
    });
})(jQuery);

//modal
(function($) {
  $(function(){
    var winScrollTop;
    $('.v-modalArea').each(function(){
        $(this).on('click',function(i){
            //スクロール位置を取得
            winScrollTop = $(window).scrollTop();

            var target = $(this).data('target');
            var modal = document.getElementById(target);
            $(modal).fadeIn();
            return false;
        });
    });
    $('.js-modal-close').on('click',function(){
        $(this).next().children('.hero_video')[0].pause();
        $('.js-modal').fadeOut();
        $('body,html').stop().animate({scrollTop:winScrollTop}, 100);
        return false;
    });
    $('.js-modal-close_btn').on('click',function(){
      $(this).prev('.hero_video')[0].pause();
      $('.js-modal').fadeOut();
      $('body,html').stop().animate({scrollTop:winScrollTop}, 100);
      return false;
  }); 
  });
})(jQuery);

//slider
var swiperMv = new Swiper('.topVisual-slider', {
  speed: 1000,
  effect: 'fade',
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
});

(function($) {
  $(function(){
    function sliderSetting(){
 
        var width = $(window).width();
 
        if(width <= 767){
            $('.blogSlider').not('.slick-initialized').slick({
              centerMode: true,
              centerPadding: '30px',
              dots:true,
              focusOnSelect:true,
            });
        } else {
            $('.slide.slick-initialized').slick('unslick');
        }
    }
 
    sliderSetting();
 
    $(window).resize( function() {
        sliderSetting();
    });
});
})(jQuery);

//facebook
(function($) {
  if ($('.fb-page').length) {

    // iframeリロードの[ON/OFF]を切り替えるウィンドウサイズ。
    var reloadWidth = 1200;

    $(function(){
        // まずウインドウの横幅を変数に入れる
        var timer = false;
        var winWidth = $(window).width();
        var winWidth_resized;

        // ウインドウのリサイズイベントに処理をバインド
        $(window).on("resize", function(){
            // リサイズ後の放置時間が指定ミリ秒以下なら何もしない(リサイズ中に何度も処理が行われるのを防ぐ)
            if (timer !== false) {
                clearTimeout(timer);
            }
            // 放置時間が指定ミリ秒以上なので処理を実行
            timer = setTimeout(function() {
            // リサイズ後のウインドウの横幅を取得
            winWidth_resized = $(window).width();

            // リサイズ前のウインドウ幅とリサイズ後のウインドウ幅が異なる場合
            if ( winWidth != winWidth_resized ) {

            var windowWidth = parseInt($(window).width());
            if(windowWidth >= reloadWidth) {
                // 画面サイズ大のとき
                //location.reload();
            } else {
                // 画面サイズ小のとき
                location.reload();
            }
            console.log("ウインドウ横幅のリサイズ");
            console.log("現在の横幅: ", winWidth);
            console.log("リサイズ後の横幅: ", winWidth_resized);

            // 次回以降使えるようにリサイズ後の幅をウインドウ幅に設定する
            winWidth = $(window).width();
                }
            }, 200);
        });
    });
}
})(jQuery);