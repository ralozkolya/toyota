<div class="container">
	<div class="row">
		<div class="col-md-6">
			<form class="bpg-arial" id="contact-form">
				<div class="form-group">
					<input class="form-control" type="text" name="first-name"
						placeholder="<?php echo lang('first_name'); ?>" required>
				</div>
				<div class="form-group">
					<input class="form-control" type="text" name="last-name"
						placeholder="<?php echo lang('last_name'); ?>" required>
				</div>
				<div class="form-group">
					<input class="form-control" type="text" name="phone"
						placeholder="<?php echo lang('phone'); ?>" required>
				</div>
				<div class="form-group">
					<input class="form-control" type="email" name="email"
						placeholder="<?php echo lang('email'); ?>" required>
				</div>
				<div class="form-group">
					<textarea class="form-control" name="comment"
						placeholder="<?php echo lang('comment'); ?>"></textarea>
				</div>
				<div class="form-group">
					<input id="contact-submit-button" class="form-control" type="submit" value="<?php echo lang('send'); ?>">
				</div>
			</form>
		</div>
		<div class="col-md-6" id="map">
			<iframe width="100%" height="450" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/place?q=Toyota%20Center%20Tbilisi%2C%20David%20Agmashenebeli%20Alley%2C%20Tbilisi%2C%20Georgia&key=AIzaSyAX2gqNC7WYpgN29w7k0vZ-yRorz1UGPQo" allowfullscreen></iframe>
		</div>
	</div>
</div>