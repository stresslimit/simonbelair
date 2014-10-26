/*
Author: stresslimit
*/

jQuery(document).ready(function($) {

	contact_style();
	home_banners();
  menu_hover();

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


function menu_hover() {
  var $current_holder = $('header .menu > ul > li.current_page_ancestor, header .menu > ul > li.current_page_item');
  var current_class = $current_holder.hasClass('current_page_ancestor') ? 'current_page_ancestor' : 'current_page_item';
  $('header .menu > ul > li').hover(
    function () {
      if ( $current_holder==$(this) ) return;
      $current_holder.removeClass(current_class);
      $(this).addClass(current_class);
    },
    function () {
      if ( $current_holder==$(this) ) return;
      $current_holder.addClass(current_class);
      $(this).removeClass(current_class);
    }
  );
}


function contact_style() {
	$('.wpcf7-form input[type="text"], .wpcf7-form input[type="email"], .wpcf7-form input[type="tel"], .wpcf7-form textarea').each(function() {
		var label = $(this).parent().siblings('label');
		label.hide();
		var text = label.html();
		text = text.replace( /\<.*$/ , '' );
		$(this).attr( 'placeholder', text );
	});
}
