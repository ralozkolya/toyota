<!DOCTYPE html>
<html>
<head>

<?php $this->load->view('elements/head'); ?>
<link rel="stylesheet" href="<?php echo base_url('res/css/offers.css'); ?>">

</head>
<body>

<div class="wrapper">
<?php $this->load->view('elements/header'); ?>
	
	<div class="container">
		<?php if(!empty($offers)) { ?>
			<?php foreach($offers as $o) { ?>
				<div class="row offer">
					<div class="col-sm-4 text-center">
						<img src="<?php echo base_url("uploads/offers/thumb_{$o['image']}"); ?>" alt="<?php echo $o['title']; ?>">
					</div>
					<div class="col-sm-8">
						<h2 class="bpg-nino-mtavruli-regular"><?php echo $o['title']; ?></h2>
						<p><?php echo mb_substr(strip_tags($o['body']), 0, 300); ?></p>
						<a class="btn btn-default more-button" href="<?php echo base_url("pages/offer/{$o['slug']}"); ?>"><?php echo lang('more'); ?></a>
					</div>
				</div>
			<?php } ?>
		<?php } else { ?>
			<h3 class="text-center"><?php echo lang('nothing_found'); ?></h3>
		<?php } ?>
		<div class="text-center">
			<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>

<?php $this->load->view('elements/footer'); ?>
</div>	<!-- END OF WRAPPER -->
</body>
</html>