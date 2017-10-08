$('.video').click(function(){
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

	$('#video-preview').append(tag).show();

	var height = $('#video-preview').height();
	var width = $('#video-preview').width();

	$('#video-preview > video').attr('width', width);
	$('#video-preview > video').attr('height', height);
});

$('.why-toyota-scroll').hScroll();

$('#video-preview').click(function(e){
	if(!$(e.target).is('video')) {
		$(this).hide();
		$(this).empty();
		try {
			$('video', this)[0].pause();
		}catch(e){}
	}
});