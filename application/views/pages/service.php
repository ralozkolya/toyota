<!DOCTYPE html>
<html>
<head>

<?php $this->load->view('elements/head'); ?>
<link href="<?php echo base_url().'res/css/service.css'; ?>" rel="stylesheet">

<script>
	var lang_sending = '<?php echo lang("sending"); ?>';
	var lang_sent = '<?php echo lang("sent"); ?>';
	var lang_send = '<?php echo lang("send"); ?>';
	var url = '<?php echo base_url()."pages/schedule_service"; ?>';
</script>

<script src="<?php echo base_url().'res/js/service.js'; ?>"></script>

</head>
<body>

<div class="wrapper">
<?php $this->load->view('elements/header'); ?>
<?php echo $page[BODY]; ?>
<div class="container bpg-arial">
	<h1 class="bpg-nino-mtavruli-regular text-center">
		<?php echo lang('schedule_service') ?>
	</h1>

	<h2 class="bpg-nino-mtavruli-regular">
		<?php echo lang('choose_model'); ?>
	</h2>

	<?php foreach($models as $model): ?>
		<div class="col-sm-3 col-xs-4 car text-center"
			data-slug="<?php echo htmlspecialchars($model[NAME]); ?>">
			<div class="checkbox"></div>
			<img src="<?php echo base_url().'uploads/cars/'.htmlspecialchars($model[ICON]); ?>">
			<div><?php echo htmlspecialchars($model['name']); ?></div>
		</div>
	<?php endforeach; ?>

	<div class="col-sm-3 col-xs-4 car text-center"
		data-slug="other">
		<div class="checkbox"></div>
		<img src="<?php echo base_url().'res/img/other.png'; ?>">
		<div><?php echo lang('other'); ?></div>
	</div>
</div>

<div class="container">
	<h2 class="bpg-nino-mtavruli-regular">
		<?php echo lang('fill_form'); ?>
	</h2>

	<form class="bpg-arial" id="service-form">
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="first-name"><?php echo lang('first_name') ?>*</label>
				<input id="first-name" name="first-name" type="text" class="form-control" required>
			</div>
			<div class="col-sm-6 form-group">
				<label for="last-name"><?php echo lang('last_name') ?>*</label>
				<input id="last-name" name="last-name" type="text" class="form-control" required>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="phone"><?php echo lang('phone') ?>*</label>
				<input id="phone" name="phone" type="text" class="form-control" required>
			</div>
			<div class="col-sm-6 form-group">
				<label for="email"><?php echo lang('email') ?>*</label>
				<input id="email" name="email" type="email" class="form-control" required>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="date"><?php echo lang('date') ?>*</label>
				<input id="date" name="date" type="date" class="form-control" required>
			</div>
			<div class="col-sm-6 form-group">
				<label for="time"><?php echo lang('time') ?></label>
				<select id="time" name="time" class="form-control">
					<option value="<?php echo lang('any_time'); ?>">
						<?php echo lang('any_time'); ?>
					</option>
					<option value="9:00 - 10:00">9:00 - 10:00</option>
					<option value="10:00 - 11:00">10:00 - 11:00</option>
					<option value="11:00 - 12:00">11:00 - 12:00</option>
					<option value="12:00 - 13:00">12:00 - 13:00</option>
					<option value="13:00 - 14:00">13:00 - 14:00</option>
					<option value="14:00 - 15:00">14:00 - 15:00</option>
					<option value="15:00 - 16:00">15:00 - 16:00</option>
					<option value="16:00 - 17:00">16:00 - 17:00</option>
					<option value="17:00 - 18:00">17:00 - 18:00</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 form-group">
				<label for="service_type"><?php echo lang('service_type'); ?></label>
				<select name="service_type" id="service_type" class="form-control" required>
					<option></option>
					<?php $types = ['engine_oil_change', 'gearbox_oil_change',
						'replace_brake_pads', 'ac_filter_change', 'suspension_repair',
						'electronics_repair', 'vulcanization', 'paint_works',
						'engine_diagnostics', 'gearbox_diagnostics', 'other'];

						foreach($types as $t) { ?>
						<option value="<?php echo $t; ?>"><?php echo lang($t); ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					<label for="comment"><?php echo lang('note_comment'); ?></label>
					<textarea id="comment" name="comment" class="form-control"></textarea>
				</div>
				<input class="btn btn-default" type="submit" id="service-submit-button"
					value="<?php echo lang('send'); ?>">
			</div>
		</div>
		
		<div style="padding: 0 15px">
			
		</div>

		<input type="hidden" name="model">
	</form>
</div>

<?php $this->load->view('elements/footer'); ?>
</div>	<!-- END OF WRAPPER -->
</body>
</html>