<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
	<link rel="stylesheet" href="<?php echo base_url().'res/css/admin_cars.css'; ?>">
</head>
<body>

<?php $this->load->view('elements/admin/header'); ?>

<div class="container bpg-arial">
	<?php $this->load->view('elements/messages'); ?>
	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="car-name"><?php echo lang('name'); ?></label>
			<input class="form-control" name="name" id="car-name" type="text"
				value="<?php echo $car[NAME]; ?>" required>
		</div>
		<div class="form-group">
			<label for="car-icon"><?php echo lang('icon_long'); ?> (154x95)</label>
			<input class="form-control" id="car-icon" name="icon" type="file">
		</div>
		<div class="form-group">
			<?php if($car[HYBRID] === '0'): ?>
				<input name="hybrid" id="hybrid" type="checkbox">
			<?php else: ?>
				<input name="hybrid" id="hybrid" type="checkbox" checked>
			<?php endif; ?>
			<label for="hybrid"><?php echo lang('hybrid'); ?></label>
		</div>
		<div class="form-group">
			<textarea name="body" class="body-editor">
				<?php echo $car[BODY]; ?>
			</textarea>
		</div>
		<div class="form-group">
			<input class="btn btn-success" type="submit" value="<?php echo lang('save'); ?>">
			<a class="btn btn-default" href="<?php echo base_url().'admin/cars'; ?>"><?php echo lang('back'); ?></a>
		</div>
	</form>
</div>
<br><br><br>

<div class="container bpg-arial">
	<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('gallery'); ?></h2>
	<div class="accordion">
		<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('add_photo'); ?></h2>
		<div class="container-fluid">
			<form method="post" enctype="multipart/form-data" action="<?php echo base_url().'admin/add_photo'; ?>">
				<div class="form-group">
					<label for="photo-name"><?php echo lang('icon_desc'); ?></label>
					<input class="form-control" type="file" name="name" id="photo-name" required>
				</div>
				<input type="hidden" name="slug" value="<?php echo $car[SLUG]; ?>">
				<div class="form-group">
					<input class="btn btn-success" type="submit" value="<?php echo lang('add'); ?>">
				</div>
			</form>
		</div>
		<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('delete_photo'); ?></h2>
		<div class="container-fluid">
			<?php $i = 0; foreach($gallery as $picture): ?>
				<?php if($i % 6 === 0): ?>
					<div class="row delete-picture">
				<?php endif; ?>
				<div class="col-sm-2">
					<img class="delete-photo" data-id="<?php echo $picture[ID]; ?>" data-slug="<?php echo $picture[SLUG]; ?>"
						src="<?php echo base_url().'uploads/gallery/'.$picture[NAME]; ?>">
				</div>
				<?php if($i % 6 === 5): ?>
					</div>
				<?php endif; $i++; ?>
			<?php endforeach; ?>

			<?php if($i % 6 !== 0): ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<br><br><br>

<div class="container bpg-arial">
	<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('videos'); ?></h2>
	<div class="accordion">
		<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('add_video'); ?></h2>
		<div class="container-fluid">
			<form method="post" enctype="multipart/form-data" action="<?php echo base_url().'admin/add_video'; ?>">
				<div class="form-group">
					<label for="video-name"><?php echo lang('video'); ?></label>
					<input class="form-control" type="file" name="name" id="video-name" required>
				</div>
				<div class="form-group">
					<label for="poster"><?php echo lang('poster'); ?></label>
					<input class="form-control" type="file" name="poster" id="poster" required>
				</div>
				<div class="form-group">
					<label for="subtitles"><?php echo lang('subtitles'); ?></label>
					<input class="form-control" type="file" name="subtitles" id="subtitles">
				</div>
				<input type="hidden" name="slug" value="<?php echo $car[SLUG]; ?>">
				<div class="form-group">
					<input type="submit" class="btn btn-success" value="<?php echo lang('add'); ?>">
				</div>
			</form>
		</div>
		<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('delete_video'); ?></h2>
		<div class="container-fluid">
			<?php $i = 0; foreach($videos as $video): ?>
				<?php if($i % 6 === 0): ?>
					<div class="row delete-picture">
				<?php endif; ?>
				<div class="col-sm-2">
					<img class="delete-video" data-id="<?php echo $video[ID]; ?>" data-slug="<?php echo $video[SLUG]; ?>"
						src="<?php echo base_url().'uploads/videos/posters/'.$video[POSTER]; ?>">
				</div>
				<?php if($i % 6 === 5): ?>
					</div>
				<?php endif; $i++; ?>
			<?php endforeach; ?>

			<?php if($i % 6 !== 0): ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<br><br><br>

