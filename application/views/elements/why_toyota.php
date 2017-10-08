<div class="section">

	<h1 class="bpg-nino-mtavruli-regular text-center">
		<strong><?php echo lang('why_toyota'); ?></strong>
	</h1>

	<div class="horizontal-scroll why-toyota-scroll">
		<div class="clearfix scrollpane">
		<?php foreach($videos as $video): ?>
			<div class="video"
				data-video="<?php echo base_url().'uploads/videos/'.htmlspecialchars($video[NAME]); ?>"
				<?php if($video[SUBTITLES]): ?>data-subs="<?php echo base_url().'uploads/videos/subtitles/'.htmlspecialchars($video[SUBTITLES]); ?>"<?php endif; ?>>
				<div class="thumb">
					<img src="<?php echo base_url().'uploads/videos/posters/'.htmlspecialchars($video[POSTER]); ?>">
					<div class="icon-play"><span class="glyphicon glyphicon-play"></span></div>
				</div>
				<div class="info bpg-arial"><?php echo $video[TEXT]; ?></div>
			</div>
		<?php endforeach; ?>
		</div>

		<span class="arrow slider-arrow-left hidden-xs" style="left: 5px; top: 150px;"></span>
		<span class="arrow slider-arrow-right hidden-xs" style="right: 5px; top: 150px;"></span>
	</div>
</div>

<div id="video-preview"></div>

<script src="<?php echo base_url().'res/js/why_toyota.js'; ?>"></script>