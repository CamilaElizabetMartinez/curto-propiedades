$(document).ready(function(){
	var altura = $('.menu').offset().top;
	
	$(window).on('scroll', function(){
		if ( $(window).scrollTop() > altura ){
			$('.menu').addClass('menu-fixed');
			$('.logo_agregado').addClass('logo_agregado_yes');
			$('#mainNav').addClass('sombra');
		} else {
			$('.menu').removeClass('menu-fixed');
			$('.logo_agregado').removeClass('logo_agregado_yes');
			$('#mainNav').removeClass('sombra');
		}
	});

});