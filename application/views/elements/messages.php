<?php if($this->session->flashdata(SUCCESS_MESSAGE)): ?>
	<div class="success-message text-success bg-success"><?php echo $this->session->flashdata(SUCCESS_MESSAGE); ?></div>
<?php endif; if($this->session->flashdata(ERROR_MESSAGE)): ?>
	<div class="error-message text-danger bg-danger~"><?php echo $this->session->flashdata(ERROR_MESSAGE); ?></div>
<?php endif; ?>

<?php if($success_message): ?>
	<div class="success-message bg-success text-success"><?php echo $success_message; ?></div>
<?php endif; ?>
<?php if($error_message): ?>
	<div class="error-message bg-danger text-danger"><?php echo $error_message; ?></div>
<?php endif; ?>

<?php if(validation_errors()): ?>
	<div class="error-message bg-danger text-danger">
		<?php echo validation_errors(); ?>
	</div>
<?php endif; ?>