<div class="section">

	<h1 class="bpg-nino-mtavruli-regular text-center bold">
		<strong><?php echo $this->lang->line('model_line'); ?></strong>
	</h1>

	<div class="container-fluid bpg-nino-mtavruli-regular">
		<div class="row row-centered">
		<?php foreach($models as $model): ?>
			<a class="unstyled-link" href="<?php echo base_url().'cars/'.$model[SLUG]; ?>">
				<div class="col-lg-2 col-sm-3 col-sm-4 col-xs-6 col-centered col-7">
					<?php if($model[ICON]): ?>
						<img alt="<?php echo htmlspecialchars($model[NAME]); ?>"
							src="<?php echo base_url().'uploads/cars/'.htmlspecialchars($model[ICON]); ?>">
					<?php endif; ?>
					<?php if($model[HYBRID] === '1'): ?>
						<span class="hybrid-marker">
							<?php echo $this->lang->line('hybrid'); ?>
						</span>
						<div class="text-uppercase hybrid">
							<strong><?php echo htmlspecialchars($model[NAME]); ?></strong>
						</div>
					<?php else: ?>
						<div class="text-uppercase">
							<strong><?php echo htmlspecialchars($model[NAME]); ?></strong>
						</div>
					<?php endif; ?>
				</div>
			</a>
		<?php endforeach; ?>
		</div>
	</div>
</div>