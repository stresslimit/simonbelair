/*
Author: stresslimit
*/

jQuery(document).ready(function($) {

	contact_style($);
	home_banners($);

});


function home_banners() {
	var jumps = $('#controls .jump'),
		slides = $('#home-banners a.main-image'),
		playing = true,
		zindex = 1,
		timer
		timeout_time = 4000;

	slides.css({'z-index':zindex}).fadeOut(0);
	slides.eq(0).addClass('active').fadeIn(1000, function(){ /* slides.fadeIn(0); */ }).css({'z-index':zindex++});
	jumps.eq(0).addClass('active');

	jumps.click(function(e){
		e.preventDefault();
		var show = $(this).attr('href');

		clearTimeout(timer);
		// if ( we actually clicked, not auto-triggered ) {
		// 	playing = false;	// turn off auto-rotating once we pick one
		// }
		if (playing) timer = setTimeout(next, timeout_time);

		// FADE
		if ( zindex >= 11) {
			zindex = 1;
			slides.css({'z-index':zindex});
			$(show).css({'z-index':zindex++});
		}
			
		slides.fadeOut('slow').removeClass('active');
		$(show).css({'z-index':zindex++}).fadeIn('slow').addClass('active');

		jumps.removeClass('active');
		$(this).addClass('active');
	});
	function prev() {
		if ( $('.jump.active').prev().length ) { $('.jump.active').prev().click(); }
		else { jumps.eq( jumps.length-1 ).click(); }
	}
	function next() {
		if ( $('.jump.active').next().length ) { $('.jump.active').next().click(); }
		else { jumps.eq(0).click(); }
	}
	timer = setTimeout(next, timeout_time);
}




function contact_style() {
	$('.contact-form input[type="text"], .contact-form textarea').each(function() {
		var name = $(this).attr('name');
		var label = $('label[for="'+ name +'"]');
		// console.log('label[for="'+ name +'"]');
		label.hide();
		var text = label.html();
		text = text.replace( /\<.*$/ , '' );
		$(this).attr( 'placeholder', text );
	});
}