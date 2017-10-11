<div class="footer container bpg-arial">
	<p>
		<a class="unstyled-link lang" href="<?php echo base_url('pages/change_language/ka'); ?>">
			<img src="<?php echo base_url('res/img/ge.png'); ?>" alt="Georgian">
		</a>
		&nbsp;&nbsp;-&nbsp;&nbsp;
		<a class="unstyled-link lang" href="<?php echo base_url('pages/change_language/en'); ?>">
			<img src="<?php echo base_url('res/img/uk.png'); ?>" alt="English">
		</a>
	</p>
	<br>
	<p>
		<a class="unstyled-link" href="<?php echo base_url().'pages/contact'; ?>">
			<?php echo lang('contact_us'); ?>
		</a>
		<a class="unstyled-link pull-right hidden-xs" id="sitemap-link" href="#">
			<?php echo lang('sitemap'); ?> <span class="sitemap-arrow glyphicon glyphicon-chevron-down"></span>
		</a>
	</p>
	<div class="container-fluid hidden-xs" id="sitemap-container">
		<div class="row">
			<div class="col-sm-6">
				<p><strong><?php echo lang('models'); ?></strong></p>
				<?php foreach($models as $model): ?>
					<p><a class="unstyled-link" href="<?php echo base_url().'cars/'.$model[SLUG]; ?>">
						<?php echo htmlspecialchars($model[NAME]); ?>
					</a></p>
				<?php endforeach; ?>
			</div>
			<div class="col-sm-6">
				<p><strong><?php echo lang('navigation'); ?></strong></p>
				<?php foreach($pages as $page): ?>
					<p><a class="unstyled-link" href="<?php echo base_url().'pages/'.$page[SLUG]; ?>">
						<?php echo htmlspecialchars($page[TITLE]); ?>
					</a></p>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-6">
			© TOYOTA CENTER TBILISI LTD
		</div>
		<div class="col-sm-6 text-right">
			<a class="unstyled-link social" href="https://www.facebook.com/toyotatbilisi/" target="_blank">
				<span class="fa fa-facebook"></span>
			</a>
			<a class="unstyled-link social" href="https://www.instagram.com/toyotacentertbilisi/" target="_blank">
				<span class="fa fa-instagram"></span>
			</a>
		</div>
	</div>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-68020010-1', 'auto');
  ga('send', 'pageview');

</script>