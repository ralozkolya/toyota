$(document).ready(function(){

	$('.car').click(function(){
		$('.checkbox').removeClass('active');
		$('.car').not(this).removeClass('active');
		$(this).addClass('active');
		$('.checkbox', this).addClass('active');

		$('input[name=model]').val($(this).attr('data-slug'));
	});

	$('#service-form').submit(function(){

		$('.error-message').remove();

		$('#service-submit-button').attr('disabled', 'disabled').val(lang_sending);

		$.ajax({
			url: url,
			method: 'post',
			data: $(this).serialize(),
			complete: function(r){
				if(r.responseText !== 'ok') {
					$('#service-form').append('<div class="error-message">'+r.responseText+'</div>');
					$('#service-submit-button').removeAttr('disabled').val(lang_send);
				}

				else {
					$('#service-submit-button').addClass('btn-success')
						.remove('btn-default').val(lang_sent);
				}
			}
		});

		return false;
	});

});