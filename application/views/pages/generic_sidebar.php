<!DOCTYPE html>
<html>
<head>

<?php $this->load->view('elements/head'); ?>
<link rel="stylesheet" href="<?php echo base_url('res/css/about_us.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('res/css/sidebar.css'); ?>">

</head>
<body>
<div class="wrapper">
<?php $this->load->view('elements/header'); ?>
	<div class="container">
		<div class="row">
			<?php if(!empty($children)): ?>
				<div class="col-sm-4 col-md-3 sidebar">
					<?php $this->load->view('elements/sidebar'); ?>
				</div>
				<div class="col-sm-8 col-md-9 content">
					<?php echo $page[BODY]; ?>
				</div>
			<?php else: ?>
				<div class="col-xs-12 content">
					<?php echo $page[BODY]; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php $this->load->view('elements/footer'); ?>
</div>	<!-- END OF WRAPPER -->
</body>
</html>