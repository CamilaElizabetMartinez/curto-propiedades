$(window).on('resize scroll', function() {

  $('body').removeClass('is-nav-open');
  
  $('body').removeClass('is-budget-form-open');

  if ($(window).width()>800) {
    var value = $(this).scrollTop();
    if (value>150) {
      $('body').addClass('is-header-small');
    } else {
      $('body').removeClass('is-header-small');
    }
  } else {
    $('body').addClass('is-header-small');
  }

});
$(window).scroll();

$(function(){

  // Nav-outer:

  $('.nav-outer-toggle').click(function(){
    if ($('body').hasClass('is-nav-open')) {
      $('body').removeClass('is-nav-open');
    } else {
      $('body').addClass('is-nav-open');
    }
    return false;
  });

  $('.nav-outer .nav-close').click(function(){
     $('body').removeClass('is-nav-open');
     return false;
  });

  // Budget form:

  $('.budget-form-toggle').click(function(){
    if ($('body').hasClass('is-budget-form-open')) {
      $('body').removeClass('is-budget-form-open');
    } else {
      $('#formBudgetResponse').html('');
      $('body').addClass('is-budget-form-open');
    }
    return false;
  });

  $('.budget-form .budget-form-close').click(function(){
     $('body').removeClass('is-budget-form-open');
     return false;
  });

  // Navigation:

  $('.goto-link').click(function(e){
    $('body').removeClass('is-nav-open');
    anchor = document.querySelector($(this).attr('href'));
      $([document.documentElement, document.body]).animate({scrollTop: $(anchor).offset().top-53}, 750,'easeInOutQuart');
    return false;
  });

});