var slider = {};

slider.fadeDuration = 1000;
slider.changeEvery = 7000;
slider.paused = false;

slider.resize = function() {
	$('.slides-container').height($(window).width() * 6 / 16);
	$('.slider-arrow').css('top', $('.slides-container').height() / 2 - 58 / 2)
};

$(document).ready(slider.resize);
$(window).bind("resize", slider.resize);
$(window).bind("orientationchange", slider.resize);

$('.slider-arrow').hover(function(){
	slider.paused = true;
}, function(){
	slider.paused = false;
});

$('.slides-container').on('swiperight', function(){
	$('.slider-arrow-right').click();
});

$('.slides-container').on('swipeleft', function(){
	$('.slider-arrow-left').click();
});

slider.slideShow = function(e) {

	if(!slider.paused || e) {

		$('.slide').stop(true, true, true);

		var current = $('.slide:visible');
		var next = current.next();

		if(e && e.currentTarget === $('.slider-arrow-left')[0]) {
			next = current.prev();
		}
		
		if(!next.length) {
			if(e && e.currentTarget === $('.slider-arrow-left')[0]) {
				next = $('.slide:last-child');
			}

			else {
				next = $('.slide:first-child');
			}
		}
		
		next.fadeIn(slider.fadeDuration);
		current.fadeOut(slider.fadeDuration);

	}
}

$('.slider-arrow').click(slider.slideShow);

if($('.slide').length > 1) {
	console.log($('.slide').length)
	setInterval(slider.slideShow, slider.changeEvery);
}

else {
	$('#slider > .slider-arrow').hide();
}

slider.firstDealerChars = new SplitText('.first-dealer', {type: 'words, chars'}).chars;
slider.tl = new TimelineMax({repeat: -1, repeatDelay: 3});
slider.tl.staggerFrom(slider.firstDealerChars,0.01, {opacity:0, ease:Power1.easeIn}, 0.06, "+=0.1");