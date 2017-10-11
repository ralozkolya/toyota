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
					<?php if(!empty($news)) { ?>
						<div class="container-fluid">
							<?php foreach($news as $n) { ?>
								<div class="row post">
									<div class="col-sm-3 text-center">
										<img src="<?php echo base_url("uploads/news/{$n['image']}"); ?>"
											alt="<?php echo $n['title']; ?>">
									</div>
									<div class="col-sm-9">
										<h2 class="bpg-nino-mtavruli-regular"><?php echo $n['title']; ?></h2>
										<p><?php echo mb_substr(strip_tags($n['body']), 0, 300); ?></p>
										<a class="btn btn-default more-button" href="<?php echo base_url("pages/post/{$n['slug']}"); ?>"><?php echo lang('more'); ?></a>
									</div>
								</div>
							<?php } ?>
						</div>
						<div class="text-center">
							<?php echo $this->pagination->create_links(); ?>
						</div>
					<?php } else { ?>
						<?php echo lang('nothing_found'); ?>
					<?php } ?>
				</div>
		</div>
	</div>
<?php $this->load->view('elements/footer'); ?>
</div>	<!-- END OF WRAPPER -->
</body>
</html>