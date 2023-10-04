// ハンバーガーメニュー
$(function () {
    $('#js-buttonHamburger').click(function () {
      $('body').toggleClass('is-drawerActive');
      $('body').toggleClass('is-open');
  
      if ($(this).attr('aria-expanded') == 'false') {
        $(this).attr('aria-expanded', true);
      } else {
        $(this).attr('aria-expanded', false);
      }
    });
});

$(window).on('load resize', function(){
  var i_width = $(window).outerWidth(true);
  if(i_width < 640){
    if($('body').hasClass('is-open')){
      $('body').eq(0).removeClass('is-open');
    }
  } else {
    if(!$('body').hasClass('is-open')){
      $('body').eq(0).addClass('is-open');
    }
  }
});

// メニューバーのアクセシビリティ対応
$(function() {
    $('.main-menu a').focus( function () {
        $(this).siblings('.sub-menu').addClass('focused');
    }).blur(function(){
        $(this).siblings('.sub-menu').removeClass('focused');
    });

    $('.sub-menu a').focus( function () {
        $(this).parents('.sub-menu').addClass('focused');
    }).blur(function(){
        $(this).parents('.sub-menu').removeClass('focused');
    });
});