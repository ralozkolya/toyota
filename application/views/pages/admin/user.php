<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
	<link rel="stylesheet" href="<?php echo base_url().'res/css/admin_cars.css'; ?>">
</head>
<body>

<?php $this->load->view('elements/admin/header'); ?>

<div class="container bpg-arial">
	<?php $this->load->view('elements/messages'); ?>
	<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('change_username'); ?></h2>
	<form method="post">
		<div class="form-group">
			<label for="username"><?php echo lang('username'); ?></label>
			<input class="form-control" name="username" id="username" type="text"
				value="<?php echo $this->session->userdata('user')['username']; ?>" required>
		</div>
		<div class="form-group">
			<input class="btn btn-success" type="submit" value="<?php echo lang('save'); ?>">
		</div>
	</form>
</div>
<br><br><br>

<div class="container bpg-arial">
	<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('change_password'); ?></h2>
	<form method="post" action="<?php echo base_url().'admin/change_password'; ?>">
		<div class="form-group">
			<label for="old-password"><?php echo lang('old_password'); ?></label>
			<input class="form-control" name="old_password" id="old-password"
				type="password" required>
		</div>
		<div class="form-group">
			<label for="new-password"><?php echo lang('new_password'); ?></label>
			<input class="form-control" name="new_password" id="new-password"
				type="password" required>
		</div>
		<div class="form-group">
			<label for="repeat-password"><?php echo lang('repeat_password'); ?></label>
			<input class="form-control" name="repeat_password" id="repeat-password"
				type="password" required>
		</div>
		<div class="form-group">
			<input class="btn btn-success" type="submit" value="<?php echo lang('save'); ?>">
		</div>
	</form>
</div>

</body>
</html>