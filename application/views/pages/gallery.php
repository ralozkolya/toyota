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
			<?php else: ?>
				<div class="col-xs-12 content">
			<?php endif; ?>
					<?php if(!empty($events)) { ?>
						<div class="container-fluid">
							<div class="row">
								<?php foreach($events as $e) { ?>
									<div class="col-sm-4 text-center event">
										<a href="<?php echo base_url("pages/{$gallery_type}/{$e['slug']}"); ?>" class="unstyled-link">
											<div class="thumb"
												style="background-image: url('<?php echo base_url("uploads/events/thumb_{$e['image']}"); ?>');"></div>
											<h3 class="event-name"><?php echo $e['title']; ?></h3>
										</a>
									</div>
								<?php } ?>
							</div>
							<div class="row">
								<div class="col-xs-12 text-center"><?php echo $this->pagination->create_links(); ?></div>
							</div>
						</div>
					<?php } else { ?>
						<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('nothing_found'); ?></h2>
					<?php } ?>
				</div>
		</div>
	</div>
<?php $this->load->view('elements/footer'); ?>
</div>	<!-- END OF WRAPPER -->
</body>
</html>