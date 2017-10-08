$.fn.hScroll = function(options){

	var width = 0;
	var scrollpane = $('.scrollpane', this);
	var scroller = this;
	var arrows = $('.arrow', this);
	var animating = false;
	var pad = false;

	if(scrollpane.length == 0) {
		console.error("At least one scrollpane element must be defined");
		return this;
	}

	if(options) {

		if(typeof options === 'string') {
			if(options === 'adjust') {
				adjustSize();
				return this;
			}

			else if(options === 'pad') {
				pad = true;
			}
		}
	}

	$(window).load(adjustSize);
	$(window).resize(adjustSize);

	arrows.on('click', _scroll);

	function _scroll() {
		if(!animating) {

			animating = true;
			var scrollLeft = scrollpane.children(':first-child').outerWidth(true);

			if($(this).hasClass('slider-arrow-right')) {
				scrollLeft = scroller.scrollLeft() + scrollLeft;
			}

			else {
				scrollLeft = scroller.scrollLeft() - scrollLeft;
			}

			scroller.animate({
				scrollLeft: scrollLeft
			}, {
				complete: function(){
					animating = false;
				}
			});
		}
	}

	function adjustSize() {
		width = 0;

		scrollpane.children(':visible').each(function(){
			width += $(this).outerWidth(true);
		});

		if(pad) {
			width += 70;
		}

		scrollpane.width(width);

		if(width <= scroller.width()) {
			arrows.hide();
		}

		else if($(window).width() >= 992){
			arrows.show();
		}
	}

	return this;
};