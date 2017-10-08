<h2 class="first-dealer bpg-nino-mtavruli-regular text-center">
	<?php echo lang('first_dealer'); ?>
</h2>
<?php if(count($banners)): ?>
<div id="slider">
	<div class="slides-container">
	<?php foreach($banners as $banner): ?>
		<?php $image = base_url('uploads/banners/'.htmlspecialchars($banner[NAME])); ?>
		<?php if(empty($banner['url']) || $banner['url'] === '#'): ?>
			<div class="slide" style="background-image: url('<?php echo $image; ?>');"></div>
		<?php else: ?>
			<a href="<?php echo $banner['url']; ?>" class="slide" style="background-image: url('<?php echo $image; ?>');"></a>
		<?php endif; ?>
	<?php endforeach; ?>
	</div>

	<span class="slider-arrow slider-arrow-left hidden-xs" style="left: 5px;"></span>
	<span class="slider-arrow slider-arrow-right hidden-xs" style="right: 5px;"></span>
</div>

<script src="<?php echo base_url().'res/js/slider.js'; ?>"></script>
<?php endif; ?>