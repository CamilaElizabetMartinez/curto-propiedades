function doAnimations( elems ) {
  var animEndEv = 'webkitAnimationEnd animationend';
  elems.each(function () {
    var $this = $(this),
    $animationType = $this.data('animation');
    $this.addClass($animationType).one(animEndEv, function () {
      $this.removeClass($animationType);
    });
  });
}

$(window).on('resize scroll', function() {

  if ($(window).width()>800) {
    var value = $(this).scrollTop();
    //console.log(value);
    if (value>($('#hero').height()-145)) {
      $('body').addClass('header-small');
    } else {
      $('body').removeClass('header-small');
    }
  } else {
    $('body').addClass('header-small');
  }

});
$(window).scroll();

$(function(){

  // Navigation:

  $('.goto-link').click(function(e){
    $('.dropdown.show .dropdown-toggle').dropdown('toggle');
    $('#navbar-nav.navbar-collapse').collapse('hide');
    anchor = document.querySelector($(this).attr('href'));
    $([document.documentElement, document.body]).animate({scrollTop: $(anchor).offset().top-86}, 750,'easeInOutQuart');
    return false;
  });

  $('.carousel').on('slide.bs.carousel', function (e) {
    var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
    doAnimations($animatingElems);
  });   

});