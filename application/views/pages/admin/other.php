<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
	<link rel="stylesheet" href="<?php echo base_url().'res/css/banners.css'; ?>">
</head>
<body>

<?php $this->load->view('elements/admin/header'); ?>

<div class="container bpg-arial">
	<?php $this->load->view('elements/messages'); ?>

	<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('banners'); ?></h2>

	<div class="accordion">
		<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('add_banner'); ?></h2>
		<div class="container-fluid">
			<form method="post" enctype="multipart/form-data" action="<?php echo base_url().'admin/edit_banner'; ?>">
				<div class="form-group">
					<label for="ka_name"><?php echo lang('ka_banner'); ?></label>
					<input class="form-control" name="ka_name" id="ka_name" type="file" required>
				</div>
				<div class="form-group">
					<label for="en_name"><?php echo lang('en_banner'); ?></label>
					<input class="form-control" name="en_name" id="en_name" type="file" required>
				</div>
				<div class="form-group">
					<label for="url"><?php echo lang('url'); ?></label>
					<input class="form-control" name="url" id="url">
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-success" value="<?php echo lang('add'); ?>">
				</div>
			</form>
		</div>
		<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('edit_banner'); ?></h2>
		<div class="container-fluid">
			<div class="row">
				<?php foreach($banners as $b) { ?>
					<?php $image = base_url('uploads/banners/'.$b['name']); ?>
					<div class="col-sm-3">
						<a href="<?php echo base_url("admin/banner/{$b['id']}"); ?>">
							<div class="banner-thumb"
								style="background-image: url('<?php echo $image; ?>')"></div>
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
		<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('delete_banner'); ?></h2>
		<div class="container-fluid">
			<div class="row">
			<?php $i = 0; foreach($banners as $b): ?>
				<div class="col-sm-3">
					<?php $image = base_url('uploads/banners/'.$b['name']); ?>
					<div class="delete-photo banner-thumb" data-id="<?php echo $b['id']; ?>"
						style="background-image: url('<?php echo $image; ?>')"></div>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
	<br><br><br>

	<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('videos_why_toyota'); ?></h2>

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
				<div class="form-group">
					<label for="text"><?php echo lang('description'); ?></label>
					<textarea name="text" id="text"></textarea>
				</div>
				<input type="hidden" name="slug" value="why_toyota">
				<div class="form-group">
					<input type="submit" class="btn btn-success" value="<?php echo lang('add'); ?>">
				</div>
			</form>
		</div>
		<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('delete_video'); ?></h2>
		<div class="container-fluid">
			<?php $i = 0; foreach($videos as $video): ?>
				<?php if($i % 6 === 0): ?>
					<div class="row">
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
	<br><br><br>

	<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('mails'); ?></h2>

	<form method="post" action="<?php echo base_url().'admin/change_mail'; ?>">
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="contact_email"><?php echo lang('contact_email'); ?></label>
					<input type="email" name="contact_email" id="contact_email" class="form-control"
						value="<?php echo $mails['contact_email']; ?>">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="test_drive_email"><?php echo lang('test_drive_email'); ?></label>
					<input type="email" name="test_drive_email" id="test_drive_email" class="form-control"
						value="<?php echo $mails['test_drive_email']; ?>">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="service_email"><?php echo lang('service_email'); ?></label>
					<input type="email" name="service_email" id="service_email" class="form-control"
						value="<?php echo $mails['service_email']; ?>">
				</div>
			</div>
		</div>
		<div class="form-group">
			
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-success" value="<?php echo lang('save'); ?>">
		</div>
	</form>

</div>

<script>

$('textarea').ckeditor();

$('.delete-photo').click(function(){
	if(confirm('<?php echo lang("are_you_sure"); ?>')) {

		var pic = $(this);

		var id = pic.attr('data-id');

		$.ajax({
			url: '<?php echo base_url()."admin/delete_banner"; ?>',
			method: 'post',
			data: 'id='+id,
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

$('.accordion').accordion({
	collapsible: true,
	active: false,
	heightStyle: 'content' 
});

</script>

</body>
</html>