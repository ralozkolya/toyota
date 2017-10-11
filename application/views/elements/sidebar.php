<ul>
	<?php foreach($children as $c): ?>
		<li>
			<?php if($sidebar_active === $c['slug']) { ?>
				<a class="sidebar-link active" href="<?php echo base_url("pages/{$c['slug']}"); ?>">
			<?php } else { ?>
				<a class="sidebar-link" href="<?php echo base_url("pages/{$c['slug']}"); ?>">
			<?php } ?>
				<?php echo $c['title']; ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>