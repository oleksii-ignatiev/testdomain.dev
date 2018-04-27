jQuery(function ($) {
	$('button.show-popup').click(function () {
		$('div.popup').fadeIn(500);
		$("body").append("<div id='overlay'></div>");
		$('#overlay').show().css({'filter' : 'alpha(opacity=80)'});
		return false;				
	});	
	$('a.close').click(function () {
		$(this).parent().fadeOut(100);
		$('#overlay').remove('#overlay');
		return false;
	});
	
	$('button.phone').click(function () {
		window.location.href = "tel:098 765 4321";
	});	
	$('button.email').click(function () {
		window.location.href = "mailto:testdomain@mail.to";
	});	
});