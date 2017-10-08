
$('.accordion').accordion({
	collapsible: true,
	active: false,
	heightStyle: 'content' 
});

$('button.btn-default').click(function(){
	$('.btn-default').not(this).removeClass('btn-info');
	$(this).addClass('btn-info');

	if($(this).hasClass('all')) {
		$('.accessory').show();
	}

	else if($(this).hasClass('popular')) {
		$('[data-popular=1]').show();
		$('[data-popular=0]').hide();
	}

	else {
		var cat = $(this).attr('data-category');

		$('.accessory').hide();
		$('.accessory[data-category='+cat+']').show();
	}

	if($('.accessory:visible').length == 0) {
		$('h2.message').show();
	}

	else {
		$('h2.message').hide();	
	}

	$('.accessories-scroll').hScroll('adjust');
});

$('.configuration').click(function(){
	if(!$(this).hasClass('active')) {
		$('.configuration').not(this).removeClass('active');
		$(this).addClass('active');
		var id = $(this).attr('data-id');
		$('.specs:visible').stop().slideUp({complete: function(){
			$('.specs[data-id='+id+']').slideDown();
		}});
	}
	
});

$('.gallery-image').click(function(){
	var path = $(this).attr('data-big');

	$('#image-preview').append('<img src="'+path+'">').show();
});

$('.video-poster').click(function(){

	var video = $(this).attr('data-video');
	var subs = $(this).attr('data-subs');
	var tag;

	if(subs) {
		tag = '<video controls autoplay>'+
			'<source src="'+video+'" type="video/mp4">'+
			'<track src="'+subs+'" kind="subtitles" srclang="ge" default>'
			'თქვენი ბრაუზერით შეუძლებელია HTML5 ვიდეოს ყურება'+
		'</video>';
	}

	else {
		tag = '<video controls autoplay>'+
			'<source src="'+video+'" type="video/mp4">'+
			'თქვენი ბრაუზერით შეუძლებელია HTML5 ვიდეოს ყურება'+
		'</video>';
	}

	$('#image-preview').append(tag).show();

	var height = $('#image-preview').height();
	var width = $('#image-preview').width();

	$('#image-preview > video').attr('width', width);
	$('#image-preview > video').attr('height', height);
});

$(window).on('orientationchange', function(){
	var height = $('#image-preview').height();
	var width = $('#image-preview').width();

	$('#image-preview > video').attr('width', width);
	$('#image-preview > video').attr('height', height);
});

$('#image-preview').click(function(e){
	if(!$(e.target).is('video')) {
		$(this).hide();
		$(this).empty();
		try {
			$('video', this)[0].pause();
		} catch(e){}
	}
});

$('.accessory-info').hover(function(){
	var html = $('.info-container', this).html();
	var offset = $(this).offset();
	var top = offset.top - $("#accessory-details").outerHeight();
	var left;

	if($(window).width() - offset.left > $('#accessory-details').outerWidth()) {
		left = offset.left
	}

	else {
		left = (offset.left + $(this).outerWidth()) - $('#accessory-details').outerWidth();
	}
	console.log($(this).outerWidth());

	$('#accessory-details').html(html).stop().fadeIn().css({
		'top': offset.top - $("#accessory-details").outerHeight(),
		'left': left
	});

}, function(){
	$('#accessory-details').stop().fadeOut();
});

$('#test-drive-form').submit(function(){

	$('.error-message').remove();

	$('#test-drive-submit-button').attr('disabled', 'disabled').val(lang_sending);

	$.ajax({
		url: url,
		method: 'post',
		data: $(this).serialize(),
		complete: function(r){
			if(r.responseText !== 'ok') {
				$('#test-drive-form').append('<div class="error-message">'+r.responseText+'</div>');
				$('#test-drive-submit-button').removeAttr('disabled').val(lang_send);
			}

			else {
				$('#test-drive-submit-button').addClass('btn-success')
					.remove('btn-default').val(lang_sent);
			}
		}
	});

	return false;
});

$('.accessories-scroll').hScroll();
$('.configurations-scroll').hScroll('pad');
$('.gallery-scroll').hScroll();
$('.videos-scroll').hScroll();

$('.sub-navigation > .container > a').click(function(){

	var id = $(this).attr('href');

	$('html, body').animate({
		scrollTop: $(id).offset().top
	}, 1000);

	return false;
});

$('.btn-group > .btn:first-child').click();
$('.configuration:first-child').click();