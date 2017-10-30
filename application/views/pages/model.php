<!DOCTYPE html>
<html>
<head>

<?php $this->load->view('elements/head'); ?>
<link href="<?php echo base_url().'res/css/model.css'; ?>" rel="stylesheet">

<script>
	var lang_sending = '<?php echo lang("sending"); ?>';
	var lang_sent = '<?php echo lang("sent"); ?>';
	var lang_send = '<?php echo lang("send"); ?>';
	var url = '<?php echo base_url()."pages/schedule_test_drive"; ?>';
</script>

</head>
<body>

<div class="wrapper">
<?php $this->load->view('elements/header'); ?>
<?php $this->load->view('elements/sub_navigation'); ?>

<?php echo $model[BODY]; ?>

<?php if(count($gallery)): ?>
<div class="container section" id="gallery">

	<h2 class="bpg-nino-mtavruli-regular text-center">
		<?php echo lang('gallery'); ?>:
	</h2>
	
	<div class="horizontal-scroll gallery-scroll">
		<div class="scrollpane clearfix">
			<?php foreach($gallery as $image): ?>
				<img class="gallery-image"
					data-big="<?php echo base_url().'uploads/gallery/'.htmlspecialchars($image[NAME]); ?>"
					src="<?php echo base_url().'uploads/gallery/thumbs/'.htmlspecialchars($image[NAME]); ?>">
			<?php endforeach; ?>
		</div>

		<span class="arrow slider-arrow-left hidden-xs hidden-sm" style="left: 5px; top: 150px;"></span>
		<span class="arrow slider-arrow-right hidden-xs hidden-sm" style="right: 5px; top: 150px;"></span>
	</div>

</div>
<?php endif; ?>

<?php if(count($videos)): ?>
<div class="container section" id="videos">

	<h2 class="bpg-nino-mtavruli-regular text-center">
		<?php echo lang('videos'); ?>:
	</h2>
	
	<div class="horizontal-scroll videos-scroll">
		<div class="scrollpane clearfix">
			<?php foreach($videos as $video): ?>
				<div class="video video-poster"
					data-video="<?php echo base_url().'uploads/videos/'.htmlspecialchars($video[NAME]); ?>"
					<?php if($video[SUBTITLES]): ?>data-subs="<?php echo base_url().'uploads/videos/subtitles/'.htmlspecialchars($video[SUBTITLES]); ?>"<?php endif; ?>>
					<div class="thumb">
						<img
							src="<?php echo base_url().'uploads/videos/posters/'.htmlspecialchars($video[POSTER]); ?>">
						<div class="icon-play"><span class="glyphicon glyphicon-play"></span></div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<span class="arrow slider-arrow-left hidden-xs hidden-sm" style="left: 5px; top: 150px;"></span>
		<span class="arrow slider-arrow-right hidden-xs hidden-sm" style="right: 5px; top: 150px;"></span>
	</div>

</div>
<?php endif; ?>

<?php if(count($configurations)): ?>
<div class="container section" id="configurations">

	<h2 class="bpg-nino-mtavruli-regular text-center">
		<?php echo lang('configurations'); ?>:
	</h2>
	
	<div class="horizontal-scroll configurations-scroll">
		<div class="scrollpane clearfix">
			<?php foreach($configurations as $configuration): ?>
				<div class="configuration"
					data-id="<?php echo htmlspecialchars($configuration[ID]); ?>">
					<img src="<?php echo base_url().'uploads/configurations/'
						.htmlspecialchars($configuration[ICON]); ?>">
					<div><?php echo htmlspecialchars($configuration[NAME]); ?></div>
					<?php if(!empty($configuration['price'])) { ?>
						<div><?php echo htmlspecialchars($configuration['price']); ?> GEL</div>
					<?php } ?>
				</div>
			<?php endforeach; ?>
		</div>

		<span class="arrow slider-arrow-left hidden-xs hidden-sm" style="left: 5px; top: 150px;"></span>
		<span class="arrow slider-arrow-right hidden-xs hidden-sm" style="right: 5px; top: 150px;"></span>
	</div>
	
	<div>
		<?php foreach($configurations as $configuration) {
			$this->load->view('elements/specifications', array(
				'model' => $configuration
			));
		} ?>
	</div>

</div>
<?php endif; ?>


<?php if(count($accessories)): ?>
<div class="container section" id="accessories">

	<h2 class="bpg-nino-mtavruli-regular text-center">
		<?php echo lang('accessories'); ?>:
	</h2>
	
	<div class="text-center bpg-arial">
		<div class="btn-group" role="group">
			<button type="button" class="btn btn-default popular">
				<?php echo lang('popular'); ?>
			</button>
			<?php foreach($accessory_categories as $cat): ?>
				<button type="button"
					class="btn btn-default"
					data-category="<?php echo htmlspecialchars($cat[ID]); ?>"><?php echo htmlspecialchars($cat[NAME]); ?></button>
			<?php endforeach; ?>
			<button type="button" class="btn btn-default all">
				<?php echo lang('all'); ?>
			</button>
		</div>
	</div>

	<div class="horizontal-scroll accessories-scroll">
		<h2 class="bpg-nino-mtavruli-regular text-center message"><?php echo lang('not_found'); ?></h2>
		<div class="scrollpane clearfix">
			<?php foreach($accessories as $key => $accessory): ?>
				<div class="accessory"
					data-category="<?php echo htmlspecialchars($accessory[CATEGORY]); ?>"
					data-popular="<?php echo htmlspecialchars($accessory[POPULAR]); ?>">
					<div class="icon"
						style="background-image: url('<?php echo base_url().'uploads/accessories/'.
							htmlspecialchars($accessory[ICON]); ?>');">
					</div>
					<div>
						<strong><?php echo htmlspecialchars($accessory[NAME]); ?></strong>
					</div>
					<?php if($accessory[DESCRIPTION]): ?>
						<div class="accessory-info">
							<?php echo lang('details'); ?>
							<span class="glyphicon glyphicon-info-sign"></span>
							<div class="info-container bpg-arial"><?php echo $accessory[DESCRIPTION]; ?></div>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>

		<span class="arrow slider-arrow-left hidden-xs hidden-sm" style="left: 5px; top: 150px;"></span>
		<span class="arrow slider-arrow-right hidden-xs hidden-sm" style="right: 5px; top: 150px;"></span>
	</div>
</div>
<?php endif; ?>

<div class="container" id="test-drive">

	<h1 class="bpg-nino-mtavruli-regular text-center">
		<?php echo lang('schedule_drive'); ?>
	</h1>

	<h2 class="bpg-nino-mtavruli-regular">
		<?php echo lang('fill_form'); ?>
	</h2>

	<form class="bpg-arial" id="test-drive-form">
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
			<div class="col-xs-12">
				<div class="form-group">
					<label for="comment"><?php echo lang('note_comment'); ?></label>
					<textarea id="comment" name="comment" class="form-control"></textarea>
				</div>

				<input class="btn btn-default" type="submit" id="test-drive-submit-button"
					value="<?php echo lang('send'); ?>">
			</div>
		</div>

		<input type="hidden" name="model" value="<?php echo htmlspecialchars($model[NAME]); ?>">
	</form>
</div>

<div id="image-preview"></div>

<div id="accessory-details" class="bpg-arial"></div>

<script src="<?php echo base_url().'res/js/model.js'; ?>"></script>

<?php $this->load->view('elements/footer'); ?>
</div>	<!-- END OF WRAPPER -->
</body>
</html>