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