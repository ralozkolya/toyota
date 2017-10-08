<!DOCTYPE html>
<html>
<head>

<?php $this->load->view('elements/head'); ?>
<link rel="stylesheet" href="<?php echo base_url('res/css/about_us.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('res/css/sidebar.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('res/css/jquery.fancybox.min.css'); ?>">

<script src="<?php echo base_url('res/js/jquery.fancybox.min.js'); ?>"></script>

</head>
<body>
<div class="wrapper">
<?php $this->load->view('elements/header'); ?>
	<div class="container">
		<div class="row">
			<?php if(!empty($children)): ?>
				<div class="col-sm-4 col-md-3 sidebar">
					<ul>
						<?php foreach($children as $c): ?>
							<li>
								<a class="sidebar-link" href="<?php echo base_url("pages/{$c['slug']}"); ?>">
									<?php echo $c['title']; ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="col-sm-8 col-md-9 content">
			<?php else: ?>
				<div class="col-xs-12 content">
			<?php endif; ?>
					<h1 class="bpg-nino-mtavruli-regular"><?php echo $event['title']; ?></h1>
					<?php if(!empty($files)) { ?>
						<div class="container-fluid">
							<div class="row">
								<?php foreach($files as $f) { ?>
									<div class="col-sm-4">
										<a href="<?php echo base_url("uploads/events/{$f['image']}"); ?>"
											data-fancybox="group">
											<div class="thumb" style="background-image: url('<?php echo base_url("uploads/events/thumb_{$f['image']}"); ?>');"></div>
										</a>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php } else { ?>
						<h3 class="bpg-nino-mtavruli-regular"><?php echo lang('nothing_found'); ?></h3>
					<?php } ?>
				</div>
		</div>
	</div>

<?php $this->load->view('elements/footer'); ?>
</div>	<!-- END OF WRAPPER -->
</body>
</html>