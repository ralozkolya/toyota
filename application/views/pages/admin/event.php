<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
	<style>
		.event-file {
			margin: 5px 0;
			height: 100px;
		}
	</style>
</head>
<body>

<?php $this->load->view('elements/admin/header'); ?>

<div class="container">
	<?php $this->load->view('elements/messages'); ?>

	<h2 class="bpg-nino-mtavruli-regular">
		<img src="<?php echo base_url("uploads/events/thumb_{$event['image']}"); ?>">
		<?php echo $event['ka_title']; ?>
	</h2>

	<form method="post" action="<?php echo base_url("admin/edit_{$modify_url}"); ?>" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $event['id']; ?>">
		<div class="form-group">
			<label for="ka_title"><?php echo lang('ka_title'); ?></label>
			<input class="form-control" id="ka_title" name="ka_title" type="text"
				value="<?php echo $event['ka_title']; ?>" required>
		</div>
		<div class="form-group">
			<label for="en_title"><?php echo lang('en_title'); ?></label>
			<input class="form-control" id="en_title" name="en_title" type="text"
				value="<?php echo $event['en_title']; ?>" required>
		</div>
		<div class="form-group">
			<label for="image"><?php echo lang('icon_long'); ?></label>
			<input class="form-control" id="image" name="image" type="file">
		</div>
		<div class="form-group">
			<input class="btn btn-success" type="submit" value="<?php echo lang('edit'); ?>">
			<a class="btn btn-default" href="<?php echo base_url('admin/news'); ?>"><?php echo lang('back'); ?></a>
		</div>
	</form>

	<br>

	<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('gallery'); ?></h2>

	<div class="accordion">
		<?php if($event_type === 'photos') { ?>
			<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('add_photo'); ?></h2>
		<?php } else { ?>
			<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('add_video'); ?></h2>
		<?php } ?>
		<div>
			<form id="photo-upload" action="<?php echo base_url("admin/{$add_file}"); ?>" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $event['id']; ?>">
				<div class="form-group">
					<?php if($event_type === 'photos') { ?>
						<label for="files-input"><?php echo lang('photos'); ?></label>
						<input id="files-input" class="form-control" type="file" name="image" multiple required>
					<?php } else { ?>
						<label for="youtube_id"><?php echo lang('youtube_link'); ?></label>
						<input id="youtube_id" class="form-control" type="text" name="youtube_id" required>
					<?php } ?>
				</div>
				<div class="form-group">
					<input id="upload-submit" type="submit" class="btn btn-success" value="<?php echo lang('add'); ?>">
				</div>
			</form>
		</div>
		<?php if(!empty($files)) { ?>
			<?php if($event_type === 'photos') { ?>
				<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('delete_photo'); ?></h2>
			<?php } else { ?>
				<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('delete_video'); ?></h2>
			<?php } ?>
			<div class="container-fluid">
				<div class="row">
					<?php foreach($files as $f) { ?>
						<?php $thumb_url = array_key_exists('image', $f)
							? base_url("uploads/events/thumb_{$f['image']}")
							: "https://img.youtube.com/vi/{$f['youtube_id']}/hqdefault.jpg"; ?>
						<div class="col-sm-3">
							<a class="delete-file" href="<?php echo base_url("admin/{$delete_file}/{$f['id']}"); ?>">
								<img class="event-file" src="<?php echo $thumb_url; ?>">
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
	</div>

	<br><br>
</div>

<script>

	$('.accordion').accordion({
		collapsible: true,
		active: false,
		heightStyle: 'content' 
	});

	$('.delete-file').click(function() {
		return confirm('<?php echo lang("are_you_sure"); ?>');
	});
	
	$('#photo-upload').submit(function(e) {

		var files = $('#files-input').get(0).files;

		if(!files.length) return;

		$('#upload-submit').attr('disabled', 'disabled');

		$('#upload-submit').val('<?php echo lang('loading'); ?>');

		var waiting = false;
		var currentIndex = 0;

		var t = $(this);

		var interval = setInterval(function(){
			
			if(!waiting) {

				waiting = true;

				var file = files.item(currentIndex);
				var formData = new FormData();
				var url = t.attr('action');

				formData.append('id', $('input[type=hidden]').get(0).value);
				formData.append('image', file);

				$.ajax({
					url: url,
					method: 'post',
					data: formData,
					processData: false,
					contentType: false,
					complete: function(){
						waiting = false;
						currentIndex++;

						if(currentIndex === files.length) {
							clearInterval(interval);
							location.reload();
						}
					},
				});
			}

		}, 100);

		return false;
	});

</script>

</body>
</html>