<div class="container bpg-arial">
	<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('configurations'); ?></h2>
	<div class="accordion">
		<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('choose_configuration'); ?></h2>
		<div class="container-fluid">
			<?php $i = 0; foreach($configurations as $configuration): ?>
				<?php if($i % 4 === 0): ?>
					<div class="row config-selector">
				<?php endif; ?>
				<div class="col-sm-3">
					<a class="unstyled" href="<?php echo base_url().'admin/configuration/'.$configuration[ID]; ?>">
						<?php if($configuration[ICON]): ?>
							<img src="<?php echo base_url().'uploads/configurations/'.$configuration[ICON]; ?>">
						<?php endif; ?>
						<?php echo $configuration[NAME]; ?>
					</a>
				</div>
				<?php if($i % 4 === 3): ?>
					</div>
				<?php endif; $i++; ?>
			<?php endforeach; ?>

			<?php if($i % 4 !== 0): ?>
				</div>
			<?php endif; ?>
		</div>
		<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('add_configuration'); ?></h2>
		<div class="container-fluid">
			<form action="<?php echo base_url().'admin/add_configuration'; ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="conf-name"><?php echo lang('config_name'); ?></label>
					<input class="form-control" name="name" id="conf-name" type="text" required>
				</div>
				<div class="form-group">
					<label for="config-icon"><?php echo lang('icon'); ?> (263x130)</label>
					<input class="form-control" id="config-icon" name="icon" type="file" required>
				</div>
				<input type="hidden" name="slug" value="<?php echo $car[SLUG]; ?>">
				<div class="form-group">
					<input class="btn btn-success" type="submit" value="<?php echo lang('add'); ?>">
				</div>
			</form>
		</div>
		<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('delete_configuration'); ?></h2>
		<div class="container-fluid">
			<form class="delete-form" method="post" action="<?php echo base_url().'admin/delete_config/'; ?>">
				<div class="form-group">
					<select name="id" class="form-control">
						<option></option>
						<?php foreach($configurations as $configuration): ?>
							<option value="<?php echo $configuration[ID]; ?>"><?php echo $configuration[NAME]; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-danger" value="<?php echo lang('delete'); ?>">
				</div>
			</form>
		</div>
	</div>
</div>
<br><br><br>

