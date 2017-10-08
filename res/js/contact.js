$('#contact-form').submit(function(){

	$('.error-message').remove();

	$('#contact-submit-button').attr('disabled', 'disabled').val(lang_sending);

	$.ajax({
		url: url,
		method: 'post',
		data: $(this).serialize(),
		complete: function(r){
			if(r.responseText !== 'ok') {
				$('#contact-form').append('<div class="error-message">'+r.responseText+'</div>');
				$('#contact-submit-button').removeAttr('disabled').val(lang_send);
			}

			else {
				$('#contact-submit-button').addClass('btn-success')
					.remove('btn-default').val(lang_sent);
			}
		}
	});

	return false;
});