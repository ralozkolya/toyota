<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>

	<style>

		form {
			max-width: 400px;
			margin: 40px auto;
		}

	</style>

</head>
<body>

<div class="container text-center bpg-arial">
	<img src="<?php echo base_url().'res/img/logo_admin.png'; ?>">

	<form method="post">
		<?php if($error_message): ?>
			<p class="bg-danger text-danger"><?php echo $error_message; ?></p>
		<?php endif; ?>
		<div class="form-group">
			<input class="form-control" type="text" name="username" placeholder="<?php echo lang('username'); ?>" autofocus>
		</div>
		<div class="form-group">
			<input class="form-control" type="password" name="password" placeholder="<?php echo lang('password'); ?>">
		</div>
		<div class="form-group">
			<input class="btn btn-default" type="submit" value="<?php echo lang('login'); ?>">
		</div>
	</form>
</div>

</body>
</html>