<div class="container bpg-arial">
	<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('accessories'); ?></h2>
	<div class="accordion">
		<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('choose_accessory'); ?></h2>
		<div class="container-fluid">
			<?php $i = 0; foreach($accessories as $acc): ?>
				<?php if($i % 6 === 0): ?>
					<div class="row accessories-selector">
				<?php endif; ?>
				<div class="col-sm-2">
					<a class="unstyled" href="<?php echo base_url().'admin/accessory/'.$acc[ID]; ?>">
						<img src="<?php echo base_url().'uploads/accessories/'.$acc[ICON]; ?>">
						<?php echo mb_substr($acc[NAME], 0, 20); ?>
					</a>
				</div>
				<?php if($i % 6 === 5): ?>
					</div>
				<?php endif; $i++; ?>
			<?php endforeach; ?>

			<?php if($i % 6 !== 0): ?>
				</div>
			<?php endif; ?>
		</div>
		<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('add_accessory'); ?></h2>
		<div class="container-fluid">
			<form method="post" enctype="multipart/form-data" action="<?php echo base_url().'admin/add_accessory'; ?>">
				<div class="form-group">
					<label for="accessory-name"><?php echo lang('first_name'); ?></label>
					<input class="form-control" type="text" name="name" id="accessory-name" required>
				</div>
				<div class="form-group">
					<label for="category"><?php echo lang('category'); ?></label>
					<select name="category" id="category" class="form-control">
						<?php foreach($categories as $cat): ?>
							<option value="<?php echo $cat[ID]; ?>"><?php echo $cat[NAME]; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<input type="checkbox" name="popular" id="popular">
					<label for="popular"><?php echo lang('popular'); ?></label>
				</div>
				<div class="form-group">
					<label for="accessory-icon"><?php echo lang('icon'); ?></label>
					<input class="form-control" type="file" name="icon" id="accessory-icon" required>
				</div>
				<input type="hidden" name="car" value="<?php echo $car[SLUG]; ?>">
				<div class="form-group">
					<input class="btn btn-success" type="submit" value="<?php echo lang('add'); ?>">
				</div>
			</form>
		</div>
		<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('delete_accessory'); ?></h2>
		<div class="container-fluid">
			<?php $i = 0; foreach($accessories as $acc): ?>
				<?php if($i % 6 === 0): ?>
					<div class="row delete-picture">
				<?php endif; ?>
				<div class="col-sm-2">
					<img class="delete-accessory" data-id="<?php echo $acc[ID]; ?>" data-slug="<?php echo $acc[CAR]; ?>"
						src="<?php echo base_url().'uploads/accessories/'.$acc[ICON]; ?>">
					<?php echo mb_substr($acc[NAME], 0, 20); ?>
				</div>
				<?php if($i % 6 === 5): ?>
					</div>
				<?php endif; $i++; ?>
			<?php endforeach; ?>

			<?php if($i % 6 !== 0): ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<br><br><br>

<script>
	$('textarea').ckeditor();

	$('.delete-form').submit(function(){
		return confirm('<?php echo lang("are_you_sure"); ?>');
	});

	$('.delete-photo').click(function(){
		if(confirm('<?php echo lang("are_you_sure"); ?>')) {

			var pic = $(this);

			var id = pic.attr('data-id');
			var slug = pic.attr('data-slug');

			$.ajax({
				url: '<?php echo base_url()."admin/delete_photo"; ?>',
				method: 'post',
				data: 'id='+id+'&slug='+slug,
				complete: function(r){
					var res = JSON.parse(r.responseText);

					if(res.status === 'ok') {
						pic.remove();
					}

					alert(res.message);
				}
			});
		}
	});

	$('.delete-video').click(function(){
		if(confirm('<?php echo lang("are_you_sure"); ?>')) {

			var pic = $(this);

			var id = pic.attr('data-id');
			var slug = pic.attr('data-slug');

			$.ajax({
				url: '<?php echo base_url()."admin/delete_video"; ?>',
				method: 'post',
				data: 'id='+id+'&slug='+slug,
				complete: function(r){
					var res = JSON.parse(r.responseText);

					if(res.status === 'ok') {
						pic.remove();
					}

					alert(res.message);
				}
			});
		}
	});

	$('.delete-accessory').click(function(){
		if(confirm('<?php echo lang("are_you_sure"); ?>')) {

			var pic = $(this);

			var id = pic.attr('data-id');
			var slug = pic.attr('data-slug');

			$.ajax({
				url: '<?php echo base_url()."admin/delete_accessory"; ?>',
				method: 'post',
				data: 'id='+id+'&slug='+slug,
				complete: function(r){
					var res = JSON.parse(r.responseText);

					if(res.status === 'ok') {
						pic.remove();
					}

					alert(res.message);
				}
			});
		}
	});

	$('.accordion').accordion({
		collapsible: true,
		active: false,
		heightStyle: 'content' 
	});
</script>

</body>
</html>