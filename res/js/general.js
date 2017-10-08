$(document).ready(function(){

	$('.navigation-toggle').click(function(){
		$('.navigation').slideToggle();
	});

	$('#sitemap-link').click(function(){

		if($('#sitemap-container:visible').length) {
			$('#sitemap-container').slideUp();
			$('.sitemap-arrow').removeClass('glyphicon-chevron-up')
				.addClass('glyphicon-chevron-down');
		}

		else {
			$('#sitemap-container').slideDown({progress: function(){
				$(window).scrollTop($(document).height());
			}});
			$('.sitemap-arrow').removeClass('glyphicon-chevron-down')
				.addClass('glyphicon-chevron-up');
		}

		return false;
	});

});