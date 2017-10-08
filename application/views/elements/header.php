<div class="header clearfix">

	<button class="visible-xs navigation-toggle pull-left">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>

	<ul class="bpg-nino-mtavruli-regular navigation">
		<?php foreach($pages as $page): ?>
			<?php if($page[SLUG] === $current_page): ?>
				<li class="active">
			<?php else: ?>
				<li>
			<?php endif; ?>
				<a class="unstyled-link" href="<?php echo base_url().'pages/'.htmlspecialchars($page[SLUG]); ?>">
					<?php echo htmlspecialchars($page[TITLE]); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
	
	<a class="unstyled-link" href="<?php echo base_url(); ?>">
		<img class="logo" alt="Logo" src="<?php echo base_url().'res/img/logo.png'; ?>">
	</a>
</div>